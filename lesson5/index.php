<?php

require_once('Team.php');

$team1 = new Team(10);
$team2 = new Team(5);
echo "team1: Health Before" . PHP_EOL;
$team1->showHealth();
echo "team2 Health Before" . PHP_EOL;
$team2->showHealth();
echo "team1 Summary Damage: {$team1->getAllDamage()}" . PHP_EOL;
echo "team2 Summary Damage: {$team2->getAllDamage()}" . PHP_EOL;
$team2->takeHit($team1->getAllDamage());
$team1->takeHit($team2->getAllDamage());

echo "-------- FIGHT!!! --------" .PHP_EOL;

echo "team1 Health After " . PHP_EOL;
$team1->showHealth();
echo "team2 Health After" . PHP_EOL;
$team2->showHealth();


