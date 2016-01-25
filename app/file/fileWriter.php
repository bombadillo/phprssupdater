<?php

namespace File;

class FileWriter
{
  public static function writeStringToFile($string, $fileName)
  {
    return file_put_contents($fileName, $string);
  }
}
