<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class UserController extends Controller
{
  

    function Index(){
        return view('frontend.home');
    }//end method




    public function SearchResult(Request $request)
    {
        $query = $request->input('query');
        $companies = Company::where('company_name', 'LIKE', "%{$query}%")->paginate(5);

        return view('frontend.search', compact('companies'));
    }

    

}
