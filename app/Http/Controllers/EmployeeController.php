<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Company;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('created_at', 'desc')->paginate(10);
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('employee.create', compact('companies'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'company_id' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);

            $input_data=[
                'firstname'=>$request->input('firstname'),
                'lastname'=>$request->input('lastname'),
                'company_id'=>$request->input('company_id'),
                'email'=>$request->input('email'),
                'phone'=>$request->input('phone'),
            ];
                
        Employee::create($input_data);
        return redirect()->route('employee.index')->with('success', 'Employee created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $companies = Company::all();
        return view('employee.edit', compact('employee','companies'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'company_id' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);

            $input_data=[
                'firstname'=>$request->input('firstname'),
                'lastname'=>$request->input('lastname'),
                'company_id'=>$request->input('company_id'),
                'email'=>$request->input('email'),
                'phone'=>$request->input('phone'),
            ];
                
        $employee->update($input_data);
        return redirect()->route('employee.index')->with('success', 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employee.index')->with('error', 'Employee deleted successfully');
    }
}
