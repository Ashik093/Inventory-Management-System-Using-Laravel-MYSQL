<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('addSupplier');
    }

    public function store(Request $request){
    	$validatedData = $request->validate([
        'name' => 'required|min:3|max:255',
        'email' => 'required|email|unique:suppliers',
        'phone' => 'required|max:13',
        'address' => 'required',
        'type' => 'required',
        'shop' => 'required',
        'photo' => 'required',
        'accountholder' => 'required',
        'accountnumber' => 'required',
        'bankname' => 'required',
        'bankbranch' => 'required',
        'city' => 'required',
        ]);

        $data = array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['type']=$request->type;
        $data['shop']=$request->shop;
        $data['accountholder']=$request->accountholder;
        $data['accountnumber']=$request->accountnumber;
        $data['bankname']=$request->bankname;
        $data['bankbranch']=$request->bankbranch;
        $data['city']=$request->city;
        $image = $request->photo;

        //dd($image);
        if($image){
            $image_name = str_random(10);
            $image_ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$image_ext;
            $upload_path = 'suppliers/';
            $image_url= $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            if($success){
                $data['photo']=$image_url;
                $insert = DB::table('suppliers')->insert($data);
                if ($insert) {
                    $notification = array(
                        'messege'=>'Supplier Added Successfully',
                        'type'=>'success'
                    );

                    return Redirect()->back()->with($notification);

                }else{
                    $notification = array(
                        'messege'=>'Supplier Added Fail',
                        'type'=>'error'
                    );

                    return Redirect()->back()->with($notification);
                }
            }else{
                $notification = array(
                    'messege'=>'Supplier Added Fail',
                    'type'=>'error'
                );

                return Redirect()->back()->with($notification);
            }
        }
    }

    public function allSupplier(){
    	$suppliers = DB::table('suppliers')->get();
    	return view('allSupplier',compact('suppliers'));
    }

    public function viewSupplier($id){
    	$single=DB::table('suppliers')->where('id',$id)->first();
    	return view('viewSupplier',compact('single'));
    }

    public function delete($id){
    	$data=DB::table('suppliers')->where('id',$id)->first();
        $photo=$data->photo;
        $delete=DB::table('suppliers')->where('id',$id)->delete();
        if ($delete) {
            $notification = array(
                'messege'=>'Supplier Deleted Successfully',
                'type'=>'error'
            );
            unlink($photo);
            return Redirect()->back()->with($notification);

        }else{
            $notification = array(
                'messege'=>'Supplier Deleted Fail',
                'type'=>'error'
            );

            return Redirect()->back()->with($notification);
        }
    }

    public function edit($id){
    	$edit= DB::table('suppliers')->where('id',$id)->first();
    	return view('editSupplier',compact('edit'));
    }
    public function update(Request $request,$id){
    	$validatedData = $request->validate([
        'name' => 'required|min:3|max:255',
        'email' => 'required|email',
        'phone' => 'required|max:13',
        'address' => 'required',
        'type' => 'required',
        'shop' => 'required',
        'accountholder' => 'required',
        'accountnumber' => 'required',
        'bankname' => 'required',
        'bankbranch' => 'required',
        'city' => 'required',
        ]);

        $data = array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['type']=$request->type;
        $data['shop']=$request->shop;
        $data['accountholder']=$request->accountholder;
        $data['accountnumber']=$request->accountnumber;
        $data['bankname']=$request->bankname;
        $data['bankbranch']=$request->bankbranch;
        $data['city']=$request->city;
        $image = $request->photo;

        if($image){
            $image_name = str_random(10);
            $image_ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$image_ext;
            $upload_path = 'suppliers/';
            $image_url= $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            if($success){
                $data['photo']=$image_url;
                $img=DB::table('suppliers')->where('id',$id)->first();
                $img_path=$img->photo;
                unlink($img_path);
            }
        }

        $update = DB::table('suppliers')->where('id',$id)->update($data);
        if ($update) {
            $notification = array(
                'messege'=>'Supplier Updated Successfully',
                'type'=>'warning'
            );

            return Redirect()->back()->with($notification);

        }else{
            $notification = array(
                'messege'=>'Supplier Updated Fail',
                'type'=>'error'
            );

            return Redirect()->back()->with($notification);
        }
    }
}
