<?php

namespace File;

class FileCreator
{
  static function create($fileName)
  {
    $fileResource = fopen($fileName, 'w');
    fclose($fileResource);
  }
}
