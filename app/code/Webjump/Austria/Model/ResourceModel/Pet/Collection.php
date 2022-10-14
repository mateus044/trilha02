<?php

namespace Webjump\Austria\Model\ResourceModel\Pet;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Webjump\Austria\Model\Pet;
use Webjump\Austria\Model\ResourceModel\Pet as PetResourceModel;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Pet::class, PetResourceModel::class);
    }
}
