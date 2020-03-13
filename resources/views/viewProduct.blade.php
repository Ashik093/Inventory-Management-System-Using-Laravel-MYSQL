@extends('layouts.app')

@section('content')
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Inventory Management System</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="active">View Product</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">View Product</h3></div>
                        <div class="panel-body">
                                <div class="text-center">
                                  <img style="width: 200px;height: 200px;" src="{{ URL::to($product->product_image) }}" class="rounded" alt="...">
                                </div>
                                
                                <div class="text-center">
                                    <label for="exampleInputEmail1">Product Name :</label>
                                    <span class="viewSingleEmployee">{{ $product->product_name }}</span>
                                    
                                </div>
                                <div class="text-center">
                                    <label for="exampleInputEmail1">Category Name :</label>
                                    <span class="viewSingleEmployee">{{ $product->cat_name }}</span>
                                </div>
                                <div class="text-center">
                                    <label for="exampleInputEmail1">Supplier Name :</label>
                                    <span class="viewSingleEmployee">{{ $product->sup_name }}</span>
                                </div>
                                <div class="text-center">
                                    <label for="exampleInputEmail1">Product Code :</label>
                                    <span class="viewSingleEmployee">{{ $product->product_code }}</span>
                                </div>
                                
                               <div class="text-center">
                                    <label for="exampleInputEmail1">Product Garage :</label>
                                    <span class="viewSingleEmployee">{{ $product->product_garage }}</span>
                                </div>
                                <div class="text-center">
                                    <label for="exampleInputEmail1">Product Route :</label>
                                    <span class="viewSingleEmployee">{{ $product->product_route }}</span>
                                </div>
                                <div class="text-center">
                                    <label for="exampleInputEmail1">Buying Date :</label>
                                    <span class="viewSingleEmployee">{{ $product->buy_date }}</span>
                                </div>
                                <div class="text-center">
                                    <label for="exampleInputEmail1">Expire Date :</label>
                                    <span class="viewSingleEmployee">{{ $product->expire_date }}</span>
                                </div>
                                <div class="text-center">
                                    <label for="exampleInputEmail1">Buying Price :</label>
                                    <span class="viewSingleEmployee">{{ $product->buying_price }}</span>
                                </div>
                                <div class="text-center">
                                    <label for="exampleInputEmail1">Selling Price :</label>
                                    <span class="viewSingleEmployee">{{ $product->selling_price }}</span>
                                </div>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->
                </div> <!-- end row -->

        </div> <!-- container -->
                   
    </div> <!-- content -->
</div>
@endsection
