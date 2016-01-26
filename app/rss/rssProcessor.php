<?php

namespace Rss;

include_once 'app\rss\fetcher.php';
include_once 'app\rss\newContentChecker.php';
include_once 'app\rss\outputUpdater.php';
include_once 'app\config\rss.php';
include_once 'app\config\util.php';
include_once 'app\util\XLog\Logger.php';

use Rss\Fetcher;
use Rss\NewContentChecker;
use Rss\OutputUpdater;
use Config\Rss as RssConfig;
use XLog\Logger;

class RssProcessor
{
  public static function process()
  {
    $logger = new Logger();

    $rssFeed = Fetcher::get(RssConfig::$rssFeedUrl);

    $containsNewContent = NewContentChecker::checkForNewContent($rssFeed);

    if ($containsNewContent)
    {
        $logger->log('info', 'Updating output');
        OutputUpdater::updateOutput($rssFeed);
    }
    else
    {
        $logger->log('info', 'No new items detected');
    }
  }
}
