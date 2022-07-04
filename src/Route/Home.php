<?php

namespace MySite\Route;

use MySite\Session;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Twig\Environment;

class Home
{
    private Environment $view;
    private Session $session;

    public function __construct(Environment $environment, Session $session)
    {
        $this->view = $environment;
        $this->session = $session;
    }

    public function execute(Request $request, Response $response, $args): Response
    {
        $body = $this->view->render("home.twig", array(
            'page_name' => 'Главная',
            "user" => $this->session->getData("user"),
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

        /*
        $header = $this->view->render("blocks/header.twig", array(
            'entered' => $entered,
        ));
        */

        //$footer = $this->view->render("blocks/footer.twig", array());

        //$response->getBody()->write($header);
        $response->getBody()->write($body);
        //$response->getBody()->write($footer);

        return $response;
    }
}
