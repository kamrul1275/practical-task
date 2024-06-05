<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;


class BrandController extends Controller
{
    
    
    
    function allBrand(){

        $brands = Brand::all();
        return view('backend.brand.all_brand',compact('brands'));
    }//end method
    
    
    function addBrand(){
        return view('backend.brand.add_brand');
    }//end method



    public function StoreBrand(Request $request)
    {


        $request->validate([
            'brand_name' => 'required|string|max:255|unique:brands,brand_name',
            'brand_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // max size of 2MB
        ], [
            // Custom error messages
            'brand_name.required' => 'The brand name is required.',
            'brand_name.unique' => 'The brand name must be unique.',
            'brand_image.required' => 'The brand image is required.',
            'brand_image.image' => 'The file must be an image.',
            'brand_image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'brand_image.max' => 'The image may not be greater than 2MB.',
        ]);
        // Create a new Brand instance
        $brand = new Brand();
    
        // Handle the image file upload
        if($request->hasFile('brand_image'))
        {
            $file = $request->file('brand_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/brand/', $filename);
            $brand->brand_image = 'uploads/brand/' . $filename;
        }
    
        // Set other brand properties
        $brand->brand_name = $request->brand_name;
        $brand->brand_slug = strtolower(str_replace(' ', '-', $request->brand_name));
    
        // Save the brand to the database
        $brand->save();
    
        // Prepare the notification
        $notification = array(
            'message' => 'Brand Inserted Successfully',
            'alert-type' => 'success'
        );
    
        // Redirect with the notification
        return redirect()->route('all.brand')->with($notification);
    } // End Method
    


}
