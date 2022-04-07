<?php

namespace Test\Service;

use App\components\Logger\impl\ThinkLog;
use PHPUnit\Framework\TestCase;
use App\Service\AppLogger;

/**
 * Class ProductHandlerTest
 */
class AppLoggerTest extends TestCase
{

    public function testInfoLog()
    {
        $logger = new AppLogger(AppLogger::TYPE_THINKLOG);
        $logger->info('This is info log message');
    }
}