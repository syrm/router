<?php

namespace Sample\Route;

use Router\Route;
use Router\Origin;
use Router\Destination;
use Router\RouterInterface;
use Sample\Origin\Command as OriginCommand;

class Command implements Route
{
    private $command;
    private $destination;

    /**
     * @param string $command
     * @param Destination $destination
     */
    public function __construct($command, Destination $destination)
    {
        $this->command = (string) $command;
        $this->destination = $destination;
    }

    /**
     * @param Origin          $command
     * @param RouterInterface $router
     * @return void
     */
    public function match(Origin $command, RouterInterface $router)
    {
        if ($command instanceof OriginCommand && strpos($this->command, (string) $command) !== false) {
            $router->destinationFound($this->destination);
        }
    }
}
