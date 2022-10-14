<?php

namespace Webjump\Austria\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Pet extends AbstractDb
{
    protected function  _construct( )
    {
        $this->_init('pet_table', 'entity_id');
    }
}
