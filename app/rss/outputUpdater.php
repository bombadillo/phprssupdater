<?php

namespace Rss;

include_once 'app\file\fileWriter.php';
include_once 'app\config\rss.php';
include_once 'app\rss\outputFileHandler.php';
include_once 'app\util\XLog\Logger.php';

use File\FileWriter;
use Config\Rss as Config;
use Rss\OutputFileHandler;
use XLog\Logger;

class OutputUpdater
{
    public static function updateOutput($rssFeed)
    {
        $logger = new Logger();

        $jsonString = json_encode($rssFeed);

        OutputFileHandler::addOutputFileIfNotExists();
        $updated = FileWriter::writeStringToFile($jsonString, Config::$rssOutputFileLocation);

        $message = 'Output updated';
        $logLevel = 'info';
        if (!$updated) {
            $message = 'Output not updated';
            $logLevel = 'error';
        }

        $logger->log($logLevel, $message);
    }
}
