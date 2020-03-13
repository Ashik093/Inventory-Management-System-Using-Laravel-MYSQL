<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SalaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function addAdvanceSalary(){

    	$emp=DB::table('employees')->get();
    	return view('addAdvanceSalary',compact('emp'));
    }

    public function storeAdvanceSalary(Request $request){
    	$validateData=$request->validate([
    		'emp_id'=>'required',
    		'month'=>'required',
    		'year'=>'required|min:4|max:4',
    		'advanced_salary'=>'required'
    	]);

    	$data=array();
    	$data['emp_id']=$request->emp_id;
    	$data['month']=$request->month;
    	$data['year']=$request->year;
    	$data['advanced_salary']=$request->advanced_salary;

        $check=DB::table('advance_salary')->where('emp_id',$data['emp_id'])->where('month',$data['month'])->first();
        if($check===NULL){
            $insert=DB::table('advance_salary')->insert($data);
            if($insert){
                $notification=array(
                    'messege'=>'Advance Salary Paid',
                    'type'=>'success'
                );
                return Redirect()->back()->with($notification);
            }else{
                $notification=array(
                    'messege'=>'Advance Salary Paid Failed',
                    'type'=>'error'
                );
                return Redirect()->back()->with($notification);
            }
        }else{
            $notification=array(
                    'messege'=>'Advance Salary Already Paid In This Month',
                    'type'=>'warning'
                );
                return Redirect()->back()->with($notification);
        }

    	
    }

    public function allAdvanceSalary(){
        $advanced_salary=DB::table('advance_salary')->join('employees','employees.id','advance_salary.emp_id')->select('advance_salary.*','employees.name','employees.salary','employees.photo')->get();
        return view('allAdvanceSalary',compact('advanced_salary'));
    }

    public function PaySalary(){
        $emp=DB::table('employees')->get();
        return view('paySalary',compact('emp'));
    }
}
