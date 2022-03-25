<?php

include "config.php";

$header = $twig->loadTemplate('blocks/header.html');
$templ = $twig->loadTemplate('shop.html');
$footer = $twig->loadTemplate('blocks/footer.html');

$entered = true;

echo $header->render(array(
    'page_name' => 'Магазин',
    'enterered' => $entered
));

echo $templ->render(array(
    'base_path' => ''
));

echo $footer->render(array());
