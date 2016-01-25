<?php

namespace Rss;

class Fetcher
{
    public static function get($url)
    {
        $rss = simplexml_load_file($url);

        return $rss;
    }
}
