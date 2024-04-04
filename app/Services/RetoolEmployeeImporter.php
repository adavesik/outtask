<?php
namespace App\Services;

use App\Contracts\EmployeeImporter;
use Illuminate\Support\Facades\Http;

class RetoolEmployeeImporter implements EmployeeImporter
{
    public function importEmployees(): array
    {
        $response = Http::get('https://retoolapi.dev/F2UgmN/employees');
        return $response->json();
    }
}