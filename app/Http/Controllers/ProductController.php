<?php

namespace App\Http\Controllers;


use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	$categories=DB::table('categories')->get();
    	$supplier=DB::table('suppliers')->get();
    	return view('addProduct',compact('categories','supplier'));
    }
    public function store(Request $request){
    	$validatedData = $request->validate([
        'product_name' => 'required|min:3|max:255',
        'cat_id' => 'required',
        'sup_id' => 'required',
        'product_code' => 'required|unique:products',
        'product_garage' => 'required',
        'product_route' => 'required',
        'buy_date' => 'required',
        'expire_date' => 'required',
        'buying_price' => 'required|integer',
        'selling_price' => 'required|integer',
        'photo' => 'required',
        ]);

        $data = array();
        $data['product_name']=$request->product_name;
        $data['cat_id']=$request->cat_id;
        $data['sup_id']=$request->sup_id;
        $data['product_code']=$request->product_code;
        $data['product_garage']=$request->product_garage;
        $data['product_route']=$request->product_route;
        $data['buy_date']=$request->buy_date;
        $data['expire_date']=$request->expire_date;
        $data['buying_price']=$request->buying_price;
        $data['selling_price']=$request->selling_price;
        $image = $request->photo;

        if($image){
            $image_name = str_random(10);
            $image_ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$image_ext;
            $upload_path = 'products/';
            $image_url= $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            if($success){
                $data['product_image']=$image_url;
                $insert = DB::table('products')->insert($data);
                if ($insert) {
                    $notification = array(
                        'messege'=>'Product Added Successfully',
                        'type'=>'success'
                    );

                    return Redirect()->back()->with($notification);

                }else{
                    $notification = array(
                        'messege'=>'Product Added Fail',
                        'type'=>'error'
                    );

                    return Redirect()->back()->with($notification);
                }
            }else{
                $notification = array(
                    'messege'=>'Product Added Fail',
                    'type'=>'error'
                );

                return Redirect()->back()->with($notification);
            }
        }
    }

    public function allProduct(){
    	$products=DB::table('products')->get();
    	return view('allProduct',compact('products'));
    }

    public function delete($id){
    	$data=DB::table('products')->where('id',$id)->first();
        $photo=$data->product_image;
        $delete=DB::table('products')->where('id',$id)->delete();
        if ($delete) {
            $notification = array(
                'messege'=>'Product Deleted Successfully',
                'type'=>'error'
            );
            unlink($photo);
            return Redirect()->back()->with($notification);

        }else{
            $notification = array(
                'messege'=>'Product Deleted Fail',
                'type'=>'error'
            );

            return Redirect()->back()->with($notification);
        }
    }

    public function edit($id){
    	$product=DB::table('products')->where('id',$id)->first();
    	$categories=DB::table('categories')->get();
    	$supplier=DB::table('suppliers')->get();

    	return view('editProduct',compact('product','categories','supplier'));
    }

    public function update(Request $request,$id){
    	$validatedData = $request->validate([
        'product_name' => 'required|min:3|max:255',
        'cat_id' => 'required',
        'sup_id' => 'required',
        'product_code' => 'required',
        'product_garage' => 'required',
        'product_route' => 'required',
        'buy_date' => 'required',
        'expire_date' => 'required',
        'buying_price' => 'required|integer',
        'selling_price' => 'required|integer',

        ]);

        $data = array();
        $data['product_name']=$request->product_name;
        $data['cat_id']=$request->cat_id;
        $data['sup_id']=$request->sup_id;
        $data['product_code']=$request->product_code;
        $data['product_garage']=$request->product_garage;
        $data['product_route']=$request->product_route;
        $data['buy_date']=$request->buy_date;
        $data['expire_date']=$request->expire_date;
        $data['buying_price']=$request->buying_price;
        $data['selling_price']=$request->selling_price;
        $image = $request->photo;

        if($image){
            $image_name = str_random(10);
            $image_ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$image_ext;
            $upload_path = 'products/';
            $image_url= $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            if($success){
                $data['product_image']=$image_url;
                $img=DB::table('products')->where('id',$id)->first();
                $img_path=$img->product_image;
                unlink($img_path);
            }
        }

        $update = DB::table('products')->where('id',$id)->update($data);
        if ($update) {
            $notification = array(
                'messege'=>'Product Updated Successfully',
                'type'=>'warning'
            );

            return Redirect()->back()->with($notification);

        }else{
            $notification = array(
                'messege'=>'Product Updated Fail',
                'type'=>'error'
            );

            return Redirect()->back()->with($notification);
        }

    }


    public function view($id){

    	$product=DB::table('products')
    				->join('categories','products.cat_id','categories.id')
    				->join('suppliers','products.sup_id','suppliers.id')
    				->select('products.*','categories.name as cat_name','suppliers.name as sup_name')
    				->where('products.id',$id)
    				->first();

    	return view('viewProduct',compact('product'));
    }


    public function ImportProduct(){
        return view('importProduct');
    }
    public function export(){
        return Excel::download(new ProductsExport, 'products.xlsx');
    }
    public function import(Request $request){
         $import=Excel::import(new ProductsImport, $request->file('importFile'));

         if ($import) {
            $notification = array(
                'messege'=>'Product Import Successfully',
                'type'=>'success'
            );

            return Redirect()->back()->with($notification);

        }else{
            $notification = array(
                'messege'=>'Product Import Fail',
                'type'=>'error'
            );

            return Redirect()->route('all.product')->with($notification);
        }
    }

}
