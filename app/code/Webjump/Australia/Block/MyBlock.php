<?php

namespace Webjump\Australia\Block;

class MyBlock extends \Magento\Framework\View\Element\Template
{
    // Métodos públicos ficam disponíveis dentro do phtml na variável $block
    public function getHello()
    {
        return "Hello Magenteiro!";
    }
}
