<?php

namespace MySite;

use \PDO;
use \PDOException;
use \InvalidArgumentException;

class UsersDBManager
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        /*подключение базы */
        try {
            $this->connection = $connection;
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $exception) {;
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }
}
