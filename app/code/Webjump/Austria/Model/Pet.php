<?php

namespace Webjump\Austria\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Webjump\Austria\Api\Data\PetInterface;
use Webjump\Austria\Model\ResourceModel\Pet as ResourceModel;


class Pet extends AbstractExtensibleModel implements PetInterface
{
    /**
     * Construct method from Pet Model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    public function getPetEntityId(): int
    {
       return $this->getData(self::ENTITY_ID);
    }

    public function getPetName(): string
    {
        return $this->getData(self::PET_NAME);
    }

    public function getPetOwner(): string
    {
        return $this->getData(self::PET_OWNER);
    }

    public function getOwnerTelephone(): string
    {
        return $this->getData(self::OWNER_TELEPHONE);
    }

    public function getOwnerId(): int
    {
       return $this->getData(self::OWNER_ID);
    }

    public function setPetEntityId(int $entityId): void
    {
        $this->setData(self::ENTITY_ID, $entityId);
    }

    public function setPetName(string $petName): void
    {
        $this->setData(self::PET_NAME, $petName);
    }

    public function setPetOwner(string $petOwner): void
    {
        $this->setData(self::PET_OWNER, $petOwner);
    }

    public function setOwnerTelephone(string $ownerTelephone): void
    {
        $this->setData(self::OWNER_TELEPHONE, $ownerTelephone);
    }

    public function setOwnerId(int $ownerId): void
    {
        $this->setData(self::OWNER_ID, $ownerId);
    }
}
