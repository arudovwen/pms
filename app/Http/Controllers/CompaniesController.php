<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{


    public function index()
    {
      
      if(auth()->check()){
        $companies= auth()->user()->companies;
        return view('companies.index', compact('companies'));
      }
      return view('auth.login');
    }

   
    public function create()
    {
        return view('companies.create');
    }
    public function store(Request $request)
     {    
      request()->validate([
        'name'=> ['required','min:3'],
        'description' => 'required'

    ]);  

        $attributes = request(['name','description' ]);
        $attributes['user_id'] = auth()->id();
        if(auth()->check()){
        $company = Company::create($attributes);
        
        if ($company){
          return redirect('companies')->with('success', 'Company created successful');
        }
        }else{
          return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\    Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)

    {
        // return $company;
        // $company = Company::findorFail($company);
        return  view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\    Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return  view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\    Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Company $company)
    {
      request()->validate([
        'name'=> ['required','min:3'],
        'description' => 'required'

    ]);  

        $company->update(request(['name','description']));
       if ($company){
         return redirect()->route('companies.show',  compact('company'))->with('success', 'Company Update successful');
       }else{
         return redirect()->back()->withInput();
       }
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\    Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        if ($company){
        return redirect('/companies')->with('success', 'Company deleted successful');
    }else{
        return redirect()->back()->withInput();
      }
        
    }


  
  
}
