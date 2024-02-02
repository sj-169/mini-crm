<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all the sharks
        $employees = Employee::all();

        // load the view and pass the sharks
        return view('employees.index2')
            ->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // load the create form (app/views/sharks/create.blade.php)
        $companies = Company::all();
        if ($companies == null){
            Session::flash('message', 'Add a company first!');
            return redirect('companies');
        }
        return view('employees.create2')->with('companies', $companies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company' => 'required',
            'email' => 'required|email|unique:employees',
        ]);

        // store
        $Employee = new Employee();
        $Employee->first_name       = $request->input('first_name');
        $Employee->last_name       = $request->input('last_name');
        $Employee->email      = $request->input('email');
        $Employee->company_id = $request->input('company');
        $Employee->phone = $request->input('phone')?? '';

        $Employee->save();

        // redirect
        Session::flash('message', 'Successfully created Employee!');
        return redirect('employees');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::find($id);
        $companies = Company::all();
        return view('employees.edit', compact('employee','companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
//        dd($request->all());


        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company' => 'required',
            'email' => 'required|email|unique:employees,email,'.$id,

        ]);

        // store
        $employee = Employee::find($id);
        $employee->first_name       = $request->input('first_name');
        $employee->last_name       = $request->input('last_name');
        $employee->email      = $request->input('email');
        $employee->company_id = $request->input('company');
        $employee->phone = $request->input('phone')?? '';

        $employee->save();

        // redirect
        Session::flash('message', 'Successfully updated Employee!');
        return redirect('employees');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
