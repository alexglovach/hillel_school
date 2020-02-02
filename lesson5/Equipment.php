<?php


class Equipment
{
    private $healthPoint;

    private $bodyPart;

    /**
     * @return mixed
     */
    public function getHealthPoint()
    {
        return $this->healthPoint;
    }

    /**
     * @param mixed $healthPoint
     */
    public function setHealthPoint($healthPoint)
    {
        $this->healthPoint = $healthPoint;
    }

    /**
     * @return mixed
     */
    public function getBodyPart()
    {
        return $this->bodyPart;
    }

    /**
     * @param mixed $bodyPart
     */
    public function setBodyPart($bodyPart)
    {
        $this->bodyPart = $bodyPart;
    }
}