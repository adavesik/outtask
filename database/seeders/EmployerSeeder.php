<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employer;

class EmployerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employer::create([
            'empl_name' => 'Example Employer',
            'empl_email' => 'employer@example.com',
            'wage_number' => '123456789L01',
        ]);

        Employer::create([
            'empl_name' => 'Second Employer',
            'empl_email' => 'second@example.com',
            'wage_number' => '234567890L02',
        ]);
        
        Employer::create([
            'empl_name' => 'Third Employer',
            'empl_email' => 'third@example.com',
            'wage_number' => '345678901L03',
        ]);
        
        Employer::create([
            'empl_name' => 'Fourth Employer',
            'empl_email' => 'fourth@example.com',
            'wage_number' => '456789012L04',
        ]);
        
        Employer::create([
            'empl_name' => 'Fifth Employer',
            'empl_email' => 'fifth@example.com',
            'wage_number' => '567890123L05',
        ]);
        
        Employer::create([
            'empl_name' => 'Sixth Employer',
            'empl_email' => 'sixth@example.com',
            'wage_number' => '678901234L06',
        ]);
    }
}
