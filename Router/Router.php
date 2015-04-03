<?php

namespace Router;

class Router implements RouterInterface
{

    /**
     * @var Traveler
     */
    private $traveler;

    /**
     * @var Route[]
     */
    private $routes;

    /**
     * @var bool
     */
    private $signalStop = false;

    /**
     * @param Route $route
     * @return Router
     */
    public function newRoute(Route $route)
    {
        $router = clone $this;
        $router->routes[] = $route;

        return $router;
    }

    /**
     * @param Traveler $traveler
     * @return Router
     */
    public function travelerIs(Traveler $traveler)
    {
        $router = clone $this;
        $router->traveler = $traveler;

        return $router;
    }

    /**
     * @param Origin $currentOrigin
     * @return $this
     */
    public function destinationFor(Origin $currentOrigin)
    {
        foreach ($this->routes as $route) {
            $route->match($currentOrigin, $this);

            if ($this->signalStop === true) {
                break;
            }
        }

        return $this;
    }

    /**
     * @param Destination $destination
     * @return void
     */
    public function destinationFound(Destination $destination)
    {
        $this->signalStop = true;
        $this->traveler->travel($destination);
    }
}
