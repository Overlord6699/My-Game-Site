<?php

namespace MySite;

use \PDO;
use \Exception;
use \MySite\DBManager;

class PostMapper
{
    private DBManager $database;

    public function __construct(DBManager $database)
    {
        $this->database = $database;
    }

    public function getProductByUrlKey(string $urlKey): ?array
    {
        $statement = $this->database->getConnection()->prepare(
            "SELECT * FROM shop WHERE url_key = :url_key"
        );
        $statement->bindParam('url_key', $urlKey, PDO::PARAM_STR);

        $statement->execute();

        $result = $statement->fetchAll();

        return array_shift($result);
    }

    public function getByUrlKey(string $urlKey): ?array
    {
        $statement = $this->database->getConnection()->prepare(
            "SELECT * FROM post WHERE url_key = :url_key"
        );
        $statement->bindParam('url_key', $urlKey, PDO::PARAM_STR);

        $statement->execute();

        $result = $statement->fetchAll();

        return array_shift($result);
    }

    public function getList(int $page = 1, int $limit = 2, string $direction = "ASC"): ?array
    {
        if (!in_array($direction, ['DESC', 'ASC'])) {
            throw new Exception('There is no such direction');
        } else {
            //$startPage = ($page - 1) * $limit;
            $startPage = 0;

            $statement = $this->database->getConnection()->prepare(
                'SELECT * FROM post LIMIT '
                    . $startPage . ',' . $limit
            );


            /*
            $statement = $this->database->getConnection()->prepare(
                'SELECT * FROM post WHERE post_id BETWEEN ' . $startPage . ' AND ' . $limit
            );
            */
        }

        $statement->execute();

        return $statement->fetchAll();
    }


    public function getProductList(string $direction = "ASC"): ?array
    {
        if (!in_array($direction, ['DESC', 'ASC'])) {
            throw new Exception('There is no such direction');
        } else {

            $statement = $this->database->getConnection()->prepare(
                'SELECT * FROM shop ORDER BY published_date ' . $direction
            );
        }

        $statement->execute();

        return $statement->fetchAll();
    }


    public function getTotalCount(): int
    {
        $statement = $this->database->getConnection()->prepare(
            "SELECT count(post_id) as total FROM post"
        );

        $statement->execute();

        return (int) ($statement->fetchColumn() ?? 0);
    }
}
