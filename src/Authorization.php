<?php

namespace MySite;

include "src/AuthorizationEx.php";

use MySite\AuthorizationException;
use PDO;

class Authorization
{
    private UsersDBManager $database;
    private Session $session;

    public function __construct(UsersDBManager $database, Session $session)
    {
        $this->database = $database;
        $this->session = $session;
    }


    public function login(string $email, $password): bool
    {
        if (empty($email)) {
            throw new AuthorizationException("Поле Email должно быть заполнено");
        }
        if (empty($password)) {
            throw new AuthorizationException("Поле Пароль должно быть заполнено");
        }

        $statement = $this->database->getConnection()->prepare(
            "SELECT * FROM users WHERE email = :email"
        );
        $statement->bindParam("email", $email, PDO::PARAM_STR);

        $statement->execute();

        $user = $statement->fetch();

        if (empty($user)) {
            throw new AuthorizationException("Пользователь с такими данными не был найден");
        }

        if (password_verify($password, $user["password"])) {
            $this->session->setData(
                "user",
                [
                    "user_id" => $user["user_id"],
                    "username" => $user["username"],
                ]
            );

            return true;
        } else {
            throw new AuthorizationException("Вы допустили ошибку в Email или пароле");
        }

        return false;
    }

    public function register(array $data): bool
    {
        //валидация
        if (empty($data['username'])) {
            throw new AuthorizationException("Поле Никнейм должно быть заполнено");
        }
        if (empty($data['email'])) {
            throw new AuthorizationException("Поле Email должно быть заполнено");
        }
        if ($data['password'] !== $data['confirm_password']) {
            throw new AuthorizationException("Пароли должны совпадать");
        }


        //проверка пароля на пробел
        $password = $data['password'];
        for ($i = 0; $i < strlen($password); $i++) {
            if ($password[$i] == " ")
                throw new AuthorizationException("Пароль не должен содержать пробелы");
        }


        if (!preg_match(
            '/(?=.*[0-9])(?=.*[!@#$_%^&*])(?=.*[a-zа-я])(?=.*[A-ZА-Я])[0-9a-zа-яA-ZА-Я!@#$%_^&*]{6,}/',
            $data['password']
        )) {
            throw new AuthorizationException("Пароль должен содержать минимум 6 символов, в которых есть заглавные буквы, символы и цифры");
        }

        //проверка эмэйла
        $statement = $this->database->getConnection()->prepare(
            "SELECT * FROM users WHERE email = :email"
        );
        $statement->bindParam('email', $data['email']);

        $statement->execute();

        $registeredUser = $statement->fetch();
        if (!empty($registeredUser)) {
            throw new AuthorizationException("Пользователь с таким Email уже есть");
        }

        //проверка имени
        $statement = $this->database->getConnection()->prepare(
            "SELECT * FROM users WHERE username = :username"
        );
        $statement->bindParam('username', $data['username'], PDO::PARAM_STR);

        $statement->execute();

        $registeredUser = $statement->fetch();
        if (!empty($registeredUser)) {
            throw new AuthorizationException("Пользователь с таким Никнеймом уже есть");
        }


        //сохранение юзера в БД
        $statement = $this->database->getConnection()->prepare(
            'INSERT INTO users (email, username, password) VALUES (:email, :username, :password)'
        );

        $statement->bindParam("email", $data['email'], PDO::PARAM_STR);
        $statement->bindParam('username', $data['username'], PDO::PARAM_STR);
        $statement->bindParam(
            'password',
            password_hash($data['password'], PASSWORD_BCRYPT),
            PDO::PARAM_STR
        );

        $statement->execute();

        return true;
    }
}
