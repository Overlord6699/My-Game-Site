<?php

use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use MySite\DBManager;
use MySite\UsersDBManager;

include "src/DBManager.php";

return [
    FilesystemLoader::class => \DI\autowire()
        ->constructorParameter('paths', 'templates'),

    Environment::class => \DI\autowire()
        ->constructorParameter('loader', \DI\get(FilesystemLoader::class)),

    PDO::class =>  \DI\autowire()
        ->constructorParameter('dsn', getenv("DATABASE_DSN"))
        ->constructorParameter('username', getenv("DATABASE_USERNAME"))
        ->constructorParameter('passwd', getenv("DATABASE_PASSWORD"))
        ->constructorParameter('options', []),

    DBManager::class => \DI\autowire()
        ->constructorParameter('connection', \DI\get(PDO::class)),

    UsersDBManager::class => \DI\autowire()
        ->constructorParameter('connection', \DI\get(PDO::class)),
];
