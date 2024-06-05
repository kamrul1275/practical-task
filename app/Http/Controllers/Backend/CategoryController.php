<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function allCategory(){
        $categories = Category::all();
        return view('backend.category.all_category',compact('categories'));
    }//end method


    function addCategory(){
        return view('backend.category.add_category');
    }//end method

    function storeCategory(Request $request){
        $request->validate([
            'category_name' => 'required|string|max:255|unique:categories,category_name',
            'category_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // max size of 2MB
        ], [
            // Custom error messages
            'category_name.required' => 'The category name is required.',
            'category_name.unique' => 'The category name must be unique.',
            'brancategory_imaged_image.required' => 'The category image is required.',
            'category_image.image' => 'The file must be an image.',
            'category_image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'category_image.max' => 'The image may not be greater than 2MB.',
        ]);
        // Create a new Brand instance
        $category = new Category();
    
        // Handle the image file upload
        if($request->hasFile('category_image'))
        {
            $file = $request->file('category_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/category/', $filename);
            $category->category_image = 'uploads/category/' . $filename;
        }
    
        // Set other brand properties
        $category->category_name = $request->category_name;
        //dd($request->category_name);
        $category->category_slug = strtolower(str_replace(' ', '-', $request->category_name));
    
        // Save the brand to the database
        $category->save();
    
        // Prepare the notification
        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );
    
        // Redirect with the notification
        return redirect()->route('category.all')->with($notification);
    } // End Method
    


}
