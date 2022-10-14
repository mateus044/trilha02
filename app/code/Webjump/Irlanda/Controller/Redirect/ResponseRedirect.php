<?php

namespace Webjump\Irlanda\Controller\Redirect;

use Magento\Framework\App\Action\Context;
use  Magento\Framework\Controller\Result\RedirectFactory;

class ResponseRedirect extends \Magento\Framework\App\Action\Action
{
    protected $redirectfactory;

    public function __construct(Context $context, RedirectFactory $redirectfactory)
    {
        parent::__construct($context);
        $this->redirectfactory = $redirectfactory;
    }

    public function execute()
    {
        $response = $this->redirectfactory->create();
        return $response->setPath('learning/newroute/newroute');
    }
}
