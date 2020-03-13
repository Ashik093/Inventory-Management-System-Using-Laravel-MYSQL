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
                        <li class="active">pos</li>
                    </ol>
                </div>

            </div>
             
        </div> <!-- container -->
       
        <div class="row">
           
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="bg-primary p-4">
                    <h2 class="text-white text-center">POS ( Point Of Sale )</h2>
                </div>
                <div class="portfolioFilter">
                    @foreach($categories as $cat)
                        <a href="#" data-filter="*" class="current">{{ $cat->name }}</a>
                    @endforeach
                    
                </div>
            </div>
        </div>
        <br><br><br>
    
        <div class="row">
            <!--Customer-->
            <div class="col-md-5">
                <div class="panel panel-default">
                    
                    <div class="price_card text-center">
                        
                        <ul class="price-features" style="border: 1px solid grey;">
                            <table class="table">
                                <thead class="bg-info">
                                    <tr>
                                        <th class="text-white">Name</th>
                                        <th class="text-white">Qty</th>
                                        <th class="text-white">Price</th>
                                        <th class="text-white">Sub-Total</th>
                                        <th class="text-white">Action</th>
                                    </tr>
                                </thead>

                                @php
                                    $cart_product = Cart::content();
                                @endphp
                                <tbody>
                                    @foreach($cart_product as $prod)
                                        <tr>
                                        
                                        <th width="15">{{ $prod->name }}</th>
                                        <th>
                                            <form action="{{ url('cart-update/'.$prod->rowId) }}" method="post">
                                                @csrf
                                                <input type="number" value="{{ $prod->qty }}" name="qty" style="width: 40px;">
                                                <button style="margin-top: -2px;" type="submit" class="btn btn-sm btn-success"><i class="ion-checkmark-circled"></i></button>
                                            </form>
                                        </th>
                                        <th>{{ $prod->price }}</th>
                                        <th>{{ $prod->price*$prod->qty }}</th>
                                        <th><a href="{{ URL::to('cart-remove/'.$prod->rowId) }}" style="margin-top: -2px;" class="btn btn-sm btn-danger"><i class="ion-close-circled"></i></a></th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </ul>
                        <div class="pricing-header bg-primary">
                            <p style="font-size: 19px;">Total Quantity: {{ Cart::count() }}</p>
                            <p style="font-size: 19px;">Sub Total: {{ Cart::subtotal() }}</p>
                            
                            <p style="font-size: 19px;">VAT: {{ Cart::tax() }}</p>
                            <hr>
                            <p><h3 class="text-white">Total</h3> <h2 class="text-white">{{ Cart::total() }}</h2></p>
                        </div>
                        

                            <div class="panel-heading">
                                <h3 class="panel-title">Selest Customer <a href="#" class="btn btn-primary btn-sm waves-effect waves-light pull-right" data-toggle="modal" data-target="#con-close-modal">Add New</a></h3>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ url('create-invoice') }}" method="post">
                            @csrf
                            <div class="panel-body">
                                <select name="customer" class="form-control">
                                    <option selected="" disabled="">Select A Customer</option>
                                    @foreach($customer as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Create Invoice</button>
                        </form>
                    </div> <!-- end Pricing_card -->
                </div>
            </div>

            <!--Products-->
            <div class="col-md-7">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">All Products <a class="btn btn-success pull-right" href="{{ route('add.product') }}" class="btn btn-sm btn-primary">Add New</a></h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Product Code</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach($product as $row)
                                    <tr>
                                        <form action="{{ url('add-cart') }}" method="POST">
                                         @csrf

                                         <input type="hidden" name="id" value="{{ $row->id }}">
                                         <input type="hidden" name="name" value="{{ $row->product_name }}">
                                         <input type="hidden" name="qty" value="1">
                                         <input type="hidden" name="price" value="{{ $row->selling_price }}">
                                         <input type="hidden" name="weight" value="1">



                                            <td>{{ $row->product_name }}</td>
                                            <td>{{ $row->catName }}</td>
                                            <td>{{ $row->product_code }}</td>
                                            <td><img src="{{ URL::to($row->product_image) }}" style="width: 40px;height: 40px;" alt="">
                                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-plus-square"></i></button>

                                            </td>

                                        </form>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- content -->




    <!--Modal-->
<form action="{{ url('insert-customer') }}" method="POST" enctype="multipart/form-data">
@csrf
<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Add a new Customer</h4>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-4" class="control-label">Name </label>
                            <input type="text" class="form-control" id="field-4" name="name" required="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-5" class="control-label">Email</label>
                            <input type="email" class="form-control" id="field-5" name="email" required="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-6" class="control-label">Phone</label>
                            <input type="text" class="form-control" id="field-6" name="phone" required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-4" class="control-label">Address </label>
                            <input type="text" class="form-control" id="field-4" name="address" required="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-5" class="control-label">Shop Name</label>
                            <input type="text" class="form-control" id="field-5" name="shopName" required="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-6" class="control-label">City</label>
                            <input type="text" class="form-control" id="field-6" name="city" required="">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-4" class="control-label">Account Holder </label>
                            <input type="text" class="form-control" id="field-4" name="account_holder" required="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-5" class="control-label">Account Number</label>
                            <input type="text" class="form-control" id="field-5" name="account_number" required="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-6" class="control-label">Bank Name</label>
                            <input type="text" class="form-control" id="field-6" name="bank_name" required="">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-4" class="control-label">Bank Branch </label>
                            <input type="text" class="form-control" id="field-4" name="bank_branch" required="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <img src="#" alt="" id="image">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            
                            <label for="exampleInputEmail1">Photo</label>
                            <input type="file" class="upload" accept="image/*" required onchange="readURL(this);" name="photo">
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
            </div>
        </div>
    </div>
    </div><!-- /.modal -->
</form>



<script type="text/javascript">
    function readURL(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e){
                $("#image").attr('src',e.target.result).width(100).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
           
@endsection