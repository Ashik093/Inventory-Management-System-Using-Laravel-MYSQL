<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
class CartController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request){
    	$data = array();
    	$data['id']=$request->id;
    	$data['name']=$request->name;
    	$data['qty']= $request->qty;
    	$data['price']=$request->price;
    	$data['weight']=$request->weight;
    	$add=Cart::add($data);
    	if($add){
    		$notification = array(
                'messege'=>'Product Added',
                'type'=>'success'
            );

            return Redirect()->back()->with($notification);
    	}else{
    		$notification = array(
                'messege'=>'Product Added Fail',
                'type'=>'error'
            );
    	}
    }

    public function UpdateCart(Request $request,$rowId){
    	$qty = $request->qty;
    	$update = Cart::update($rowId, $qty);
    	if($update){
    		$notification = array(
                'messege'=>'Updated',
                'type'=>'success'
            );

            return Redirect()->back()->with($notification);
    	}else{
    		$notification = array(
                'messege'=>'Fail',
                'type'=>'error'
            );
            return Redirect()->back()->with($notification);
    	}
    }

    public function CartRemove($rowId){
    	$remove = Cart::remove($rowId);
    	if(!$remove){
    		$notification = array(
                'messege'=>'Removed',
                'type'=>'success'
            );

            return Redirect()->back()->with($notification);
    	}else{
    		$notification = array(
                'messege'=>'Fail',
                'type'=>'error'
            );
            return Redirect()->back()->with($notification);
    	}

    }

    public function CreateInvoice(Request $request){
    	$validatedData = $request->validate([
    		'customer'=>'required',
    	],
    	[
    		'customer.required'=>'Select a customer first !',
    	]);

    	$cus_id = $request->customer;
    	$customer = DB::table('customers')->where('id',$cus_id)->first();
    	$contents= Cart::content();
    	return view('invoice',compact('customer','contents'));
    }

    public function FinalInvoice(Request $request){
    	$data = array();
    	$data['customer_id'] = $request->customer_id;
    	$data['order_date'] = $request->order_date;
    	$data['order_status'] = $request->order_status;
    	$data['total_products'] = $request->total_products;
    	$data['sub_total'] =str_replace(',', '',$request->sub_total);
    	$data['vat'] = str_replace(',', '',$request->vat);
    	$data['total'] = str_replace(',', '',$request->total);
    	$data['payment_status'] = $request->payment_status;
    	$data['pay'] = str_replace(',', '',$request->pay);
    	$data['due'] = str_replace(',', '',$request->due);

    	$order_id = DB::table('orders')->insertGetId($data);
    	$contents = Cart::content();

    	$odata = array();
    	foreach ($contents as $content) {
    		$odata['order_id'] = $order_id;
    		$odata['product_id'] = $content->id;
    		$odata['quantity'] = $content->qty;
    		$odata['unitcost'] = str_replace(',', '',$content->price);
    		$odata['total'] = str_replace(',', '',$content->total);
    		$insert=DB::table('orderdetails')->insert($odata);
    	}

    	if($insert){
    		$notification = array(
                'messege'=>'Successfully Invoice Created !!!',
                'type'=>'success'
            );
            Cart::destroy();

            return Redirect()->route('home')->with($notification);
    	}else{
    		$notification = array(
                'messege'=>'Fail',
                'type'=>'error'
            );
            return Redirect()->back()->with($notification);
    	}

    }

    

}
