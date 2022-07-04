<?php

namespace MySite\Route;

use MySite\DBManager;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Twig\Environment;
use MySite\PostMapper;
use MySite\Session;

class Shop
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

    /*
    public function find()
    {
        if (isset($_POST['submit'])) {
            $searcher = new Searcher($this->database);

            $search = explode(" ", $_POST["search"]);


            $products = $searcher->findByName($search);
        }
    }
*/

    public function execute(Request $request, Response $response, $args): Response
    {
        $postMapper = new PostMapper($this->database);
        $products = $postMapper->getProductList("DESC");

        /*
        $header = $this->view->render("blocks/shop_header.twig", array(
            'entered' => $entered,
        ));
        */

        $body = $this->view->render("shop.twig", array(
            'page_name' => 'Магазин',
            'products' => $products,
            'user' => $this->session->getData("user"),
        ));

        //$footer = $this->view->render("blocks/footer.twig", array());

        //$response->getBody()->write($header);
        $response->getBody()->write($body);
        //$response->getBody()->write($footer);

        return $response;
    }
}
