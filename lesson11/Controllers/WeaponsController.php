<?php


namespace lesson11\Controllers;

use lesson11\Models\Weapons;

class WeaponsController
{
    private $weapons;
    public $error = NULL;
    public function __construct()
    {
        $this->weapons = new Weapons();
    }

    public function getWeapons()
    {
        return $this->weapons->selectWeapons();
    }

    public function update(Array $data)
    {
        $query = $this->weapons->updateWeapon($data);
        $this->error = $query ? NULL : 'Update failed';
        return;

    }

    public function create(array $data)
    {
        $query = $this->weapons->createWeapon($data);
        $this->error = $query ? NULL : 'Create failed';
        return;
    }

    public function delete(int $id)
    {
        $query = $this->weapons->deleteWeapon($id);
        $this->error = $query ? NULL : 'Delete failed';
        return;
    }

}