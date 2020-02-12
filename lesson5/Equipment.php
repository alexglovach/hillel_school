<?php

class Equipment
{
    private $healthPoints;
    private $partOfBody;

    public function __construct($healthPoints, $partOfBody)
    {
        $this->healthPoints = $healthPoints;
        $this->partOfBody = $partOfBody;
    }

    public function getHealthPoints()
    {
        return $this->healthPoints;
    }

    public function getPartOfBody()
    {
        return $this->partOfBody;
    }
}