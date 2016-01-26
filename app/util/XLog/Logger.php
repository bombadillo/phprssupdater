<?php

namespace XLog;

include_once 'UserConfigRetriever.php';
include_once 'LogFileInitialiser.php';
include_once 'LogFileOutputter.php';
include_once 'ConsoleOutputter.php';

use XLog\UserConfigRetriever;
use XLog\LogFileInitialiser;
use XLog\LogFileOutputter;
use XLog\ConsoleOutputter;

class Logger
{
  private $LogFile;
  private $Config;

  function __construct()
  {
    $this->Config = UserConfigRetriever::Get();
    $this->LogFile = LogFileInitialiser::Setup($this->Config->logFile);
  }

  public function Log($level, $message)
  {
    ConsoleOutputter::Output($level, $message, $this->Config);
    LogFileOutputter::Output($this->LogFile, $level, $message, $this->Config);
  }
}
