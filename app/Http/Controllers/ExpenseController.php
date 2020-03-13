<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	return view('addExpense');
    }
    public function store(Request $request){
    	$validatedData = $request->validate([
        'details' => 'required|min:5|',
        'amount' => 'required|numeric',
        ]);

        $data = array();
        $data['details']=$request->details;
        $data['amount']=$request->amount;
        $data['year']=$request->year;
        $data['month']=$request->month;
        $data['date']=$request->date;

        $insert = DB::table('expenses')->insert($data);
        if ($insert) {
            $notification = array(
           		'messege'=>'Expense Added Successfully',
                 'type'=>'success'
            );

            return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege'=>'Expense Added Fail',
                'type'=>'error'
            );

            return Redirect()->back()->with($notification);
        }
    }
    public function todayExpense(){
    	$curdate=date('d/m/Y');
    	$expenses=DB::table('expenses')->where('date',$curdate)->get();
    	$total=DB::table('expenses')->where('date',$curdate)->sum('amount');
    	return view('todayExpense',compact('expenses','total'));
    }

    public function edit($id){
    	$today=DB::table('expenses')->where('id',$id)->first();
    	return view('editTodayExpense',compact('today'));
    }

    public function todayExpenseUpdate(Request $request,$id){
    	$validatedData = $request->validate([
        'details' => 'required|min:5|',
        'amount' => 'required|numeric',
        ]);
        $data = array();
        $data['details']=$request->details;
        $data['amount']=$request->amount;

        $insert = DB::table('expenses')->where('id',$id)->update($data);
        if ($insert) {
            $notification = array(
           		'messege'=>'Today Expense Updated Successfully',
                 'type'=>'success'
            );

            return Redirect()->route('today.expense')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Today Expense Updated Fail',
                'type'=>'error'
            );

            return Redirect()->back()->with($notification);
        }

    }

    public function deleteTodayExpense($id){
    	$delete=DB::table('expenses')->where('id',$id)->delete();
    	if ($delete) {
            $notification = array(
           		'messege'=>'Today Expense deleted Successfully',
                 'type'=>'success'
            );

            return Redirect()->route('today.expense')->with($notification);
        }else{
            $notification = array(
                'messege'=>'Today Expense deleted Fail',
                'type'=>'error'
            );

            return Redirect()->back()->with($notification);
        }
    }
    public function monthlyExpense(){
        $month=date('m/Y');
        $data=DB::table('expenses')->where('month',$month)->get();
        $total=DB::table('expenses')->where('month',$month)->sum('amount');
        return view('monthlyExpense',compact('data','total'));
    }

    public function yearlyExpense(){
        $year=date('Y');
        $data=DB::table('expenses')->where('year',$year)->get();
        $total=DB::table('expenses')->where('year',$year)->sum('amount');
        return view('yearlyExpense',compact('data','total'));

    }

    public function january(){
        $month="1/".date('Y');
         $data =DB::table('expenses')->where('month',$month)->get();  
         $total =DB::table('expenses')->where('month',$month)->sum('amount');
         return view('monthlyExpense',compact('data','total'));  
    }
    public function february(){
        $month="2/".date('Y');
         $data =DB::table('expenses')->where('month',$month)->get();  
         $total =DB::table('expenses')->where('month',$month)->sum('amount');
         return view('monthlyExpense',compact('data','total'));  
    }
    public function march(){
        $month="3/".date('Y');
         $data =DB::table('expenses')->where('month',$month)->get();  
         $total =DB::table('expenses')->where('month',$month)->sum('amount');
         return view('monthlyExpense',compact('data','total'));  
    }
    public function april(){
        $month="4/".date('Y');
         $data =DB::table('expenses')->where('month',$month)->get();  
         $total =DB::table('expenses')->where('month',$month)->sum('amount');
         return view('monthlyExpense',compact('data','total'));  
    }
    public function may(){
        $month="5/".date('Y');
         $data =DB::table('expenses')->where('month',$month)->get();  
         $total =DB::table('expenses')->where('month',$month)->sum('amount');
         return view('monthlyExpense',compact('data','total'));  
    }
    public function june(){
        $month="6/".date('Y');
         $data =DB::table('expenses')->where('month',$month)->get();  
         $total =DB::table('expenses')->where('month',$month)->sum('amount');
         return view('monthlyExpense',compact('data','total'));  
    }
    public function july(){
        $month="7/".date('Y');
         $data =DB::table('expenses')->where('month',$month)->get();  
         $total =DB::table('expenses')->where('month',$month)->sum('amount');
         return view('monthlyExpense',compact('data','total'));  
    }
    public function august(){
        $month="8/".date('Y');
         $data =DB::table('expenses')->where('month',$month)->get();  
         $total =DB::table('expenses')->where('month',$month)->sum('amount');
         return view('monthlyExpense',compact('data','total'));  
    }
    public function september(){
        $month="9/".date('Y');
         $data =DB::table('expenses')->where('month',$month)->get();  
         $total =DB::table('expenses')->where('month',$month)->sum('amount');
         return view('monthlyExpense',compact('data','total'));  
    }
    public function october(){
        $month="10/".date('Y');
         $data =DB::table('expenses')->where('month',$month)->get();  
         $total =DB::table('expenses')->where('month',$month)->sum('amount');
         return view('monthlyExpense',compact('data','total'));  
    }
    public function november(){
        $month="11/".date('Y');
         $data =DB::table('expenses')->where('month',$month)->get();  
         $total =DB::table('expenses')->where('month',$month)->sum('amount');
         return view('monthlyExpense',compact('data','total'));  
    }
    public function december(){
        $month="12/".date('Y');
         $data =DB::table('expenses')->where('month',$month)->get();  
         $total =DB::table('expenses')->where('month',$month)->sum('amount');
         return view('monthlyExpense',compact('data','total'));  
    }


}
