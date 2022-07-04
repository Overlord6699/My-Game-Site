<?php

namespace Twig;

use Psr\Http\Message\ServerRequestInterface;
use \Twig\Extension\AbstractExtension;

class AssetExtension extends AbstractExtension
{

    private $request;

    public function __construct(ServerRequestInterface $request)
    {
        $this->request = $request;
    }

    public function getFunctions()
    {
        //name and callback
        return [
            new TwigFunction('asset_url', [$this, 'getAssetUrl']),
            new TwigFunction('base_url', [$this, 'getBaseUrl']),
            new TwigFunction('url', [$this, 'getUrl'])
        ];
    }

    public function getAssetUrl(string $path): string
    {
        return $this->getBaseUrl() . $path;
    }

    //например для домашней страницы
    public function getBaseUrl(): string
    {
        $params = $this->request->getServerParams();

        $scheme = $params['REQUEST_SCHEME'] ?? 'http';

        return $scheme . '://' . $params['HTTP_HOST'] . '/';
    }

    public function getUrl(string $path): string
    {
        return $this->getBaseUrl() . $path;
    }
}
