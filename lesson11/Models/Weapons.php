<?php


namespace lesson11\Models;


use lesson11\DbConnect;

class Weapons
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = DbConnect::getPdo();
    }

    public function selectWeapons()
    {
        $stmt = $this->pdo->query('SELECT * FROM weapons');
        return $stmt->fetchAll();
    }

    public function updateWeapon(Array $data)
    {
        $sql = "UPDATE weapons SET name=?, type=?, damage=?, reload_time=?, status=? WHERE id=?";
        return $this->pdo->prepare($sql)->execute([
                $data['name'],
                $data['type'],
                $data['damage'],
                $data['reload_time'],
                $data['status'],
                $data['id']
            ]);

    }

    public function createWeapon($data)
    {
        $sql = "INSERT INTO weapons(name, type, damage, reload_time, status) VALUES(?,?,?,?,?)";
        return $this->pdo->prepare($sql)->execute([
                $data['name'],
                $data['type'],
                $data['damage'],
                $data['reload_time'],
                $data['status']
            ]);
    }

    public function deleteWeapon(int $id)
    {
        $sql = "DELETE FROM weapons WHERE id=?";
        return $this->pdo->prepare($sql)->execute([$id]);

    }
}