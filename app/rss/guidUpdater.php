<?php

namespace Rss;

include_once 'app\config\rss.php';
include_once 'app\rss\GuidFileHandler.php';
include_once 'app\util\XLog\Logger.php';

use Config\Rss as Config;
use Rss\GuidFileHandler;
use XLog\Logger;

class GuidUpdater
{
  public static function update($rssItems)
  {
    $logger = new Logger();

    $logger->log('info', 'Updating GUIDs');

    GuidFileHandler::addGuidFileIfNotExists();

    $aGuids = [];

    foreach ($rssItems as $rssItem) {
      array_push($aGuids, (string) $rssItem->guid);
    }

    GuidFileHandler::updateGuids($aGuids);
  }


}
