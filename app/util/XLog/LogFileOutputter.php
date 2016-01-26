<?php

namespace XLog;

include_once 'BacktraceRetriever.php';

use XLog\BacktraceRetriever;

class LogFileOutputter
{
  public static function Output($logFile, $level, $message, $enabled)
  {
    if ($enabled == 'true')
    {
      $backtrace = BacktraceRetriever::Retrieve(debug_backtrace());
      $logItem = sprintf('[%s] [%s] [%s] %s%s', date('y-m-d h-m-s'), $level, $backtrace, $message, PHP_EOL);

      file_put_contents($logFile, $logItem, FILE_APPEND);
    }
  }
}
