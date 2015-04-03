<?php

namespace Sample\Route;

use Router\Route;
use Router\Origin;
use Router\Destination;
use Router\RouterInterface;
use Sample\Origin\Url as OriginUrl;

class Url implements Route
{
    private $regex;
    private $destination;

    /**
     * @param string $pattern
     * @param Destination destination
     */
    public function __construct($pattern, Destination $destination)
    {
        $this->regex = $this->patternToRegex($pattern);
        $this->destination = $destination;
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
        if ($url instanceof OriginUrl && preg_match('#' . $this->regex . '#', $url) === 1) {
            $router->destinationFound($this->destination);
        }
    }
}
