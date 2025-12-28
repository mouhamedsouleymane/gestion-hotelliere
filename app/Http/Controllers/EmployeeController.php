<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees',
            'phone' => 'required',
            'department' => 'required|in:reception,housekeeping,maintenance,restaurant,security,management',
            'position' => 'required|in:manager,supervisor,staff',
            'salary' => 'required|numeric',
            'hire_date' => 'required|date'
        ]);

        Employee::create($request->all());
        return redirect()->route('employees.index')->with('success', 'Employé créé avec succès');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'phone' => 'required',
            'department' => 'required|in:reception,housekeeping,maintenance,restaurant,security,management',
            'position' => 'required|in:manager,supervisor,staff',
            'salary' => 'required|numeric',
            'hire_date' => 'required|date',
            'status' => 'required|in:active,inactive,vacation'
        ]);

        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success', 'Employé mis à jour');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employé supprimé');
    }
}