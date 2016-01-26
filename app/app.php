<?php

namespace PhpRssUpdater;

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

class App
{
    private $Logger;

    function __construct()
    {
        $this->Logger = new Logger();
    }

    public function Start()
    {
      $this->Logger->log('trace', 'App Started');
      
      $rssFeed = Fetcher::get(RssConfig::$rssFeedUrl);

      $containsNewContent = NewContentChecker::checkForNewContent($rssFeed);

      if ($containsNewContent) {
          OutputUpdater::updateOutput($rssFeed);
      } else {
          $this->Logger->log('info', 'No new items detected');
      }
    }
}
