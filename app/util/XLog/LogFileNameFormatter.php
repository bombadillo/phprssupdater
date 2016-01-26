<?php

namespace XLog;

include_once 'Config.php';

use XLog\Config;

class LogFileNameFormatter
{
  private static $LogFormats = ['shortDate'];

  public static function Format($fileName, $logFileFormat)
  {
    switch ($logFileFormat) {
      case 'shortDate':
        $fileName = preg_replace(Config::$LogFormatPattern, date('d-m-Y'), $fileName);
        break;

      default:
        return false;
        break;
    }
    
    return $fileName;
  }
}
