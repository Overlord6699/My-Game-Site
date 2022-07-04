<?php

namespace MySite;

use MySite\DBManager;

class LatestPosts
{
    private DBManager $database;

    public function __construct(DBManager $database)
    {
        $this->database = $database;
    }

    public function get(int $numOfPosts): ?array
    {
        $statement = $this->database->getConnection()->prepare(
            'SELECT * FROM post ORDER BY published_date DESC LIMIT ' . $numOfPosts
        );

        $statement->execute();

        return $statement->fetchAll();
    }
}
