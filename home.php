<?php

include "config.php";



$header = $twig->loadTemplate('blocks/header.html');
$templ = $twig->loadTemplate('home.html');
$footer = $twig->loadTemplate('blocks/footer.html');

$slide = $twig->loadTemplate('slider_slide.html');

echo $header->render(array('page_name' => 'Главная'));
echo $templ->render(array(
    'base_path' => '../My-Game-Site',
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
//echo $slide->render(array());
echo $footer->render(array());
