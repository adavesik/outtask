<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email_address', 'social_security_number', 'role'];

    public function members()
    {
        return $this->hasMany(Employee::class, 'team_id');
    }
}
