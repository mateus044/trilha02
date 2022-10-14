<?php

namespace Webjump\Austria\Model;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\RequestInterface;
use Webjump\Austria\Api\Data\PetInterface;
use Webjump\Austria\Api\PetRepositoryInterface;
use Webjump\Austria\Helper\ConstMessage;
use Webjump\Austria\Model\ResourceModel\Pet as petResourceModel;
use Webjump\Austria\Model\ResourceModel\Pet\Collection;
use Webjump\Austria\Model\Pet as PetModel;
use Webjump\Austria\Model\ResourceModel\Pet\CollectionFactory;


class PetRepository implements PetRepositoryInterface
{

    /**
     * @var Collection
     */
    private Collection $collection;

    /**
     * @var PetInterface
     */
    private PetInterface $petInterface;

    /**
     * @var Pet
     */
    private PetModel $petModel;

    /**
     * @var CollectionFactory
     */
    private CollectionFactory $collectionFactory;

    /**
     * @var RequestInterface
     */
    private RequestInterface $requestInterface;

    /**
     * @var Context
     */
    private Context $context;

    /**
     * @var PetFactory
     */
    private PetFactory $petFactory;

    /**
     * @var petResourceModel
     */
    private petResourceModel $petResourceModel;


    public function __construct(petResourceModel $petResourceModel , PetFactory $petFactory, Context $context, CollectionFactory $collectionFactory, Collection $collection, PetInterface $petInterface, PetModel $petModel, RequestInterface $requestInterface)
    {
        $this->collection  = $collection;
        $this->petInterface = $petInterface;
        $this->petModel = $petModel;
        $this->collectionFactory = $collectionFactory;
        $this->requestInterface = $requestInterface;
        $this->context = $context;
        $this->petFactory = $petFactory;
        $this->petResourceModel = $petResourceModel;
    }

    /**
     * @param PetInterface $pet
     * @return array|mixed|void|null
     */
    public function getPet(PetInterface $pet)
    {
        try {
            $myPet = $this->collection->getItemById($pet->getPetEntityId());
            if($myPet !== null )
            {
                return $myPet->getData();
            } else {
                return $this->messageError(ConstMessage::PET_NOT_EXISTS, 404);
            }
        }catch (\Exception $e){
            return $this->messageError(ConstMessage::ERROR_MESSAGE, $e->getCode());
        }
    }

    public function getList(): array
    {
        try {
            $pets = $this->collection->getItems();
            $pets = $this->mountPets($pets);
            return $pets;

        }catch (\Exception $e){
            return $this->messageError(ConstMessage::ERROR_MESSAGE, $e->getCode());
        }
    }

    /**
     * @param PetInterface $pet
     * @return array
     */
    public function savePet(PetInterface $pet) : array
    {
        try {
            $this->petResourceModel->save($pet);
            return $this->messageSucesso(ConstMessage::SAVE_SUCESS, 201);
        }catch (\Exception $e){
            return $this->messageError(ConstMessage::ERROR_MESSAGE, $e->getCode());
        }
    }

    /**
     * @param array $pets
     * @return array
     */
    public function mountPets(array $pets): array
    {
        $array = [];
        if(empty($pets)) {
         return $this->messageError(ConstMessage::PET_NOT_EXISTS, 404);
        }

        foreach($pets as $pet){
            $array[] = $pet->getData();
        }
        return $array;
    }

    /**
     * @param string $message
     * @param int $code
     * @return array
     */
    public function messageSucesso(string $message, int $code) : array
    {
        return ['message'=> $message, 'code' => $code];
    }

    /**
     * @param string $message
     * @param int $code
     * @return array
     */
    public function messageError(string $message, int $code): array
    {
        return ['message'=>$message, 'code'=> $code];
    }
}
