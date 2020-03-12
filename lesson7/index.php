<?php

require_once './autoload.php';

$team1 = new Team();
$worker1 = new Worker();
echo $team1->getAllDamage();
echo $worker1->getSalary();
