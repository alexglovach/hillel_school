<?php

class Manager extends Worker implements ManagerInterface
{
    protected $position = 'Manager';
    protected $employees = [];

    public function addEmployee(EmployeeInterface $employee): void
    {
        $this->employees[] = $employee;
    }

    public function getEmployees(): array
    {
        return $this->employees;
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
        $currentSalaryWithEmployeeBonus = $this->salary * ((1 + $yearsWithBonus) * 0.05 + $this->getCountEmployees() * 0.02);
        return floor($currentSalaryWithEmployeeBonus);
    }

    public function getCountEmployees(): int
    {
        return count($this->employees);
    }
}
