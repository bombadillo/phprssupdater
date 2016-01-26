<?php

namespace PhpRssUpdater;

include_once 'app\util\XLog\Logger.php';
include_once 'app\rss\rssProcessor.php';

use XLog\Logger;
use Rss\RssProcessor;

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

      RssProcessor::process();
    }
}
