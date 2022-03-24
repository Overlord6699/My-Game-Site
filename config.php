<?php

use Twig\AssetExtension;

require_once 'vendor/autoload.php';
require_once 'vendor/twig/twig/lib/Twig/Autoloader.php';


$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);

//$twig->addExtension(new AssetExtension());

Twig_Autoloader::register();
