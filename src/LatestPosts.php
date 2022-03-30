<?php

namespace MySite;

use \PDO;

class LatestPosts
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function get(int $numOfPosts): ?array
    {
        $statement = $this->connection->prepare('SELECT * FROM post ORDER BY published_date DESC LIMIT ' . $numOfPosts);

        $statement->execute();

        return $statement->fetchAll();
    }
}
