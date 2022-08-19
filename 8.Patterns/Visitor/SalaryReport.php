<?php

class SalaryReport {

    // Report on the sum of employee salaries in the Company.
    public function TotalSallaryReport(Company $company) {
        $total = 0;
        foreach ($company->getEmpoyees() as $empoyee) {
            $total += $empoyee->getSalary();
        }
        return $total;
    }
    // Report on the total number of employees for a Company.
    public function TotalNumberOfEmployeesReport(Company $company): int {
        return count($company->getEmpoyees());
    }
    // Report on the average employee salary in the Company.
    public function AvarageSallaryReport() {
        return $this->TotalSallaryReport() / $this->TotalNumberOfEmployeesReport();
    }
    // Report that summarizes the number of employees per department.
    public function NumberOfEmployeeperDepartmentReport(Company $company): array {
        $total = [];
        foreach ($company->getEmpoyees() as $empoyee) {
            if (!isset($total[$empoyee->getDepartment()])){
                $total[$empoyee->getDepartment()] = 0;
                continue;
            }
            $total[$empoyee->getDepartment()] += $empoyee->getSalary();
        }
        return $total;
    }

}