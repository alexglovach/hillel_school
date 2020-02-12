<?php

require_once('Weapon.php');

class AllWeaponTypes
{
    private $WeaponsTypes;

    public function __construct()
    {
        $this->WeaponsTypes = [
            'knife' => new Weapon(10, 0),
            'gun' => new Weapon(30, 1),
            'automaticGun' => new Weapon(60, 1),
            'grenade' => new Weapon(80, 0),
            'launcher' => new Weapon(95, 3)
        ];
    }

    public function getWeaponsTypes()
    {
        return $this->WeaponsTypes;
    }
}