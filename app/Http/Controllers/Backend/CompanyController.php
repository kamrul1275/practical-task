<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    function allCompany(){

        $companies = Company::get();
        return view('backend.company.all_company',compact('companies'));
    }//end method

    function addCompany(){
        return view('backend.company.add_company');
    }//end method

    function storeCompany(Request $request){
        
 
        $request->validate([
            'company_name' => 'required',
            'company_mail' => 'required|string|max:255|unique:companies',
            'company_website' => 'required|string|max:255',
            'company_phone' => 'required', 
            
        ], [
            // Custom error messages
            'company_name.required' => 'name is required.',
            'company_mail.required' => 'email is required.',
            'company_mail.unique' => 'Comapny name must be unique.',
            'company_website.required' => ' Comapny name is required.',
            'company_phone.required' => 'Comapny name is required.',

        ]);
        // Create a new Brand instance
        $company = new Company();
    
    
        // Set other brand properties
        $company->company_name = $request->company_name; 
        $company->company_website = $request->company_website;
        $company->company_mail = $request->company_mail; 
        $company->company_phone = $request->company_phone;

        //dd($company);
       
        // Save the brand to the database
        $company->save();
    
        toastr()->success('Company Inserted Successfully');
        return redirect()->route('all.company');
        }//end method 


        function editCompany($id){
            $companies =Company::find($id);
           // return  $companies;

            return view('backend.company.edit_company');

        }

function deleteCompany($id){
    $BrandDelete = Company::findOrfail($id);
    $BrandDelete->delete();

    return redirect()->back();

}


   
}
