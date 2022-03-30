<?php

namespace MySite;

use \PDO;
use \Exception;

class PostMapper
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getByUrlKey(string $urlKey): ?array
    {
        $statement = $this->connection->prepare("SELECT * FROM post WHERE url_key = :url_key");

        $statement->execute([
            'url_key' => $urlKey
        ]);

        $result = $statement->fetchAll();

        return array_shift($result);
    }

    public function getList(string $direction): ?array
    {
        if (!in_array($direction, ['DESC', 'ASC'])) {
            throw new Exception('There is no such direction');
        } else {
            $statement = $this->connection->prepare('SELECT * FROM post ORDER BY published_date ' . $direction);
        }

        $statement->execute();

        return $statement->fetchAll();
    }
}
