<?php

use MySite\LatestPosts;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use \MySite\PostMapper;

include "src/TwigMiddleware.php";

use MySite\Slim\TwigMiddleware;

require __DIR__ . '/vendor/autoload.php';

include "config/config.php";


$database = include "config/database.php";
$dsn = $database['dsn'];
$username = $database['username'];
$password = $database['password'];

/*подключение базы */
try {
    $connection = new PDO($dsn, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $exception) {
    echo "Database Error!" . $exception->getMessage();
    exit;
}







$app = AppFactory::create();

$app->add(new TwigMiddleware($view));
/* Главная */
$app->get('/', function (Request $request, Response $response, $args) use ($view) {
    $entered = true;



    $body = $view->render("home.twig", array(
        'page_name' => 'Главная',
        'base_path' => '',
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

    $header = $view->render("blocks/header.twig", array(
        'entered' => $entered,
    ));

    $footer = $view->render("blocks/footer.twig", array());

    $response->getBody()->write($header);
    $response->getBody()->write($body);
    $response->getBody()->write($footer);

    return $response;
});
/* Новости */
$app->get('/news', function (Request $request, Response $response, $args) use ($view, $connection) {
    //$latestPosts = new LatestPosts($connection);
    $postMapper = new PostMapper($connection);

    /*$posts = $latestPosts->get(3)); */
    $posts = $postMapper->getList("DESC");


    $entered = true;
    $header = $view->render("blocks/header.twig", array(
        'entered' => $entered,
    ));

    $body = $view->render("news.twig", array(
        'page_name' => 'Новости',
        'base_path' => '',
        'posts' => $posts,
    ));

    $footer = $view->render("blocks/footer.twig", array());

    $response->getBody()->write($header);
    $response->getBody()->write($body);
    $response->getBody()->write($footer);


    return $response;
});
/* Магазин */
$app->get('/shop', function (Request $request, Response $response, $args) use ($view) {

    $entered = true;
    $header = $view->render("blocks/header.twig", array(
        'entered' => $entered,
    ));

    $body = $view->render("shop.twig", array(
        'page_name' => 'Новости',
        'base_path' => '',
    ));

    $footer = $view->render("blocks/footer.twig", array());

    $response->getBody()->write($header);
    $response->getBody()->write($body);
    $response->getBody()->write($footer);

    return $response;
});
/* Пост из новостей */
$app->get('/news/{url_key}', function (Request $request, Response $response, $args) use ($view, $connection) {
    $postMapper = new PostMapper($connection);

    $post = $postMapper->getByUrlKey((string) $args['url_key']);

    if (empty($post)) {
        $body = $view->render("errors/error404.twig");
    } else {



        $body = $view->render("blocks/news_block.twig", array(
            'post' => $post,
            'page_name' => 'Новости',
            'base_path' => '',
        ));
    }


    $response->getBody()->write($body);

    return $response;
});
//товар из магазина
$app->get('/shop/product', function (Request $request, Response $response, $args) use ($view) {

    $entered = true;
    $header = $view->render("blocks/header.twig", array(
        'entered' => $entered,
    ));

    $body = $view->render("product_page.twig", array(
        'page_name' => 'Новости',
        'base_path' => '',
    ));

    $footer = $view->render("blocks/footer.twig", array());

    $response->getBody()->write($header);
    $response->getBody()->write($body);
    $response->getBody()->write($footer);

    return $response;
});

$app->run();
