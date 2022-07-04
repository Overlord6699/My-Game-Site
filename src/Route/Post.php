<?php

namespace MySite\Route;

use MySite\DBManager;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Twig\Environment;
use MySite\PostMapper;
use MySite\Session;

class Post
{
    private Environment $view;

    private DBManager $database;
    private Session $session;

    public function __construct(Environment $environment, DBManager $database, Session $session)
    {
        $this->view = $environment;
        $this->database = $database;
        $this->session = $session;
    }

    public function execute(Request $request, Response $response, $args): Response
    {
        $postMapper = new PostMapper($this->database);

        $post = $postMapper->getByUrlKey((string) $args['post']);

        if (empty($post)) {
            $body = $this->view->render("errors/error404.twig");
        } else {

            /*
            $header = $this->view->render("blocks/header.twig", array(
                'entered' => $entered,
            ));
            */

            $body = $this->view->render("post.twig", array(
                'post' => $post,
                'page_name' => 'Новость',
                'user' => $this->session->getData("user"),
            ));

            //$footer = $this->view->render("blocks/footer.twig", array());
        }

        //$response->getBody()->write($header);
        $response->getBody()->write($body);
        //$response->getBody()->write($footer);


        return $response;
    }
}
