<?php

namespace App\components\Logger;

interface Logger
{
    public static function getInstance();
    public function info($message = '');
    public function debug($message = '');
    public function error($message = '');
}