<?php

namespace Webjump\Canada\Api;

interface GenerateInformationInterface
{
    /**
     * @param string $message
     * @return mixed
     */
    public function spaceToDay(string $message);

    /**
     * @param string $message
     * @return mixed
     */
    public function earthToDay(string $message);
}
