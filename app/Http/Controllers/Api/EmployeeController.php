<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function getEmployeesByCompany($id)
    {
        $employees = Employee::where('company_id','=',$id)->get();
        return ['status'=>true, 'data'=> $employees, 'message'=>'Employees fethed !'];
    }

    public function addEmployee(Request $request)
    {
//        dd($request->all());
        $validator = Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'company_id' => 'required',
            'email' => 'required|email|unique:employees',
        ]);

        if ($validator->fails())
        {
            return ['status'=>false, 'message'=>$validator->messages()];
        }

        // store
        $Employee = new Employee();
        $Employee->first_name       = $request->input('first_name');
        $Employee->last_name       = $request->input('last_name');
        $Employee->email      = $request->input('email');
        $Employee->company_id = $request->input('company_id');
        $Employee->phone = $request->input('phone')?? '';

        $Employee->save();

        return ['status'=>true, 'message'=>'Successfully Saved Employee!'];
    }
}
