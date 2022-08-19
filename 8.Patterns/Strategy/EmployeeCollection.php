<?php

class EmployeeCollection {
    private $employees = [];
    private $strategy;

    public function __construct(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function setStrategy(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    public function orderByDepartment(): void
    {
        $this->employees = $this->strategy->doSort($this->getEmployees(), 'department');
    }

    public function orderBySalary(): void
    {
        $this->employees = $this->strategy->doSort($this->getEmployees(), 'salary');
    }

    public function orderByName(): void
    {
        $this->employees = $this->strategy->doSort($this->getEmployees(), 'name');
    }

    public function addEmployee(Employee $employee) {
        $this->employees = $employee;
    }

    public function getEmployees() {
        return $this->employees;
    }
}