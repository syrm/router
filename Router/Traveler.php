<?php

namespace Router;

interface Traveler
{

    /**
     * @param Destination $destination
     * @return $this
     */
    public function travel(Destination $destination);
}
