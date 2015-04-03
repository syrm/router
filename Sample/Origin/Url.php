<?php

namespace Sample\Origin;

use Router\Origin;

final class Url extends Origin
{
    private $path;

    /**
     * @param string $url
     */
    public function __construct($url)
    {
        $this->path = parse_url($url, PHP_URL_PATH);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->path;
    }
}

