<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'full_name' => 'John Doe',
            'email' => 'john@example.com',
            'ssn' => '123456789',
        ]);

        Employee::create([
            'full_name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'ssn' => '987654321',
        ]);
        
        Employee::create([
            'full_name' => 'Alice Johnson',
            'email' => 'alice@example.com',
            'ssn' => '456123789',
        ]);
        
        Employee::create([
            'full_name' => 'Bob Brown',
            'email' => 'bob@example.com',
            'ssn' => '654987321',
        ]);
        
        Employee::create([
            'full_name' => 'Emily Davis',
            'email' => 'emily@example.com',
            'ssn' => '321456987',
        ]);
        
        Employee::create([
            'full_name' => 'Michael Wilson',
            'email' => 'michael@example.com',
            'ssn' => '789654123',
        ]);
        
        Employee::create([
            'full_name' => 'Sarah Taylor',
            'email' => 'sarah@example.com',
            'ssn' => '852963741',
        ]);
        
        Employee::create([
            'full_name' => 'David Martinez',
            'email' => 'david@example.com',
            'ssn' => '147258369',
        ]);
        
        Employee::create([
            'full_name' => 'Jessica Lee',
            'email' => 'jessica@example.com',
            'ssn' => '369852147',
        ]);
        
        Employee::create([
            'full_name' => 'Ryan Thompson',
            'email' => 'ryan@example.com',
            'ssn' => '258147369',
        ]);
        
        Employee::create([
            'full_name' => 'Laura Garcia',
            'email' => 'laura@example.com',
            'ssn' => '741369852',
        ]);
    }
}
