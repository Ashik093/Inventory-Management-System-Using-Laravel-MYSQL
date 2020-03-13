<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Attendence;

class AttendenceController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$employees=DB::table('employees')->get();
    	return view('takeAttendence',compact('employees'));
    }

    public function insert(Request $request){
    	$att_date=date('d_m_Y');
        $check=DB::table('attendences')->where('edit_date',$att_date)->first();
        if ($check) {
            $notification = array(
                'messege'=>'Today Attendence Already Taken',
                'type'=>'warning'
            );

            return Redirect()->back()->with($notification);
        }else{
            foreach ($request->user_id as $id) {
                $data[]=[
                    "user_id"=>$id,
                    "att_date"=>$request->att_date,
                    "att_year"=>$request->att_year,
                    "edit_date"=>date("d_m_Y"),
                    "attendence"=>$request->attendence[$id]
                ];
            }
            $insert=DB::table('attendences')->insert($data);
            if ($insert) {
                $notification = array(
                    'messege'=>'Attendence Successfully Taken',
                    'type'=>'success'
                );

                return Redirect()->back()->with($notification);

            }else{
                $notification = array(
                    'messege'=>'Attendence Taken Fail',
                    'type'=>'error'
                );

                return Redirect()->back()->with($notification);
            }
        }
    }

    public function allAttendence(){
        $all=DB::table('attendences')->select('edit_date')->groupBy('edit_date')->get();
        return view('allAttendence',compact('all'));
    }

    public function editAttendence($edit_date){
        $edit=DB::table('attendences')
                ->join('employees','attendences.user_id','employees.id')
                ->select('attendences.*','employees.name','employees.photo')
                ->where('edit_date',$edit_date)
                ->get();

        return view('editAttendence',compact('edit'));
    }

    public function updateAttendence(Request $request){
        $edit_date=date('d_m_Y');
        foreach ($request->id as $id) {
            $data=[
                "att_date"=>$request->att_date,
                "att_year"=>$request->att_year,
                "attendence"=>$request->attendence[$id]
            ];

            $attendence= Attendence::where(['edit_date'=>$edit_date,'id'=>$id])->first();
            $attendence->update($data);

        }
        // echo "<pre>";
        // print_r($data);

        if ($attendence) {
            $notification = array(
                'messege'=>'Attendence Successfully Updated',
                'type'=>'success'
            );

            return Redirect()->route('all.attendence')->with($notification);

        }else{
            $notification = array(
                'messege'=>'Attendence Updated Fail',
                'type'=>'error'
            );

            return Redirect()->back()->with($notification);
        }
    }

    public function view($edit_date){
        $view=DB::table('attendences')
                ->join('employees','attendences.user_id','employees.id')
                ->select('attendences.*','employees.name','employees.photo')
                ->where('edit_date',$edit_date)
                ->get();
        return view('viewAttendence',compact('view'));
    }
}
