<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all the sharks
        $companies = Company::all();

        // load the view and pass the sharks
        return view('companies.index2')
            ->with('companies', $companies);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // load the create form (app/views/sharks/create.blade.php)
        return view('companies.create2');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'website' => 'required',
        ]);

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

        // redirect
        Session::flash('message', 'Successfully created Company!');
        return redirect('companies');
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
        $company = Company::find($id);
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
//        dd($request->all());


        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'website' => 'required',
        ]);

        // store
        $company = Company::find($id);
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

        // redirect
        Session::flash('message', 'Successfully updated Company!');
        return redirect('companies');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd($id);
        $company = Company::find($id);
        $company->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the Company!');
        return redirect('companies');
    }
}
