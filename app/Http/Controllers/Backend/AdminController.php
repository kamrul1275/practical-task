<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use app\Models\User;
use Intervention\Image\ImageManager;
//use Intervention\Image\Facades\Image;
//use Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AdminController extends Controller
{




  function AdminLoginForm(){
    return view('backend.auth.login');
  }
// end method




    function AdminDashboard(){

        return view('backend.layout.dashboard');
    }




  public function AdminLogout(Request $request)
  {
      Auth::guard('web')->logout();

      $request->session()->invalidate();

      $request->session()->regenerateToken();

      return redirect('/');
  }
  //end method


  function AdminProfile(){


    $id = Auth::user()->id;

    //dd($users);

    $userProfile = User::findOrFail($id);

    return view('backend.profile.admin_profile',compact('userProfile'));
  }//end method



  // function AdminProfileStore(Request $request){
  //   $id = Auth::user()->id;
  //   $userProfile = User::findOrFail($id);
  //   $userProfile->name = $request->name;
  //   // $userProfile->user_name = $request->user_name;
  //   $userProfile->email = $request->email;
  //   $userProfile->phone = $request->phone;
  //   $userProfile->address = $request->address;






  //     // Handle the image upload
  //     if ($request->hasFile('image')) {
  //       $image = $request->file('image');
  //       $filename = time() . '.' . $image->getClientOriginalExtension();

  //       // Resize the image
  //       $resizedImage = Image::make($image)->resize(300, 300, function ($constraint) {
  //           $constraint->aspectRatio();
  //       });

  //       // Save the image
  //       $path = public_path('images/' . $filename);
  //       $resizedImage->save($path);

  //       // Optionally, save the image information in the database

  //       return back()->with('success', 'Image uploaded and resized successfully.');
  //   }


  //   $userProfile->save();
  //   return back()->with('error', 'Image upload failed.');



   

  //  // return redirect()->back();
  //   //dd($userProfile);
  // }
  function AdminProfileStore(Request $request)
{
    $id = Auth::user()->id;
    $userProfile = User::findOrFail($id);
    $userProfile->name = $request->name;
    $userProfile->email = $request->email;
    $userProfile->phone = $request->phone;
    $userProfile->address = $request->address;

// Handle the image upload
if ($request->hasFile('image')) {
    $image = $request->file('image');
    $filename = time() . '.' . $image->getClientOriginalExtension();
    $imageSize = ImageManager::imagick()->read($image);

    $resizedImage = $imageSize->resize(300,300);
    // Save the image
    $path = public_path('images/' . $filename);
    $resizedImage->save($path);

    return back()->with('success', 'Image uploaded and resized successfully.');
}
return back()->with('error', 'Image upload failed.');
}
}

