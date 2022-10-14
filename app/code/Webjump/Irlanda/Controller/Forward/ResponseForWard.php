<?php

namespace Webjump\Irlanda\Controller\Forward;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\ForwardFactory;

class ResponseForWard extends \Magento\Framework\App\Action\Action
{
    protected $forwardfactory;

    public function __construct(Context $context, ForwardFactory $forwardfactory)
    {
        parent::__construct($context);
        $this->forwardfactory = $forwardfactory;
    }

    public function execute()
    {
        $forwardfactory = $this->forwardfactory->create();
        return $forwardfactory->setController('Forward')->forward('myteste');
    }
}
