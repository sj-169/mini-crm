<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function getCompanyById($id)
    {
        $company = Company::find($id);
        return ['status'=>true, 'data'=> $company, 'message'=>'comapny details fethed successfull'];
    }

    public function addCompany(Request $request)
    {
//        dd($request->all());
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'website' => 'required',
        ]);

        if ($validator->fails())
        {
            return ['status'=>false, 'message'=>$validator->messages()];
        }

        // store
        $company = new Company();
        $company->name       = $request->input('name');
        $company->email      = $request->input('email');
        $company->website = $request->input('website');

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $name = time() . $file->getClientOriginalName();
            $s3file = Storage::disk('public')->put($name, file_get_contents($file));
            $company->logo = $name;
        }
        $company->save();
        return ['status'=>true, 'message'=>'Successfully created Company!'];
    }
}
