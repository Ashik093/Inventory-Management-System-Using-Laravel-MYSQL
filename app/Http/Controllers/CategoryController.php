<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function addCategory(){
    	return view('addCategory');
    }
    public function store(Request $request){
    	$validateData=$request->validate([
    		'name'=>'required'
    	]);
    	$data=array();
    	$data['name']=$request->name;
    	$insert=DB::table('categories')->insert($data);
    	if($insert){
    		$notification = array(
                'messege'=>'Category Added Successfully',
                'type'=>'success'
            );

            return Redirect()->back()->with($notification);
    	}else{
    		$notification = array(
                'messege'=>'Category Added Fail',
                'type'=>'error'
            );
    	}

    }
    public function allCategory(){
    	$categories=DB::table('categories')->get();
    	return view('allCategory',compact('categories'));
    }
    public function edit($id){
    	$single=DB::table('categories')->where('id',$id)->first();
    	return view('editCategory',compact('single'));
    }
    public function update(Request $request,$id){
    	$validateData=$request->validate([
    		'name'=>'required'
    	]);
    	$data=array();
    	$data['name']=$request->name;
    	$update=DB::table('categories')->where('id',$id)->update($data);
    	if($update){
    		$notification = array(
                'messege'=>'Category Updated Successfully',
                'type'=>'success'
            );

            return Redirect()->back()->with($notification);
    	}else{
    		$notification = array(
                'messege'=>'Category Updated Fail',
                'type'=>'error'
            );
    	}
    }
    public function delete($id){
    	$delete=DB::table('categories')->where('id',$id)->delete();
    	if($delete){
    		$notification = array(
                'messege'=>'Category Delete Successfully',
                'type'=>'success'
            );

            return Redirect()->back()->with($notification);
    	}else{
    		$notification = array(
                'messege'=>'Category Delete Fail',
                'type'=>'error'
            );
    	}
    }
}
