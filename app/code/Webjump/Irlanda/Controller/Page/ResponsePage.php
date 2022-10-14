<?php

namespace Webjump\Irlanda\Controller\Page;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class ResponsePage extends \Magento\Framework\App\Action\Action
{
    protected $pageFactory;

    public function __construct(Context $context, PageFactory $pageFactory)
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }

    public function  execute()
    {
       return $this->pageFactory->create();
    }
}
