<?php

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
  use Config\Util as UtilConfig;
  use XLog\Logger;

  $log = new Logger();
  $log->log('trace', 'App Started');

  $rssFeed = Fetcher::get(RssConfig::$rssFeedUrl);

  $containsNewContent = NewContentChecker::checkForNewContent($rssFeed);

  if ($containsNewContent)
  {
      OutputUpdater::updateOutput($rssFeed);
  }
  else
  {
    $log->log('info', 'No new items detected');
  }
