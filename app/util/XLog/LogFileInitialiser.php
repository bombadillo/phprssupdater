<?php

namespace XLog;

include_once 'LogFileNameFormatter.php';
include_once 'LogFileCreator.php';
include_once 'Config.php';

use XLog\LogFileNameFormatter;
use XLog\LogFileCreator;
use XLog\Config;

class LogFileInitialiser
{
  public static function Setup($config)
  {
    if ($config->enable == 'false') return null;

    $logFileName = $config->location;

    if (preg_match(Config::$LogFormatPattern, $logFileName, $logFileFormat))
    {
      $logFileName = LogFileNameFormatter::Format($logFileName, $logFileFormat[1]);
    }

    LogFileCreator::CreateIfNotExists($logFileName);

    return $logFileName;
  }
}
