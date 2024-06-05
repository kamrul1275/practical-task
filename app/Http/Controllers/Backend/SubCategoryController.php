<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    function allSubCategory(){

        $subcategories= SubCategory::all();

        return view('backend.subcategory.all_subcategory',compact('subcategories'));
    }


    function addSubCategory(){
     $categories = Category::get();

 // dd($categories);
        return view('backend.subcategory.add_subcategory',compact('categories'));
    }


    public function storeSubCategory(Request $request)
    {
        // Validate the request data
        $request->validate([
            'subcategory_name' => 'required|string|max:255|unique:subcategories,subcategory_name',
            'category_id' => 'required|exists:categories,id',
            'subcategory_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // max size of 2MB
        ]);


        $subcategory = new SubCategory();

    // Handle the image file upload
    if($request->hasFile('subcategory_image'))
    {
        $file = $request->file('subcategory_image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('uploads/subcategory/', $filename);
        $subcategory->subcategory_image = 'uploads/subcategory/' . $filename;
    }

 
     $subcategory->subcategory_name = $request->subcategory_name;
     //dd($request->category_name);
     $subcategory->subcategory_slug = strtolower(str_replace(' ', '-', $request->subcategory_name));
 
     // Save the brand to the database
     $subcategory->save();



        dd($request->subcategory_name);
        // Prepare the notification
        $notification = array(
            'message' => 'Subcategory Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.subcategory')->with($notification);
    }

}
