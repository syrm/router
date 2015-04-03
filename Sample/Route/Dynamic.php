<?php

namespace Sample\Route;

use Router\Route;
use Router\Origin;
use Router\RouterInterface;
use Sample\Origin\Url as OriginUrl;

class Dynamic implements Route
{
    private $regex;

    /**
     * @param string $pattern
     */
    public function __construct($pattern)
    {
        $this->regex = $this->patternToRegex($pattern);
    }

    /**
     * @param string $pattern
     * @return string
     */
    private function patternToRegex($pattern)
    {
        return preg_replace('/\\\{([a-z]+)\\\}/', '(?<\1>.+)', preg_quote($pattern));
    }

    /**
     * @param Origin          $url
     * @param RouterInterface $router
     * @return void
     */
    public function match(Origin $url, RouterInterface $router)
    {
        if ($url instanceof OriginUrl && preg_match('#' . $this->regex . '#', $url, $matches) === 1) {
            $router->destinationFound(new \Sample\Destination\Controller($matches['controller'], $matches['method']));
        }
    }
}
