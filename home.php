<?php

include "config.php";



$header = $twig->loadTemplate('blocks/header.html');
$templ = $twig->loadTemplate('home.html');
$footer = $twig->loadTemplate('blocks/footer.html');

$slide = $twig->loadTemplate('slider_slide.html');

echo $header->render(array('page_name' => 'Главная'));
echo $templ->render(array('base_path' => '../My-Game-Site'));
//echo $slide->render(array());
echo $footer->render(array());
