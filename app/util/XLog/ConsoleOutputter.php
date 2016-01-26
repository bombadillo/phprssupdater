<?php

namespace XLog;

include_once 'Config.php';

use XLog\Config;

class ConsoleOutputter
{
  public static function Output($level, $message, $userConfig)
  {
    $minLevel = $userConfig->console->minLevel;
    $levelHasPermission = LevelPermissionHandler::CheckIfPermitted($level, $minLevel);

    if ($userConfig->console->enable == 'true' && $levelHasPermission)
    {
      $levelColour = Config::$LevelColours[$level];
      echo sprintf('%s[%s] [%s] %s%s%s', $levelColour,
                   date('y-m-d h-m-s'), $level, $message,
                   PHP_EOL, "\033[0m");
    }
  }
}
