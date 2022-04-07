<?php

namespace App\components\Logger\impl;

use App\components\Logger\Logger;
use think\facade\Log;

class ThinkLog implements Logger
{
    public static function getInstance()
    {
        //该内容可加入配置文件
        Log::init([
            'default'	=>	'file',
            'channels'	=>	[
                'file'	=>	[
                    'type'	=>	'file',
                    'path'	=>	'./logs/',
                ],
            ],
        ]);
        return new self();
    }

    public function info($message = '')
    {
        Log::info(strtoupper($message));
    }

    public function debug($message = '')
    {
        Log::debug(strtoupper($message));
    }

    public function error($message = '')
    {
        Log::error(strtoupper($message));
    }
}