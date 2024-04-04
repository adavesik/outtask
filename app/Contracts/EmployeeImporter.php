<?php

namespace App\Contracts;

interface EmployeeImporter
{
    public function importEmployees(): array;
}