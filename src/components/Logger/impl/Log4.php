<?php

namespace App\components\Logger\impl;

use App\components\Logger\Logger;

class Log4 implements Logger
{
    private static $instance = null;

    private function __construct() {
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = \Logger::getLogger("Log");
        }
        return self::$instance;
    }

    public function info($message = '')
    {
        self::$instance->info($message);
    }

    public function debug($message = '')
    {
        self::$instance->debug($message);
    }

    public function error($message = '')
    {
        self::$instance->error($message);
    }
}