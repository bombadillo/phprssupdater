<?php

namespace Rss;

include_once 'app\config\rss.php';
include_once 'app\rss\GuidFileHandler.php';

use Config\Rss as Config;
use Rss\GuidFileHandler;

class GuidUpdater
{
  public static function update($rssItems)
  {
    GuidFileHandler::addGuidFileIfNotExists();

    $aGuids = [];

    foreach ($rssItems as $rssItem) {
      array_push($aGuids, (string) $rssItem->guid);
    }

    GuidFileHandler::updateGuids($aGuids);
  }


}
