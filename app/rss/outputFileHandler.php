<?php

namespace Rss;

include_once 'app\config\rss.php';
include_once 'app\file\fileCreator.php';

use Config\Rss as Config;
use File\FileCreator;

class outputFileHandler
{
  public static function addOutputFileIfNotExists()
  {
    if (!file_exists(Config::$rssOutputFileLocation))
    {
      FileCreator::create(Config::$rssOutputFileLocation);
    }
  }
}
