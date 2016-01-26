<?php

namespace XLog;

class Config
{
    public static $LogFormatPattern = '/\${(.*?)}/';

    public static $LevelColours =
    [
        'fatal' => "\e[1;31m",
        'error' => "\033[31m",
        'warn' => "\033[33m",
        'info' => "\033[36m",
        'debug' => "\033[32m",
        'trace' => "\033[35m"
    ];

    public static $Levels =
    [
        'fatal',
        'error',
        'warn',
        'info',
        'debug',
        'trace'
    ];        
}
