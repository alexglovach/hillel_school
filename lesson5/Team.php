<?php

require_once('Soldier.php');
require_once('Commander.php');

class Team
{
    protected const MAX_TEAM_MEMBERS = 100;
    protected $teamMembers;

    public function __construct($teamSize)
    {
        $this->generateTeam($teamSize);
    }

    protected function generateTeam($teamSize)
    {
        $this->teamMembers = [];
        $this->teamMembers['Commander'] = new Commander();
        for ($i = 1; $i <= $teamSize; $i++) {
            $this->addSoldier();
        }


    }

    protected function addSoldier()
    {
        if (count($this->teamMembers) <= self::MAX_TEAM_MEMBERS) {
            $soldierNum = count($this->teamMembers) + 1;
            $this->teamMembers["Soldier S{$soldierNum}"] = new Soldier();
        }
    }

    public function showHealth()
    {
        foreach ($this->teamMembers as $teamMemberName => $teamMember) {
            echo "{$teamMemberName} HealthPoints: {$teamMember->getHealthPoints()}" . PHP_EOL;
        }
    }

    public function getAllDamage()
    {
        $damage = 0;
        foreach ($this->teamMembers as $teamMember) {
            $damage = $damage + $teamMember->getDamage();
        }
        return $damage;
    }

    public function takeHit($damage)
    {
        $hitForTeamMember = $damage / count($this->teamMembers);
        foreach ($this->teamMembers as $teamMemberName => $teamMember) {
            $teamMember->takeHit($hitForTeamMember);
            if ($teamMember->getHealthPoints() <= 0) {
                unset($this->teamMembers[$teamMemberName]);
            }
        }
    }

}
