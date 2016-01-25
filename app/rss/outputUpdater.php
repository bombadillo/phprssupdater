<?php

namespace Rss;

include_once 'app\file\fileWriter.php';
include_once 'app\rss\guidUpdater.php';
include_once 'app\config\rss.php';

use File\FileWriter;
use Rss\GuidUpdater;
use Config\Rss as Config;

class OutputUpdater
{
    public static function updateOutput($rssFeed)
    {
        $jsonString = json_encode($rssFeed);

        FileWriter::writeStringToFile($jsonString, Config::$rssOutputFileLocation);
        GuidUpdater::update($rssFeed->channel->item);
    }
}