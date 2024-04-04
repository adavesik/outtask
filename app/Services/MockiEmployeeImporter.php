<?php
namespace App\Services;

use App\Contracts\EmployeeImporter;
use Illuminate\Support\Facades\Http;

class MockiEmployeeImporter implements EmployeeImporter
{
    public function importEmployees(): array
    {
        $response = Http::get('https://mocki.io/v1/5792c5e1-2ba6-4dfe-baff-15d7bad8f54d');
        return $response->json();
    }
}