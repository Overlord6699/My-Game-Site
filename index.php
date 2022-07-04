<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use DevCoder\DotEnv;
/* страницы */
use \MySite\Route\Home;
use \MySite\Route\News;
use \MySite\Route\Shop;
use \MySite\Route\Post;
use \MySite\Route\NewsPage;
use MySite\Route\Account;
use MySite\Route\Register;
use MySite\Route\RegisterCheck;
use MySite\Route\LoginCheck;
use MySite\Route\Login;
use MySite\Route\Logout;
use MySite\Route\Wishlist;
use MySite\Route\ShopProduct;
use MySite\Session;

include "src/TwigMiddleware.php";

use MySite\Slim\TwigMiddleware;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

require __DIR__ . '/vendor/autoload.php';

include "config/config.php";


(new DotEnv(__DIR__ . '/.env'))->load();


$builder = new \DI\ContainerBuilder();
$builder->addDefinitions('config/di.php');

$container = $builder->build();

AppFactory::setContainer($container);


$app = AppFactory::create();
$app->addErrorMiddleware(true, true, true);


//апгрейд ссылок для твига
$app->add($container->get(TwigMiddleware::class));
//аналог POST
$app->addBodyParsingMiddleware();


$session = new Session();
//для удобства с сессией 
//callback для каждого запроса на сайте
$sessionMiddleware = function (ServerRequestInterface $request, RequestHandlerInterface $handler) use ($session) {
    $session->start();

    $response = $handler->handle($request);

    $session->save();

    return $response;
};
$app->add($sessionMiddleware);


/* Главная */
$app->get('/', Home::class . ":execute");


/* Магазин */
$app->get('/shop', Shop::class . ":execute");
//товар из магазина
$app->get('/shop/products[/{product}]', ShopProduct::class . ":execute");

/* Новости */
$app->get('/news', News::class . ":execute");
/* Страница с n постами */
$app->get('/news/pages[/{page}]', NewsPage::class . ":execute");
/* Пост из новостей */
$app->get('/news/{post}', Post::class . ":execute");



//страница пользователя
$app->get('/account', Account::class . ":execute");
//корзина пользователя 
$app->get('/account/wishlist', Wishlist::class . ":execute");


$app->get('/register', Register::class . ":execute");
$app->get('/login', Login::class . ":execute");
$app->get('/logout', Logout::class . ":execute");


$app->post('/register-post', RegisterCheck::class . ":execute");
$app->post('/login-post', LoginCheck::class . ":execute");

try {
    $app->run();
} catch (Exception $e) {
    die(json_encode(array("status" => "failed", "message" => "Oh, something went wrong")));
}
