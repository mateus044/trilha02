<?php

namespace Webjump\Noruega\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Webjump\Noruega\Plugin\PluginSaveLog;


class MyObserverNorwey implements ObserverInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var  $savelog
     */
    private $savelog;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger  = $logger;
    }

    public function execute(Observer $observer)
    {
        $this->logger->debug(__METHOD__);
        $this->myCustomLog('info', __METHOD__ . 'FrontEndObserver - info - success', $path = '/var/log/observer.log');
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
