<?php

namespace XLog;

class BacktraceRetriever
{
  public static function Retrieve($backtrace)
  {
    unset($backtrace[0]);
    if (count($backtrace) > 1) unset($backtrace[1]);
    rsort($backtrace);

    $formattedBacktrace = '';

    foreach ($backtrace as $backtrace) {
      $formattedBacktrace .= sprintf('%s.%s -> ', $backtrace['class'], $backtrace['function']);
    }

    $formattedBacktrace = substr($formattedBacktrace, 0, strlen($formattedBacktrace) - 4);

    return $formattedBacktrace;
  }
}
