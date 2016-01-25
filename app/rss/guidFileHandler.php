<?php

namespace Rss;

include_once 'app\config\rss.php';
include_once 'app\file\fileCreator.php';
include_once 'app\file\fileReader.php';
include_once 'app\file\fileWriter.php';

use Config\Rss as Config;
use File\FileCreator;
use File\FileReader;
use File\FileWriter;

class GuidFileHandler
{
  public static function addGuidFileIfNotExists()
  {
    if (!file_exists(Config::$rssGuidFileLocation))
    {
      FileCreator::create(Config::$rssGuidFileLocation);
    }
  }

  public static function getGuids()
  {
    $guidsString = FileReader::readFile(Config::$rssGuidFileLocation);

    $decodedGuids = json_decode($guidsString);

    if (!$decodedGuids) $decodedGuids = [];

    return $decodedGuids;
  }

  public static function updateGuids($aGuids)
  {
    $guidsJson = json_encode($aGuids);

    FileWriter::writeStringToFile($guidsJson, Config::$rssGuidFileLocation);
  }
}
