<?php

namespace File;

class FileReader
{
    public static function readFile($fileName)
    {
        if (file_exists($fileName))
        {
            $fileContents = file_get_contents($fileName);

            return $fileContents;
        }

        return;
    }
}
