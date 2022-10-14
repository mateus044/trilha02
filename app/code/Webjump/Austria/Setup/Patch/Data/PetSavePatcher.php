<?php

namespace Webjump\Austria\Setup\Patch\Data;

use Faker;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Webjump\Austria\Model\PetRepository;
use Webjump\Austria\Model\PetFactory;


use Webjump\Austria\Model\ResourceModel\Pet as petResourceModel;

class PetSavePatcher implements  DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private ModuleDataSetupInterface $moduleDataSetup;

    /**
     * @var PetFactory
     */
    private PetFactory $petFactory;

    /**
     * @var petResourceModel
     */
    private petResourceModel $petResourceModel;

    public function __construct(ModuleDataSetupInterface $moduleDataSetup, petResourceModel $petResourceModel, PetFactory $petFactory)
    {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->petResourceModel = $petResourceModel;
        $this->petFactory = $petFactory;
    }

    /**
     * @return array|string[]
     */
    public static function getDependencies(): array
    {
        return [];
    }

    /**
     * @return array|string[]
     */
    public function getAliases(): array
    {
        return [];
    }

    public function apply()
    {
        $sampleData = $this->mountPet();
        foreach ($sampleData as $data) {
            $insertData = $this->petFactory->create()->setData($data);
            $this->petResourceModel->save($insertData);
        }
    }

    /**
     * @return array
     */
    public function mountPet() : array
    {
        $faker = Faker\Factory::create();
        $pet = [];
        for($i = 0; $i<=2; $i++){
            $pet[$i] = [
                'pet_name' => $faker->lastName,
                'pet_owner' => $faker->name,
                'owner_telephone' => $faker->phoneNumber,
                'owner_id' => 1
            ];
        }
        return $pet;
    }
}
