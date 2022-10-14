<?php

namespace Webjump\Austria\Api;

use Webjump\Austria\Api\Data\PetInterface;
use Webjump\Austria\Model\ResourceModel\Pet\CollectionFactory;

interface PetRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getPet(PetInterface $pet);

    /**
     * @return array
     */
    public function getList(): array;

    /**
     * @param PetInterface $pet
     * @return array
     */
    public function savePet(PetInterface $pet): array;

    /**
     * @param string $message
     * @param int $code
     * @return array
     */
    public function messageError(string $message, int $code): array;

    /**
     * @param string $message
     * @param int $code
     * @return array
     */
    public function messageSucesso(string $message, int $code): array;

    /**
     * @param array $pets
     * @return array
     */
    public function mountPets(array $pets) : array;

}
