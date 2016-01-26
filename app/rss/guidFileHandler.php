<?php

namespace Rss;

include_once 'app\config\rss.php';
include_once 'app\file\fileCreator.php';
include_once 'app\file\fileReader.php';
include_once 'app\file\fileWriter.php';
include_once 'app\util\XLog\Logger.php';

use Config\Rss as Config;
use File\FileCreator;
use File\FileReader;
use File\FileWriter;
use XLog\Logger;

class GuidFileHandler
{
    public static function addGuidFileIfNotExists()
    {
        if (!file_exists(Config::$rssGuidFileLocation)) {
            FileCreator::create(Config::$rssGuidFileLocation);
        }
    }

    public static function getGuids()
    {
        $guidsString = FileReader::readFile(Config::$rssGuidFileLocation);

        $decodedGuids = json_decode($guidsString);

        if (!$decodedGuids) {
            $decodedGuids = [];
        }

        return $decodedGuids;
    }

    public static function updateGuids($aGuids)
    {
        $logger = new Logger();

        $guidsJson = json_encode($aGuids);

        $updated = FileWriter::writeStringToFile($guidsJson, Config::$rssGuidFileLocation);

        $message = 'GUIDs updated';
        $logLevel = 'info';
        if (!$updated) {
            $message = 'GUIDs not updated';
            $logLevel = 'error';
        }

        $logger->log($logLevel, $message);
    }
}
