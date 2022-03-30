<?php

include "config/config.php";

$header = $view->loadTemplate('blocks/header.twig');
$templ = $view->loadTemplate('news.twig');
$footer = $view->loadTemplate('blocks/footer.twig');

$entered = true;

echo $header->render(array(
    'entered' => $entered,
));

echo $templ->render(array(
    'page_name' => 'Новости',
    'base_path' => '',
));

echo $footer->render(array());
