<?php

namespace XLog;

class ConfigRetriever
{
  public static function Get()
  {
    $sConfigLocation = dirname($_SERVER['PHP_SELF']) . '\XLog.config';
    $sConfigContents = file_get_contents($sConfigLocation);

    $decoded = json_decode($sConfigContents);

    if (is_null($decoded))
    {
      throw new \Exception("The config file could not be parsed.");
    }
    return $decoded;
  }
}
