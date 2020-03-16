<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class PosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	$product=DB::table('products')
    			   ->join('categories','products.cat_id','categories.id')
    			   ->select('categories.name as catName','products.*')
    			   ->get();
    	$customer=DB::table('customers')->get();
    	$categories = DB::table('categories')->get();
    	return view('pos',compact('product','customer','categories'));
    }

    public function pendingOrders(){
        $orders = DB::table('orders')
                ->join('customers','orders.customer_id','customers.id')
                ->select('customers.name','orders.*','orders.id as order_id')
                ->where('order_status','pending')
                ->get();
        return view('allPendingOrder',compact('orders'));
    }

    public function singleOrder($id){
        $order = DB::table('orders')
                ->join('customers','orders.customer_id','customers.id')
                ->select('customers.*','orders.*','orders.id as order_id')
                ->where('orders.id',$id)
                ->first();

        $contents = DB::table('orderdetails')
                        ->join('products','products.id','orderdetails.product_id')
                        ->select('products.*','orderdetails.*','products.id as prod_id')
                        ->where('order_id',$id)
                        ->get();

        return view('viewSingleOrder',compact('order','contents'));
    }

    public function aproveOrder($id){
        $update = DB::table('orders')->where('id',$id)->update(['order_status'=>'success']);

        if ($update) {
            $notification = array(
                'messege'=>'Order Aproved',
                'type'=>'success'
            );
            return Redirect()->route('pending.order')->with($notification);

        }else{
            $notification = array(
                'messege'=>'Order Not Aproved',
                'type'=>'error'
            );

            return Redirect()->route('pending.order')->with($notification);
        }
    }

    public function successOrders(){
        $orders = DB::table('orders')
                ->join('customers','orders.customer_id','customers.id')
                ->select('customers.name','orders.*','orders.id as order_id')
                ->where('order_status','success')
                ->get();
        return view('allSuccessOrder',compact('orders'));
    }

    public function pdf($id){
         $order = DB::table('orders')
                ->join('customers','orders.customer_id','customers.id')
                ->select('customers.*','orders.*','orders.id as order_id')
                ->where('orders.id',$id)
                ->first();

        $contents = DB::table('orderdetails')
                        ->join('products','products.id','orderdetails.product_id')
                        ->select('products.*','orderdetails.*','products.id as prod_id')
                        ->where('order_id',$id)
                        ->get();
        $pdf = PDF::loadView('invoicePdf',compact('order','contents'));
        
        return $pdf->download($order->order_id.'.pdf');
    }
}
