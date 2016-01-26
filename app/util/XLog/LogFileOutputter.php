<?php

namespace XLog;

include_once 'BacktraceRetriever.php';
include_once 'LevelPermissionHandler.php';

use XLog\BacktraceRetriever;
use XLog\LevelPermissionHandler;

class LogFileOutputter
{
  public static function Output($logFile, $level, $message, $userConfig)
  {
    $minLevel = $userConfig->logFile->minLevel;
    $levelHasPermission = LevelPermissionHandler::CheckIfPermitted($level, $minLevel);

    if ($userConfig->logFile->enable == 'true' && $levelHasPermission)
    {
      $backtrace = BacktraceRetriever::Retrieve(debug_backtrace());
      $logItem = sprintf('[%s] [%s] [%s] %s%s', date('y-m-d h-m-s'), $level, $backtrace, $message, PHP_EOL);

      file_put_contents($logFile, $logItem, FILE_APPEND);
    }
  }
}
