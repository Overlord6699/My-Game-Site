<?php

namespace MySite\Route;

use MySite\DBManager;
use MySite\PostMapper;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Twig\Environment;
use MySite\Session;

class ShopProduct
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

        $product = $postMapper->getProductByUrlKey((string) $args['product']);


        if (empty($product)) {
            $body = $this->view->render("errors/error404.twig");
        } else {
            /*
            $header = $this->view->render("blocks/shop_header.twig", array(
                'entered' => $entered,
            ));*/

            $body = $this->view->render("product_page.twig", array(
                'page_name' => 'Товар',
                'product' => $product,
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
