<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['ssn', 'email', 'full_name'];

    public function employers()
    {
        return $this->belongsToMany(Employer::class, 'contracts');
    }
}
