<?php

namespace Webjump\Austria\Api\Data;

interface PetInterface
{
    /**
     * @const ENTITY_ID
     */
    const ENTITY_ID = 'entity_id';

    /**
     * @const PET_NAME
     */
    const PET_NAME  = 'pet_name';

    /**
     * @const PET_OWNER
     */
    const PET_OWNER = 'pet_owner';

    /**
     * @const OWNER_TELEPHONE
     */
    const OWNER_TELEPHONE = 'owner_telephone';

    /**
     * @const OWNER_ID
     */
    const OWNER_ID = 'owner_id';

    /**
     * @return mixed
     */
    public function getPetEntityId();

    /**
     * @return string
     */
    public function getPetName() : string;

    /**
     * @return string
     */
    public function getPetOwner() : string;

    /**
     * @return string
     */
    public function getOwnerTelephone() : string;

    /**
     * @return int
     */
    public function getOwnerId() : int;

    /**
     * @param int $entityId
     * @return void
     */
    public function setPetEntityId(int $entityId) : void;

    /**
     * @param string $petName
     * @return void
     */
    public function setPetName(string $petName) : void;

    /**
     * @param string $petOwner
     * @return void
     */
    public function setPetOwner(string $petOwner) : void;

    /**
     * @param string $ownerTelephone
     * @return void
     */
    public function setOwnerTelephone(string $ownerTelephone) : void;

    /**
     * @param int $ownerId
     * @return void
     */
    public function setOwnerId(int $ownerId) : void;
}
