<?php

class Company {
    private string $name;

    private array $employees = [];


    public function getEmpoyees() {
        return $this->employees;
    }

    public function addEmployee(Employee $employee) {
        return $this->employees[] = $employee;
    }
}