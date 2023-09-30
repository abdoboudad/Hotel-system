<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the employees.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('admin.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new employee.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employees.create');
    }

    /**
     * Store a newly created employee in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'card_type'=>'required',
            'card_number'=>'required',
            'phone'=>'required',
            'name'=>'required',
            'job'=>'required',
            'work_time'=>'required',
            'join_date'=>'required',
            'salary'=>'required'
        ]);
        $employee = Employee::create($request->all());
        return redirect()->back()->with('success', 'Employee created successfully.');
    }

    /**
     * Show the form for editing an existing employee.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('admin.employees.edit', compact('employee'));
    }

    /**
     * Update the specified employee in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'card_type'=>'required',
            'card_number'=>'required',
            'phone'=>'required',
            'name'=>'required',
            'job'=>'required',
            'work_time'=>'required',
            'join_date'=>'required',
            'salary'=>'required'
        ]);
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());
        return redirect()->back()->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified employee from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->back()->with('success', 'Employee deleted successfully.');
    }
}
