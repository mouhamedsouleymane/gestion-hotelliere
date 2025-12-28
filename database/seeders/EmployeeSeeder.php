<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $employees = [
            ['name' => 'Marie Dubois', 'email' => 'marie.dubois@hotel.com', 'phone' => '0123456789', 'department' => 'reception', 'position' => 'manager', 'salary' => 3500, 'hire_date' => '2020-01-15'],
            ['name' => 'Pierre Martin', 'email' => 'pierre.martin@hotel.com', 'phone' => '0123456790', 'department' => 'reception', 'position' => 'staff', 'salary' => 2200, 'hire_date' => '2021-03-10'],
            ['name' => 'Sophie Bernard', 'email' => 'sophie.bernard@hotel.com', 'phone' => '0123456791', 'department' => 'housekeeping', 'position' => 'supervisor', 'salary' => 2800, 'hire_date' => '2019-06-20'],
            ['name' => 'Jean Moreau', 'email' => 'jean.moreau@hotel.com', 'phone' => '0123456792', 'department' => 'housekeeping', 'position' => 'staff', 'salary' => 2000, 'hire_date' => '2022-02-14'],
            ['name' => 'Claire Petit', 'email' => 'claire.petit@hotel.com', 'phone' => '0123456793', 'department' => 'housekeeping', 'position' => 'staff', 'salary' => 2000, 'hire_date' => '2022-08-05'],
            ['name' => 'Michel Durand', 'email' => 'michel.durand@hotel.com', 'phone' => '0123456794', 'department' => 'maintenance', 'position' => 'manager', 'salary' => 3200, 'hire_date' => '2018-11-12'],
            ['name' => 'Lucie Roux', 'email' => 'lucie.roux@hotel.com', 'phone' => '0123456795', 'department' => 'restaurant', 'position' => 'supervisor', 'salary' => 2600, 'hire_date' => '2020-09-30'],
            ['name' => 'Thomas Blanc', 'email' => 'thomas.blanc@hotel.com', 'phone' => '0123456796', 'department' => 'restaurant', 'position' => 'staff', 'salary' => 2100, 'hire_date' => '2023-01-20'],
            ['name' => 'Nathalie Garnier', 'email' => 'nathalie.garnier@hotel.com', 'phone' => '0123456797', 'department' => 'security', 'position' => 'staff', 'salary' => 2300, 'hire_date' => '2021-07-18'],
            ['name' => 'François Leroy', 'email' => 'francois.leroy@hotel.com', 'phone' => '0123456798', 'department' => 'management', 'position' => 'manager', 'salary' => 4500, 'hire_date' => '2017-04-03']
        ];

        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}