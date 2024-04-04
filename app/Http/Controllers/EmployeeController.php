<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\DeleteAllEmployeesJob;
use App\Services\EmployeeService;

class EmployeeController extends Controller
{
    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function index()
    {
        $employees = $this->employeeService->getAllEmployees();
        return view('employees.index', compact('employees'));
    }

    public function syncApi()
    {
        $employees = $this->employeeService->syncFromApi();
        return response()->json(['message' => 'Synced with API endpoint successfully']);
    }

    public function deleteEmployees()
    {
        DeleteAllEmployeesJob::dispatch();
        return response()->json(['message' => 'All employees deleted successfully']);
    }
}
