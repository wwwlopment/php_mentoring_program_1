<?php

class Employee {

    private string $name;

    private int $salary;

    private string $department;

    public function __construct(string $name, string $department, float $salary) {
        $this->name = $name;
        $this->department = $department;
        $this->salary = $salary;
    }

    public function getSalary() {
        return $this->salary;
    }

    public function getDepartment() {
        return $this->department;
    }

    public function getName() {
        return $this->name;
    }

}