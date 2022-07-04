<?php

namespace MySite\Route;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Twig\Environment;
use MySite\Session;

class Account
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

        $body = $this->view->render("user_page.twig", array(
            'page_name' => 'Аккаунт',
            'user' => $this->session->getData("user"),
        ));

        /*
        $header = $this->view->render("blocks/header.twig", array(   
        ));
        */

        //$footer = $this->view->render("blocks/footer.twig", array());

        //$response->getBody()->write($header);
        $response->getBody()->write($body);
        //$response->getBody()->write($footer);

        return $response;
    }
}
