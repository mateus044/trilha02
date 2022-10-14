<?php

namespace Webjump\Canada\Model\Api;

use Webjump\Canada\Api\GenerateInformationInterface;

class GenerateInformation implements GenerateInformationInterface
{
    public function spaceToDay(string $message)
    {
       $array =  array(
           'message' => 'success webapi' . ':' . $message
       );
       return json_encode($array);
    }

    public function earthToDay(string $message)
    {
        $array =  array(
            'message' => 'success webapi: ' . $message
        );
        return json_encode($array);
    }
}
