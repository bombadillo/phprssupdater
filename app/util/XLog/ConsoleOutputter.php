<?php

namespace XLog;

include_once 'ConsoleConfig.php';

use XLog\ConsoleConfig;

class ConsoleOutputter
{
  public static function Output($level, $message, $enabled)
  {
    if ($enabled == 'true')
    {
      $levelColour = ConsoleConfig::$LevelColours[$level];
      echo sprintf('%s[%s] [%s] %s%s%s', $levelColour,
                   date('y-m-d h-m-s'), $level, $message,
                   PHP_EOL, "\033[0m");
    }
  }
}
