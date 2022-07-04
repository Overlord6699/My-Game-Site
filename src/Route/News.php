<?php

namespace MySite\Route;

use MySite\DBManager;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use MySite\LatestPosts;
use Twig\Environment;

use MySite\PostMapper;
use MySite\Session;

class News
{
    private LatestPosts $latestPosts;
    private Environment $view;
    private DBManager $database;
    private Session $session;

    public function __construct(LatestPosts $latestPosts, Environment $environment, DBManager $database, Session $session)
    {
        $this->latestPosts = $latestPosts;
        $this->view = $environment;
        $this->database = $database;
        $this->session = $session;
    }


    public function execute(Request $request, Response $response, $args): Response
    {
        //$posts = $this->latestPosts->get(3);
        $page = isset($args['page']) ? (int) $args['page'] : 1;
        $limit = 3;

        $postMapper = new PostMapper($this->database);
        $posts = $postMapper->getList($page, $limit, "DESC");

        $totalCount = $postMapper->getTotalCount();


        /*
        $header = $this->view->render("blocks/header.twig", array(
            'entered' => $entered,
        ));
        */

        $body = $this->view->render("news.twig", array(
            'page_name' => 'Новости',
            "user" => $this->session->flush("user"),
            'pagination' => [
                'current' => $page,
                'paging' => ceil($totalCount / $limit)
            ],
            'posts' => $posts,
        ));

        //$footer = $this->view->render("blocks/footer.twig", array());

        //$response->getBody()->write($header);
        $response->getBody()->write($body);
        //$response->getBody()->write($footer);


        return $response;
    }
}
