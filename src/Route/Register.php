<?php

namespace MySite\Route;

use MySite\UsersDBManager;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use MySite\Session;
use Twig\Environment;


class Register
{
    private UsersDBManager $database;
    private Environment $view;
    private Session $session;

    public function __construct(Environment $environment, UsersDBManager $database, Session $session)
    {
        $this->view = $environment;
        $this->database = $database;
        $this->session = $session;
    }

    public function execute(Request $request, Response $response, $args): Response
    {
        /*
        $header = $this->view->render("blocks/header.twig", array());
        */

        $body = $this->view->render("register.twig", array(
            "page_name" => "Регистрация",
            "message" => $this->session->flush("message"), //получаем например сообщение с ошибкой
            "form_data" => $this->session->flush("form_data"), //получаем данные из формы при обновлении страницы
        ));

        //$footer = $this->view->render("blocks/footer.twig", array());

        //$response->getBody()->write($header);
        $response->getBody()->write($body);
        //$response->getBody()->write($footer);

        return $response;
    }
}
