<?php

namespace MySite\Slim;

include "vendor/psr/http-server-middleware/src/MiddlewareInterface.php";

use \Psr\Http\Message\ResponseInterface;
use \Psr\Http\Server\MiddlewareInterface;
use \Psr\Http\Server\RequestHandlerInterface;
use \Psr\Http\Message\ServerRequestInterface;

use Twig\Environment;
use Twig\AssetExtension;

class TwigMiddleware implements MiddlewareInterface
{
    private $environment;

    public function __construct(Environment $environment)
    {
        $this->environment = $environment;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $this->environment->addExtension(new AssetExtension($request));

        return $handler->handle($request);
    }
}
