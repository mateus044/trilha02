<?php

namespace Webjump\Austria\Model;

class State extends \Magento\Framework\App\State
{
    public function validateAreaCode()
    {
        if (!isset($this->_areaCode)) {
            return false;
        }
        return true;
    }
}
