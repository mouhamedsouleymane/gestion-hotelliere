<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'department', 'position', 
        'salary', 'status', 'hire_date', 'address'
    ];

    protected $casts = [
        'hire_date' => 'date',
        'salary' => 'decimal:2'
    ];

    public function getDepartmentLabelAttribute()
    {
        return match($this->department) {
            'reception' => 'Réception',
            'housekeeping' => 'Ménage',
            'maintenance' => 'Maintenance',
            'restaurant' => 'Restaurant',
            'security' => 'Sécurité',
            'management' => 'Direction',
            default => $this->department
        };
    }
}