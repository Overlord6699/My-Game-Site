<?php

namespace MySite\Route;

use MySite\Session;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Twig\Environment;

class Logout
{
    private Session $session;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function execute(Request $request, Response $response, $args): Response
    {
        $this->session->setData("user", null);

        return $response->withHeader("Location", "/")->withStatus(302);
    }
}
