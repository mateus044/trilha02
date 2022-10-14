<?php

namespace Webjump\Austria\Services;

use Webjump\Austria\Model\ResourceModel\Pet\Collection;

class Teste
{
    private Collection $collection;

    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    public function teste()
    {
        $this->collection->addFieldToFilter('entity_id', ['eq' => 1]);
    }
}
