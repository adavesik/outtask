<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $table = 'employers';

    protected $fillable = ['empl_name', 'empl_email', 'wage_number'];

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'contracts');
    }
}
