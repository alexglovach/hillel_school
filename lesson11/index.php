<?php

require_once '../vendor/autoload.php';

use lesson11\Controllers\WeaponsController;



$weapons = new WeaponsController();
$error = $weapons->error;

if (isset($_POST['update'])) {
    $weapons->update($_POST);
}
if (isset($_POST['delete'])) {
    $weapons->delete($_POST['id']);
}
if (isset($_POST['create'])) {
    $weapons->create($_POST);
}

$objects = $weapons->getWeapons();

include 'Views/index.php';




