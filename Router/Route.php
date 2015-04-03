<?php

namespace Router;

interface Route
{
    /**
     * @param Origin          $origin
     * @param RouterInterface $router
     * @return mixed
     */
    public function match(Origin $origin, RouterInterface $router);
}
