<?php

  include_once 'app\rss\fetcher.php';
  include_once 'app\rss\newContentChecker.php';
  include_once 'app\rss\outputUpdater.php';
  include_once 'app\config\rss.php';
  include_once 'app\config\util.php';
  include_once 'app\util\fileLogger.php';

  use Rss\Fetcher;
  use Rss\NewContentChecker;
  use Rss\OutputUpdater;
  use Config\Rss as RssConfig;
  use Config\Util as UtilConfig;
  use gehaxelt\fileLogger\FileLogger;

  $log = new FileLogger(__DIR__ . UtilConfig::$logFileLocation . date('d-m-Y'));

  $log->log('App started', FileLogger::NOTICE);

  $rssFeed = Fetcher::get(RssConfig::$rssFeedUrl);

  $containsNewContent = NewContentChecker::checkForNewContent($rssFeed);

  if ($containsNewContent)
  {
      OutputUpdater::updateOutput($rssFeed);
  }
  else
  {
    $log->log('No new RSS items detected', FileLogger::NOTICE);
  }
