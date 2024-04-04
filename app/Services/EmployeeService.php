<?php

namespace App\Services;

use App\Models\Employee;
use App\Contracts\EmployeeImporter;

class EmployeeService
{
    protected $importer;

    public function __construct(EmployeeImporter $importer)
    {
        $this->importer = $importer;
    }

    public function getAllEmployees()
    {
        return Employee::all();
    }

    public function syncFromApi()
    {
        $employees = $this->importer->importEmployees();

        // In order to trigger individual deletions
        Employee::all()->each->delete();

        foreach ($employees as $employee) {

            $fullName = $employee['last_name'] . ' ' . $employee['first_name'];

            // Truncate the "ssn" field up to 9 digits while preserving leading zeros????????????
            //$truncatedSsn = sprintf('%09d', substr($employee['ssn'], 0, 9));

            $employeesData[] = [
                'full_name' => $fullName,
                'ssn' => $employee['ssn'],
                'email' => $employee['email'],
            ];
        }

        try {
            $insertedRows = Employee::insert($employeesData);
            if ($insertedRows === count($employeesData)) {
                // All rows inserted successfully. Any possible functional goes here)))
            } else {
                // Handle potential insertion or errors
            }
        } catch (\Exception $e) {
            // ION real-world project we need to handle insertion exceptions
        }

        return $insertedRows; // Consider returning count or success message
    }

    private function truncateSsn(string $ssn): string
    {
        return substr($ssn, 0, 9); // Truncate to first 9 characters
    }
}
