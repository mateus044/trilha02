<?php

namespace  Webjump\Noruega\Cron;

use Psr\Log\LoggerInterface;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class CreateMessage
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var  $savelog
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger  = $logger;
    }

    public function createMesageLog()
    {
        $this->logger->debug(__METHOD__);
        $this->myCustomLog('info', __METHOD__ . 'MINHA CRON FOI SALVA COM SUCESSO - info - success', $path = '/var/log/cron.log');
    }

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
