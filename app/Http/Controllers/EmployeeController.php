<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use function Ramsey\Uuid\v1;

class EmployeeController extends Controller
{

    public function index()
    {

        $employees = Employee::orderBy('created_at', 'desc')->get();

        return view('employees.index', [
            'employees' => $employees,
        ]);
    }


    public function create()
    {
        $suffix = Employee::SUFFIX;

        return view('employees.create', [
            'suffix' => $suffix,
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        try {
            $suffix = Employee::SUFFIX;

            $validated = $request->validate([
                // 'employee_id' => ['required', 'unique:employees,employee_id', 'max:6'],
                'firstname' => ['required', 'max:50'],
                'middlename' => ['nullable', 'min:2', 'max:50'],
                'lastname' => ['required', 'max:50'],
                'suffix' => ['nullable', 'in:' . implode(',', $suffix)],
            ]);

            $employee = Employee::create($validated);
            $employee->save();

            return redirect()->route('employee.index')->with('success', 'Employee created successfully.');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return back()->withInput()->withErrors(['error' => 'An error occurred while creating the employee.']);
        }
    }



    public function show($employeeID)
    {
        // dd('You are in show method');


        $employee = Employee::findOrFail($employeeID);
        return view('employees.show', [
            'employee' => $employee,

        ]);
    }


    public function edit($employeeID)
    {
        $suffix = Employee::SUFFIX;

        $employee = Employee::find($employeeID);

        return view('employees.edit', [
            'employee' => $employee,
            'suffix' => $suffix,
        ]);
    }


    public function update(Request $request, $employeeID)
    {
        try {
            $suffix = Employee::SUFFIX;

            $validated = $request->validate([
                'firstname' => ['required', 'max:50'],
                'middlename' => ['nullable', 'min:2', 'max:50'],
                'lastname' => ['required', 'max:50'],
                'suffix' => ['nullable', 'in:' . implode(',', $suffix)],
            ]);

            Employee::find($employeeID)->update($validated);;

            return redirect()->route('employee.index')->with('success', 'Employee updated successfully.');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return back()->withInput()->withErrors(['error' => 'An error occurred while updating the employee.']);
        }
    }

    public function destroy($employeeID)
    {
        try {
            Employee::find($employeeID)->delete();

            return back()->with('success', 'Employee deleted successfully.');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return back()->withInput()->withErrors(['error' => 'An error occurred while deleting the employee.']);
        }
    }
}