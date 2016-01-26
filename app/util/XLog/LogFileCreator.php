<?php

namespace XLog;

class LogFileCreator
{
  public static function CreateIfNotExists($logFileName)
  {
    if (!is_dir(dirname($logFileName)))
    {
      mkdir(dirname($logFileName), 0700);
    }

    if (!file_exists($logFileName))
    {
      $fileResource = fopen($logFileName, 'w');
      fclose($fileResource);
    }
  }
}
