<?php


class Weapons
{
    private $damage;

    private $reload;

    /**
     * @return mixed
     */
    public function getDamage()
    {
        return $this->damage;
    }

    /**
     * @param mixed $damage
     */
    public function setDamage($damage)
    {
        $this->damage = $damage;
    }

    /**
     * @return mixed
     */
    public function getReload()
    {
        return $this->reload;
    }

    /**
     * @param mixed $reload
     */
    public function setReload($reload)
    {
        $this->reload = $reload;
    }


}