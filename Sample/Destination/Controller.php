<?php

namespace Sample\Destination;

use Router\Destination;

class Controller implements Destination
{
    private $controller;
    private $method;

    /**
     * @param string $controller
     * @param string $method
     */
    public function __construct($controller, $method)
    {
        $this->controller = $controller;
        $this->method = $method;
    }

    /**
     * @return void
     */
    public function go()
    {
        $controller = new $this->controller();
        $controller->{$this->method}();
    }
}
