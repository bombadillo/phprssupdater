<?php

namespace File;

class FileCreator
{
  static function create($fileName)
  {
    if (!is_dir(dirname($fileName)))
    {
      mkdir(dirname($fileName), 0700);
    }

    if (!file_exists($fileName))
    {
      $fileResource = fopen($fileName, 'w');
      fclose($fileResource);
    }
  }
}
