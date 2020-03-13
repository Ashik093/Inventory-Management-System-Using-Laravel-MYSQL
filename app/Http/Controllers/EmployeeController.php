<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	return view('addEmployee');
    }
    public function store(Request $request){
    	$validatedData = $request->validate([
        'name' => 'required|min:3|max:255',
        'email' => 'required|email|unique:employees',
        'phone' => 'required|max:13',
        'address' => 'required',
        'experience' => 'required',
        'salary' => 'required',
        'photo' => 'required',
        'vacation' => 'required',
        'city' => 'required',
        ]);

        $data = array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['experience']=$request->experience;
        $data['salary']=$request->salary;
        $data['vacation']=$request->vacation;
        $data['city']=$request->city;
        $image = $request->photo;

        if($image){
            $image_name = str_random(10);
            $image_ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$image_ext;
            $upload_path = 'employees/';
            $image_url= $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            if($success){
                $data['photo']=$image_url;
                $insert = DB::table('employees')->insert($data);
                if ($insert) {
                    $notification = array(
                        'messege'=>'Employee Added Successfully',
                        'type'=>'success'
                    );

                    return Redirect()->back()->with($notification);

                }else{
                    $notification = array(
                        'messege'=>'Employee Added Fail',
                        'type'=>'error'
                    );

                    return Redirect()->back()->with($notification);
                }
            }else{
                $notification = array(
                    'messege'=>'Employee Added Fail',
                    'type'=>'error'
                );

                return Redirect()->back()->with($notification);
            }
        }
    }

    public function allEmployee(){
    	$employees=DB::table('employees')->get();
    	return view('allEmployee',compact('employees'));
    }

    public function singleEmployee($id){

        $single=DB::table('employees')->where('id',$id)->first();
        return view('viewEmployee',compact('single'));
    }

    public function deleteEmployee($id){
        $data=DB::table('employees')->where('id',$id)->first();
        $photo=$data->photo;
        $delete=DB::table('employees')->where('id',$id)->delete();
        if ($delete) {
            $notification = array(
                'messege'=>'Employee Deleted Successfully',
                'type'=>'error'
            );
            unlink($photo);
            return Redirect()->back()->with($notification);

        }else{
            $notification = array(
                'messege'=>'Employee Deleted Fail',
                'type'=>'error'
            );

            return Redirect()->back()->with($notification);
        }

    }

    public function editEmployee($id){
        $edit= DB::table('employees')->where('id',$id)->first();
        return view('editEmployee',compact('edit'));
    }

    public function update(Request $request,$id){
        $validatedData = $request->validate([
        'name' => 'required|min:3|max:255',
        'email' => 'required|email',
        'phone' => 'required|max:13',
        'address' => 'required',
        'experience' => 'required',
        'salary' => 'required',
        'vacation' => 'required',
        'city' => 'required',
        ]);

        $data = array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['experience']=$request->experience;
        $data['salary']=$request->salary;
        $data['vacation']=$request->vacation;
        $data['city']=$request->city;
        $image = $request->photo;

        if($image){
            $image_name = str_random(10);
            $image_ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$image_ext;
            $upload_path = 'employees/';
            $image_url= $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            if($success){
                $data['photo']=$image_url;
                $img=DB::table('employees')->where('id',$id)->first();
                $img_path=$img->photo;
                unlink($img_path);
            }
        }

        $update = DB::table('employees')->where('id',$id)->update($data);
        if ($update) {
            $notification = array(
                'messege'=>'Employee Updated Successfully',
                'type'=>'warning'
            );

            return Redirect()->back()->with($notification);

        }else{
            $notification = array(
                'messege'=>'Employee Updated Fail',
                'type'=>'error'
            );

            return Redirect()->back()->with($notification);
        }
    }
}
