<?php

include "config/config.php";

$header = $view->loadTemplate('blocks/shop_header.twig');
$templ = $view->loadTemplate('shop.twig');
$footer = $view->loadTemplate('blocks/footer.twig');

$entered = true;

echo $header->render(array(
    'entered' => $entered,
));

echo $templ->render(array(
    'page_name' => 'Магазин',
    'base_path' => '',
));

echo $footer->render(array());
