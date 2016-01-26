<?php

namespace Rss;

include_once 'app\file\fileReader.php';
include __DIR__.'\..\config\rss.php';
include_once 'app\rss\guidFileHandler.php';
include_once 'app\util\XLog\Logger.php';

use File\FileReader;
use Config\Rss as Config;
use Rss\GuidFileHandler;
use XLog\Logger;

class NewContentChecker
{
    public static function checkForNewContent($rssFeed)
    {
        $log = new Logger();

        $rssFileContents = FileReader::readFile(Config::$rssGuidFileLocation);

        if (!$rssFileContents) {
            $log->log('info', 'GUID file is empty');
            return true;
        }

        $aGuids = GuidFileHandler::getGuids();

        foreach ($rssFeed->channel->item as $item) {
          if (!in_array((string) $item->guid, $aGuids))
          {
              $log->log('info', 'Rss file has new content');
              return true;
          }
        }

        return false;
    }
}
