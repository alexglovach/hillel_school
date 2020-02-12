<?php

require_once('Equipment.php');

class AllEquipmentsTypes
{
    private $typesOfEquipments;

    public function __construct()
    {
        $this->typesOfEquipments = [
            'helmet lv1' => new Equipment(10, 'head'),
            'helmet lv2' => new Equipment(20, 'head'),
            'helmet lv3' => new Equipment(30, 'head'),
            'bulletproof lv1' => new Equipment(15, 'body'),
            'bulletproof lv2' => new Equipment(30, 'body'),
            'bulletproof lv3' => new Equipment(45, 'body'),
        ];
    }

    public function getTypesOfEquipments()
    {
        return $this->typesOfEquipments;
    }
}