<?php

class Worker implements EmployeeInterface
{
    protected $position;
    protected $name;
    protected $salary;
    protected $startDate;

    public function __construct(string $name, int $salary, string $startDate)
    {
        $this->name = $name;
        $this->position = 'Worker';
        $this->salary = $salary;
        $this->startDate = new DateTime($startDate);
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSalary(): int
    {
        $currentDateTime = new DateTime();
        $interval = $this->startDate->diff($currentDateTime);
        $seniorityInYears = $interval->format("%y");
        if ($seniorityInYears >= 2) {
            $yearsWithBonus = $seniorityInYears - 1;
        } else {
            $yearsWithBonus = 0;
        }
        $currentYearSalary = $this->salary * ((1 + $yearsWithBonus) * 0.05);
        return floor($currentYearSalary);
    }

    public function getStartDate(): DateTimeInterface
    {
        return $this->startDate;
    }
}
