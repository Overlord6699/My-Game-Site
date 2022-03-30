<?php

//require_once "twig/twig/src/Extension/AssetExtension.php";

require_once "src/Twig/AssetExtension.php";

use Twig\AssetExtension;

require_once 'vendor/autoload.php';
require_once 'vendor/twig/twig/lib/Twig/Autoloader.php';


$loader = new Twig_Loader_Filesystem('templates');
$view = new Twig_Environment($loader);

Twig_Autoloader::register();
