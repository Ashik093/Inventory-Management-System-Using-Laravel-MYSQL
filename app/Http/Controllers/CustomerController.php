<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('addCustomer');
    }
    public function store(Request $request){
    	$validatedData = $request->validate([
        'name' => 'required|min:3|max:255',
        'email' => 'required|email|unique:employees',
        'phone' => 'required|max:13',
        'address' => 'required',
        'shopName' => 'required',
        'photo' => 'required',
        'account_holder' => 'required',
        'account_number' => 'required',
        'bank_name' => 'required',
        'bank_branch' => 'required',
        'city' => 'required',
        ]);

        $data = array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['shopName']=$request->shopName;
        $data['account_holder']=$request->account_holder;
        $data['account_number']=$request->account_number;
        $data['bank_name']=$request->bank_name;
        $data['bank_branch']=$request->bank_branch;
        $data['city']=$request->city;
        $image = $request->photo;

        if($image){
            $image_name = str_random(10);
            $image_ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$image_ext;
            $upload_path = 'customers/';
            $image_url= $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            if($success){
                $data['photo']=$image_url;
                $insert = DB::table('customers')->insert($data);
                if ($insert) {
                    $notification = array(
                        'messege'=>'Customer Added Successfully',
                        'type'=>'success'
                    );

                    return Redirect()->back()->with($notification);

                }else{
                    $notification = array(
                        'messege'=>'Customer Added Fail',
                        'type'=>'error'
                    );

                    return Redirect()->back()->with($notification);
                }
            }else{
                $notification = array(
                    'messege'=>'Customer Added Fail',
                    'type'=>'error'
                );

                return Redirect()->back()->with($notification);
            }
        }
    }
    public function allCustomer(){
    	$customers=DB::table('customers')->get();
    	return view('allCustomer',compact('customers'));
    }

    public function viewCustomer($id){
        $single = DB::table('customers')->where('id',$id)->first();
        return view('viewCustomer',compact('single'));
    }

    public function delete($id){
        $data=DB::table('customers')->where('id',$id)->first();
        $photo=$data->photo;
        $delete=DB::table('customers')->where('id',$id)->delete();
        if ($delete) {
            $notification = array(
                'messege'=>'Customer Deleted Successfully',
                'type'=>'error'
            );
            unlink($photo);
            return Redirect()->back()->with($notification);

        }else{
            $notification = array(
                'messege'=>'Customer Deleted Fail',
                'type'=>'error'
            );

            return Redirect()->back()->with($notification);
        }
    }

    public function edit($id){
        $data=DB::table('customers')->where('id',$id)->first();
        return view('editCustomer',compact('data'));
    }

    public function update(Request $request,$id){
        $validatedData = $request->validate([
        'name' => 'required|min:3|max:255',
        'email' => 'required|email|unique:employees',
        'phone' => 'required|max:13',
        'address' => 'required',
        'shopName' => 'required',
        'account_holder' => 'required',
        'account_number' => 'required',
        'bank_name' => 'required',
        'bank_branch' => 'required',
        'city' => 'required',
        ]);

        $data = array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['shopName']=$request->shopName;
        $data['account_holder']=$request->account_holder;
        $data['account_number']=$request->account_number;
        $data['bank_name']=$request->bank_name;
        $data['bank_branch']=$request->bank_branch;
        $data['city']=$request->city;
        $image = $request->photo;

        if($image){
            $image_name = str_random(10);
            $image_ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$image_ext;
            $upload_path = 'customers/';
            $image_url= $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            if($success){
                $data['photo']=$image_url;
                $img=DB::table('customers')->where('id',$id)->first();
                $img_path=$img->photo;
                unlink($img_path);
            }
        }

        $update = DB::table('customers')->where('id',$id)->update($data);
        if ($update) {
            $notification = array(
                'messege'=>'Customer Updated Successfully',
                'type'=>'warning'
            );

            return Redirect()->back()->with($notification);

        }else{
            $notification = array(
                'messege'=>'Customer Updated Fail',
                'type'=>'error'
            );

            return Redirect()->back()->with($notification);
        }
    }
}
