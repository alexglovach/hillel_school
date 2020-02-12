<?php

require_once('AllWeaponTypes.php');
require_once('AllEquipmentsTypes.php');

class Soldier
{
    protected const DEFAULT_DAMAGE = 5;
    protected const MAX_WEAPON_SET_SIZE = 4;
    protected const DEFAULT_LIFE = 100;
    protected $weaponDamage;
    protected $healthPoints;
    protected $allWeapons;
    protected $allEquipments;
    protected $activeWeapon;

    public function __construct()
    {
        $this->defaultWeaponSet();
        if (rand(0, 1)) {
            $this->defaultEquipmentSet();
        }
        $this->calcHealthPoints();
    }


    /**
     * @return array
     */
    public function getAllWeapons()
    {
        return $this->allWeapons;
    }

    /**
     * @return int
     */
    public function getHealthPoints()
    {
        return $this->healthPoints;
    }

    /**
     * @return array
     */
    public function getAllEquipments()
    {
        return $this->allEquipments;
    }

    /**
     * @return mixed
     */
    public function getActiveWeapon()
    {
        return $this->activeWeapon;
    }

    public function setActiveWeapon($weaponName)
    {
        $this->activeWeapon = $this->allWeapons[$weaponName];
        $this->calcDamage();
    }

    protected function calcDamage()
    {
        $this->weaponDamage = self::DEFAULT_DAMAGE + $this->activeWeapon->getDamage();
    }

    protected function addToWeaponSet($weaponName)
    {
        if (count($this->allWeapons) == self::MAX_WEAPON_SET_SIZE) {
            unset($this->allWeapons[1]);
        }
        $weaponTypes = new AllWeaponTypes();
        $weaponsList = $weaponTypes->getWeaponsTypes();
        $this->allWeapons[$weaponName] = $weaponsList[$weaponName];
    }

    protected function defaultWeaponSet()
    {
        $weaponTypes = new AllWeaponTypes();
        $weaponTypesList = $weaponTypes->getWeaponsTypes();
        $this->allWeapons = [];
        $sizeOfWeaponsSet = rand(1, self::MAX_WEAPON_SET_SIZE);
        for ($i = 1; $i <= $sizeOfWeaponsSet; $i++) {
            $namesOfSetValues = array_keys($weaponTypesList);
            $randomName = $namesOfSetValues[array_rand($namesOfSetValues)];
            $this->allWeapons[$randomName] = $weaponTypesList[$randomName];
            unset($weaponTypesList[$randomName]);
            $this->setActiveWeapon($randomName);
        }
    }

    protected function defaultEquipmentSet()
    {
        $equipmentSet = [];
        $dressedBodyParts = [];
        $EquipmentSetSize = 2;
        $equipmentTypes = new AllEquipmentsTypes();
        $equipmentsList = $equipmentTypes->getTypesOfEquipments();
        while ((count($equipmentSet) < $EquipmentSetSize) and (count($equipmentsList) > 0)) {
            $namesOfSetValues = array_keys($equipmentsList);
            $randomName = $namesOfSetValues[array_rand($namesOfSetValues)];
            if (!in_array($equipmentsList[$randomName]->getPartOfBody(), $dressedBodyParts)) {
                $dressedBodyParts[] = $equipmentsList[$randomName]->getPartOfBody();
                $equipmentSet[$randomName] = $equipmentsList[$randomName];
                unset($equipmentsList[$randomName]);
            }
        }
        $this->allEquipments = $equipmentSet;
        $this->calcHealthPoints();
    }

    protected function calcHealthPoints()
    {
        $this->healthPoints = self::DEFAULT_LIFE;
        if (is_null($this->allEquipments)) {
            return;
        }
        foreach ($this->allEquipments as $equipment) {
            $this->healthPoints = $this->healthPoints + $equipment->getHealthPoints();
        }
    }

    public function takeHit($hitPoints)
    {
        $this->healthPoints = floor($this->healthPoints - $hitPoints);
    }

    public function getDamage()
    {
        return $this->weaponDamage;
    }

}