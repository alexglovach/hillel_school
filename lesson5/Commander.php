<?php

class Commander extends Soldier
{
    protected const DEFAULT_HEALTH = 110;

    public function __construct()
    {
        $this->allWeapons = [];
        $this->addToWeaponSet('gun');
        $this->setActiveWeapon('gun');
        $this->defaultEquipmentSet();
        foreach ($this->allEquipments as $equipment) {
            $this->healthPoints = self::DEFAULT_HEALTH + $equipment->getHealthPoints();
        }
    }

}