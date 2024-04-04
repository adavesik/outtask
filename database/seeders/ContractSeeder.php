<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contract;
use App\Models\Employee;
use App\Models\Employer;

class ContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all employers and employees
        $employers = Employer::all();
        $employees = Employee::all();

        // Iterate through employers and employees to create contracts
        foreach ($employers as $employer) {
            foreach ($employees as $employee) {
                // Create a contract with random hours_per_week (for demonstration)
                Contract::create([
                    'employer_id' => $employer->id,
                    'employee_id' => $employee->id,
                    'hours_per_week' => rand(20, 40), // Assuming hours_per_week between 20 to 40
                ]);
            }
        }
    }
}
