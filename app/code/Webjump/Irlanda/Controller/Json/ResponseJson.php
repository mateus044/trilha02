<?php

namespace Webjump\Irlanda\Controller\Json;

use Magento\Framework\App\Action\Context;
use  Magento\Framework\Controller\Result\JsonFactory;

class ResponseJson extends \Magento\Framework\App\Action\Action
{
    protected $jsonFactory;

    public function  __construct(Context $context, JsonFactory $jsonFactory)
    {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
    }

    public  function  execute()
    {
        return $this->jsonFactory
            ->create()
            ->setData(
            ['name'=> 'Aabrão', 'lastName'=>'Soares', 'age'=>'654', 'state'=> 'OH']);
    }
}
