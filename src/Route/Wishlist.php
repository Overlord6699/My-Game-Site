<?php

namespace MySite\Route;

use MySite\Session;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Twig\Environment;

class Wishlist
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
        $body = $this->view->render("wishlist.html", array(
            'page_name' => 'Аккаунт',
            'user' => $this->session->getData("user"),
        ));
        /*
        $header = $this->view->render("blocks/header.twig", array(
            'entered' => $entered,
        ));*/

        //$footer = $this->view->render("blocks/footer.twig", array());

        //$response->getBody()->write($header);
        $response->getBody()->write($body);
        //$response->getBody()->write($footer);

        return $response;
    }
}
