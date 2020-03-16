<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today = date('m/d/Y');
        $todaySales = DB::table('orders')->where('order_status','success')->where('order_date',$today)->sum('total');
        $orders = DB::table('orders')->where('order_date',$today)->count();
        $customer = DB::table('customers')->count();
        return view('home',compact('todaySales','orders','customer'));
    }
}
