<?php

namespace Test\App;

use App\Service\AppLogger;
use PHPUnit\Framework\TestCase;
use think\facade\Log;

/**
 * Class DemoTest
 */
class DemoTest extends TestCase
{
    public function testIndex()
    {
        try {
            $demo = new \Demo(new AppLogger(), new \HttpRequest());
            $res = $demo->get_user_info();
            $this->assertEquals($res['error'], 0);
        } catch (\Exception $e) {
            $this->fail($e->getMessage());
        }

    }
}