<?php

/**
 * @author      Webjump Core Team <dev@webjump.com.br>
 * @copyright   2022 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 * @link        http://www.webjump.com.br
 */

declare(strict_types=1);

namespace Webjump\Noruega\Plugin;

use Magento\Framework\App\Action\Action;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Webjump\Noruega\Plugin\PluginSaveLog;

class PluginAroundAction
{

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var $savelog
     */
    private $savelog;


    public function __construct(LoggerInterface $logger, PluginSaveLog $savelog)
    {
        $this->logger = $logger;
        $this->savelog = $savelog;
    }

    /**
     * @param Action $action
     * @param $proceed
     * @param $collection
     */
    public function aroundDispatch(Action $action, \Closure $proceed, $collection)
    {
        $this->logger->debug(__METHOD__);
        $this->savelog->myCustomLog('info',     __METHOD__ . 'aroundDispatch - info - success',     $path = '/var/log/noruegaAround.log');
        $this->savelog->myCustomLog('debug',    __METHOD__ . 'aroundDispatch - debug - success',    $path = '/var/log/custom-debug.log');
        $this->savelog->myCustomLog('critical', __METHOD__ . 'aroundDispatch - critical - success', $path = '/var/log/custom-critical.log');
        $result = $proceed($collection);
        return $result;
    }
}
