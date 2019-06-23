<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CompaniesRequest;
use Illuminate\Support\Facades\Auth;




class CompaniesController extends Controller
{


    public function index()
    {
        //CLEANED UP: USED SCOPE for user-id
        $companies = Company::FilterUser()->get();
        return view('companies.index', ['companies'=> $companies]);
    }



    public function create()
    {
        return view('companies.create');
    }



    public function store(CompaniesRequest $request)
    {
        //CLEANED UP: USED OBSERVERS 
        $company = Company::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('companies.show', ['company'=> $company->id])
        ->with('success' , 'Company created successfully');
    }



    public function show(Company $company)
    {
        //CLEANED UP: ROUTE MODEL BINDING -- automatical injection
        $comments = $company->comments;
        return view('companies.show', ['company'=>$company, 'comments'=> $comments ]);
    }



    public function edit(Company $company)
    {
        //CLEANED UP: ROUTE MODEL BINDING -- automatical injection
        return view('companies.edit', ['company'=>$company]);
    }



    public function update(CompaniesRequest $request, Company $company)
    {
    //Save Data
    //CLEANED UP: USED SCOPE for company-id
    //CLEANED UP: USED OBSERVER

        Company::where('id', $company->id)
                    ->update([
                            'name'=> $request->input('name'),
                            'description'=> $request->input('description')
                    ]);
        return redirect()->route('companies.show', ['company'=> $company->id])
        ->with('success' , 'Company updated successfully');
    }



    public function destroy(Company $company)
    {

    //CLEANED UP: ROUTE MODEL BINDING -- automatical injection
    //CLEANED UP: USED OBSERVER
        if($company->delete()){
            return redirect()->route('companies.index')
            ->with('success' , 'Company Deleted Successfully');
        }
    }
}
