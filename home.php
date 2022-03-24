<?php

include "config.php";


$header = $twig->loadTemplate('blocks/header.html');
$templ = $twig->loadTemplate('home.html');
$footer = $twig->loadTemplate('blocks/footer.html');


echo $header->render(array());
echo $templ->render(array());
echo $footer->render(array());
