<?php

include "config.php";

$header = $twig->loadTemplate('blocks/header.html');
$templ = $twig->loadTemplate('home.html');
$footer = $twig->loadTemplate('blocks/footer.html');

$entered = true;

$hasHeader = true;
$hasFooter = true;

echo $header->render(array(
    'enterered' => $entered,
));

echo $templ->render(array(
    'page_name' => 'Главная',
    'base_path' => '',
    'welcome_text' => 'Добро пожаловать на главную страницу игры',
    'about_game_text' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.
    Nostrum sit consectetur deleniti mollitia, nulla dolores architecto ex ad, laudantium quibusdam
    corrupti?
    Fuga quos alias molestiae. Id veniam incidunt dolore neque. Lorem, ipsum dolor sit amet
    consectetur adipisicing elit.
    Nostrum sit consectetur deleniti mollitia, nulla dolores architecto ex ad, laudantium quibusdam
    corrupti?
    Fuga quos alias molestiae. Id veniam incidunt dolore neque.',
    'play_button_text' => 'Играть'
));

echo $footer->render(array());
