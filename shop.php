<?php

include "config.php";

$header = $twig->loadTemplate('blocks/header.html');
$templ = $twig->loadTemplate('shop.html');
$footer = $twig->loadTemplate('blocks/footer.html');

$entered = true;

echo $header->render(array(
    'enterered' => $entered,
));

echo $templ->render(array(
    'page_name' => 'Магазин',
    'base_path' => '',
));

echo $footer->render(array());
