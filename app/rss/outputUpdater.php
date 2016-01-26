<?php

namespace Rss;

include_once 'app\file\fileWriter.php';
include_once 'app\config\rss.php';
include_once 'app\rss\outputFileHandler.php';

use File\FileWriter;
use Config\Rss as Config;
use Rss\OutputFileHandler;

class OutputUpdater
{
    public static function updateOutput($rssFeed)
    {
        $jsonString = json_encode($rssFeed);

        OutputFileHandler::addOutputFileIfNotExists();
        FileWriter::writeStringToFile($jsonString, Config::$rssOutputFileLocation);        
    }
}
