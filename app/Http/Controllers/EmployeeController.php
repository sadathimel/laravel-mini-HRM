<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // //
        // $companies = Company::all();
        // return view('admin.company.index', compact('companies'));

        // $employees = Employee::all();
        $employees = Employee::paginate(15);
        return view('admin.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $companies = Company::all();
        // die($companies);
        return view('admin.employee.create', compact('companies'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'company_id' => ['required', 'string',],
            'email' => ['required', 'email', 'max:255', 'unique:employees'],
            'phone' => ['required', 'string', 'unique:employees'],
        ]);

        $employee = new Employee();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->company_id = $request->company_id;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->save();
        if ($employee->save()) {
            Toastr::success('Employee created successfully', 'Employee', ["progressBar" => "true"]);
            return redirect()->route('employee');
        } else {
            Toastr::error('Something went wrong! Please check and resubmit.', 'Employee', ["progressBar" => "true"]);
            redirect()->back();
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('admin.employee.edit', compact('companies', 'employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'company_id' => ['required', 'string',],
            'email' => ['required', 'email', 'max:255', 'unique:employees,email,' . $employee->id],
            'phone' => ['required', 'string', 'unique:employees,phone,' . $employee->id],
        ]);


        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->company_id = $request->company_id;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->save();
        if ($employee->save()) {
            Toastr::success('Employee Update successfully', 'Employee', ["progressBar" => "true"]);
            return redirect()->route('employee');
        } else {
            Toastr::error('Something went wrong! Please check and resubmit.', 'Employee', ["progressBar" => "true"]);
            redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        if ($employee->delete()) {
            Toastr::success('Employee deleted successfully!', 'Employee', ["progressBar" => "true"]);
            return redirect()->route('employee');
        } else {
            Toastr::error('Something went wrong! Can not delete Employee.', 'Employee', ["progressBar" => "true"]);
            redirect()->back();
        }
    }
}
