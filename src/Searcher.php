<?php

namespace MySite;


use \MySite\DBManager;

class Searcher
{
    private DBManager $database;

    public function __construct(DBManager $database)
    {
        $this->database = $database;
    }

    public function findByName(string $name): ?array
    {
        $statement = $this->database->getConnection()->prepare(
            "SELECT * FROM shop WHERE title LIKE " . $name
        );

        $statement->execute();

        return $statement->fetchAll();
    }
}
