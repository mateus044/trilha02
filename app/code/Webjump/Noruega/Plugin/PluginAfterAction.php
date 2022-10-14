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
use Psr\Log\LoggerInterface;
use Webjump\Noruega\Plugin\PluginSaveLog;

class PluginAfterAction
{
    /**
     * @var LoggerInterface
     */
    private $logger;
    private $savelog;

    public function __construct(LoggerInterface $logger, PluginSaveLog $savelog)
    {
        $this->logger = $logger;
        $this->savelog = $savelog;
    }

    /**
     * @param Action $action
     * @param $result
     */
    public function afterDispatch(Action $action, $result)
    {
        $this->logger->debug(__METHOD__);
        $this->savelog->myCustomLog('info',     __METHOD__ . 'afterDispach - info - success',     $path = '/var/log/noruegaAfter.log');
        $this->savelog->myCustomLog('debug',    __METHOD__ . 'afterDispach - debug - success',    $path = '/var/log/custom-debug.log');
        $this->savelog->myCustomLog('critical', __METHOD__ . 'afterDispach - critical - success', $path = '/var/log/custom-critical.log');
        return $result;
    }
}
