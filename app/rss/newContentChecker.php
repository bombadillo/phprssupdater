<?php

namespace Rss;

include_once 'app\file\fileReader.php';
include __DIR__.'\..\config\rss.php';
include_once 'app\rss\guidFileHandler.php';

use File\FileReader;
use Config\Rss as Config;
use Rss\GuidFileHandler;

class NewContentChecker
{
    private $rssFeedFileLocation = '';

    public static function checkForNewContent($rssFeed)
    {
        $rssFileContents = FileReader::readFile(Config::$rssGuidFileLocation);

        if (!$rssFileContents) {
            return true;
        }

        $aGuids = GuidFileHandler::getGuids();

        foreach ($rssFeed->channel->item as $item) {
          if (!in_array((string) $item->guid, $aGuids))
          {
              echo "new content available" . PHP_EOL;
              return true;
          }
        }

        return false;
    }
}
