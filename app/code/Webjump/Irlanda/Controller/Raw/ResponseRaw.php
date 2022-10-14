<?php

namespace Webjump\Irlanda\Controller\Raw;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\Raw;

class ResponseRaw extends \Magento\Framework\App\Action\Action
{
    protected $raw;

    public function __construct(Context $context ,Raw $raw)
    {
        parent::__construct($context);
        $this->raw = $raw;
    }

    public function execute()
    {
        return $this->raw
               ->setContents('Lorem Ipsum is simply dummy text of the printing and
               typesetting industry.');
    }
}
