<?php

namespace App\Service;

use App\components\Logger\impl\Log4;
use App\components\Logger\impl\ThinkLog;
use App\components\Logger\Logger;

class AppLogger implements Logger
{
    const TYPE_LOG4PHP = 'log4php';
    const TYPE_THINKLOG = 'think-log';

    private static $logger;
    private static $impls = [
        self::TYPE_LOG4PHP => Log4::class,
        self::TYPE_THINKLOG => ThinkLog::class
    ];

    public static function getInstance($type = self::TYPE_LOG4PHP)
    {
        if (!isset(self::$impls[$type])) {
            throw new \Exception("没有该类型的日志组件");
        }
        if (!self::$logger) {
            self::$logger = self::$impls[$type]::getInstance();
        }
        return self::$logger;
    }

    public function __construct($type = self::TYPE_LOG4PHP)
    {
        if (!isset(self::$impls[$type])) {
            throw new \Exception("没有该类型的日志组件");
        }
        self::$logger = self::$impls[$type]::getInstance();
    }

    public function info($message = '')
    {
        self::$logger->info($message);
    }

    public function debug($message = '')
    {
        self::$logger->debug($message);
    }

    public function error($message = '')
    {
        self::$logger->error($message);
    }
}