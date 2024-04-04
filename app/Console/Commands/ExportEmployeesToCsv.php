<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;
use League\Csv\Writer;

class ExportEmployeesToCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:export-employees-to-csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $employees = Employee::all();

        $csv = Writer::createFromString('');
        $csv->insertOne(['ID', 'Full Name', 'Email', 'Social Security Number']);

        foreach ($employees as $employee) {
            $csv->insertOne([
                $employee->id,
                $employee->full_name,
                $employee->email,
                $employee->ssn,
            ]);
        }

        $filename = 'employees_' . date('Y-m-d_H-i-s') . '.csv';
        Storage::disk('local')->put($filename, $csv->getContent());

        $this->info('Employees exported successfully to: ' . $filename);
    }
}
