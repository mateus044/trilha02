<?php

namespace Webjump\Noruega\Plugin;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class PluginSaveLog
{

    /**
     * @param $type
     * @param $msg
     * @param $path
     * @throws \Exception
     */
    function myCustomLog($type, $msg, $path)
    {
        $log = new Logger('log');
        $log->pushHandler(new StreamHandler(BP . $path));
        $log->$type($msg);
    }
}
