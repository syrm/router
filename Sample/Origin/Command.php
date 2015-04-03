<?php

namespace Sample\Origin;

use Router\Origin;

final class Command extends Origin
{
    private $command;

    /**
     * @param string $command
     */
    public function __construct($command)
    {
        $this->command = $command;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->command;
    }
}
