<?php

namespace Twig;

use Twig\Extension\AbstractExtension;

class AssetExtension extends AbstractExtension
{

    public function getFunctions()
    {
        //name and callback
        return [new TwigFunction('asset_url', [$this, 'getAssetUrl'])];
    }

    public function getAssetUrl(string $path): string
    {
        return $this->getBaseUrl() . $path;
    }

    public function getBaseUrl(): string
    {
        return "dfgd";
    }
}
