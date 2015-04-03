<?php

namespace Router;

interface RouterInterface
{
    /**
     * @param Route       $route
     * @return mixed
     */
    public function newRoute(Route $route);

    /**
     * @param Traveler $traveler
     * @return $this
     */
    public function travelerIs(Traveler $traveler);

    /**
     * @param Origin $currentOrigin
     * @return $this
     */
    public function destinationFor(Origin $currentOrigin);

    /**
     * @param Destination $destination
     * @return mixed
     */
    public function destinationFound(Destination $destination);
}

