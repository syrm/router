<?php

namespace Sample\Traveler;

use Router\Destination;
use Router\Traveler;

class Controller implements Traveler
{
    /**
     * @param Destination $destination
     * @return void
     */
    public function travel(Destination $destination)
    {
        echo "Je vais a ";
        var_dump($destination);
    }
}
