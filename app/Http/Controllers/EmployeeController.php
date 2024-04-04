<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\EmployeeImporter;
use App\Jobs\DeleteAllEmployeesJob;
use App\Models\Employee;

class EmployeeController extends Controller
{
    protected $importer;

    public function __construct(EmployeeImporter $importer)
    {
        $this->importer = $importer;
    }

    public function index()
    {
      $employees = Employee::all(); 
      return view('employees.index', compact('employees')); 
    }

    public function syncApi()
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

        Employee::insert($employeesData);

        return response()->json(['message' => 'Synced with API successfully']);
    }

    public function deleteEmployees()
    {
        DeleteAllEmployeesJob::dispatch();

        return response()->json(['message' => 'All employees deleted successfully']);
    }
}
