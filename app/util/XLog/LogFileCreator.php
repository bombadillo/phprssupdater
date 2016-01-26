<?php

namespace XLog;

class LogFileCreator
{
  public static function CreateIfNotExists($logFileName)
  {
    if (!file_exists($logFileName))
    {
      $fileResource = fopen($logFileName, 'w');
      fclose($fileResource);
    }
  }
}
