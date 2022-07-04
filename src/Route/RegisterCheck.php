<?php

namespace MySite\Route;

use MySite\Authorization;
use MySite\AuthorizationException;
use MySite\Session;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class RegisterCheck
{
    private Authorization $checker;
    private Session $session;

    public function __construct(Authorization $checker, Session $session)
    {
        $this->checker = $checker;
        $this->session = $session;
    }

    public function execute(Request $request, Response $response, $args): Response
    {
        $params = (array) $request->getParsedBody();

        try {
            $this->checker->register($params);
        } catch (AuthorizationException $ex) {
            $this->session->setData('message', $ex->getMessage());
            $this->session->setData('form_data', $params);

            return $response->withHeader("Location", "/register")->withStatus(302);
        }

        /*
        $header = $this->view->render("blocks/header.twig", array());
        */

        //$body = $this->view->render("register.twig", array(
        //    "page_name" => "Проверка",
        //));

        //$footer = $this->view->render("blocks/footer.twig", array());

        //$response->getBody()->write($header);
        //$response->getBody()->write($body);
        //$response->getBody()->write($footer);

        return $response->withHeader("Location", "/")->withStatus(302);
    }
}
