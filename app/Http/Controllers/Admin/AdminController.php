<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Admin;
use Hash;
use Image;
use File;


class AdminController extends Controller
{
    public function dashboard(){
         Session::put('page','dashboard');
         return view('admin.admin_dashboard');
       
    }

    public function settings(){
          Session::put('page','settings');
         $adminDetails= Admin::where('email', Auth::guard('admin')->user()->email)->first();
         return view ('admin.admin_settings')->with(compact('adminDetails'));
    }

     public function login(Request $request){
          if($request->isMethod('post')){
               $data = $request->all();
               // echo '<pre>'; print_r($data);die;
               // $validatedData = $request->validate([
               //      'title' => 'required|email|max:255',
               //      'password' => 'required',
               //  ]);

               $rules = [
                    'email'=>'required|email|max:255',
                    'password'=>'required'
               ];

               $customMessage = [
                    'email.required'=>'Email Adress is required',
                    'email.email'=>'valid email adress is required',
                    'password.required'=>'Password is required'
               ];

               $this->validate($request,$rules,$customMessage);

              if(Auth::guard('admin')->attempt(['email'=>$data['email'], 'password'=>$data['password']]))
              {
              return redirect('admin/dashboard');
              }else {
                   Session::flash('error_message','Invalid Email or Password');
                   return redirect()->back();           
                  }

     }
        return view('admin.admin_login');
      
   }

   public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/admin');
   }

   public function checkCurrentPassword(Request $request){
        $data = $request->all();
     //    echo "<pre>";print_r($data);die;
        if(Hash::check($data['current_pwd'], Auth::guard('admin')->user()->password)){
             echo "true";
        }
        else{
             echo "false";
        }

   }
   public function updateCurrentPassword(Request $request){
        if($request->isMethod('post')){
             $data = $request->all();
          //    echo "<pre>"; print_r($data);die;
          //check current password is correct or not
             if(Hash::check($data['current_pwd'], Auth::guard('admin')->user()->password)){
                  //check new and confirm password
                  if($data['new_pwd']==$data['confirm_pwd']){
                         Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_pwd'])]);
                         Session::flash('success_message','Your password has been updated');
                  }else{
                    Session::flash('error_message','your new password and confirm password didnot match');
                  }
             }else{
                  Session::flash('error_message','your current password is incorrect');
             }
             return redirect()->back();
        }
     }

     public function updateAdminDetails(Request $request){
          Session::put('page','update-admin-details');
          if($request->isMethod('post')){
               $data = $request->all();
               //echo "<pre>"; print_r($data);die;
               $rules= [
                    'admin_name'=>'required|regex:/^[\pL\s\-]+$/u' ,
                    'admin_mobile'=>'required|numeric'   ,
                    'admin_image'=>'mimes:jpeg,jpg,png'
               ];
               $customMessage = [
                    'admin_name.required'=>'Name is required',
                    'admin_name.alpha'=>'valid name is required',
                    'admin_mobile.required'=>'Mobile number is required',
                    'admin_mobile.numeric'=>'Valid mobile number is required',
                    'admin_image.image'=>'Valid image is required'
               ];
               $this->validate($request,$rules,$customMessage);

               //upload message

               if($request->hasFile('admin_image')){
                    $image_tmp  = $request->file('admin_image');
                    if($image_tmp->isValid()){
                         //get image extension
                        $extension = $image_tmp->getClientOriginalExtension();
                        //Generate new Image name
                         $imageName = rand(111,9999).'.'.$extension;
                         $imagePath = 'images/admin_images/admin_photos/'.$imageName;
                         //upload image
                         Image::make($image_tmp)->save($imagePath);
                    }else if(!empty($data['current_admin_image'])){
                         $imageName = $data['current_admin_image'];
                    }else{
                         $imageName = "";
                    }
               }

               //update admin details
               Admin::where('email', Auth::guard('admin')->user()->email)
               ->update(['name'=>$data['admin_name'],'mobile'=>$data['admin_mobile'], 'image'=>$imageName]);
               Session::flash('success_message','Admin details update sucessfully');
               return redirect()->back();
          }
          return view('admin.update_admin_details');

     }
}
