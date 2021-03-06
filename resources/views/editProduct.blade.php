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
                        <li class="active">Edit Product</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Edit Product Information</h3></div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="panel-body">
                            <form action="{{ url('update-product/'.$product->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Name</label>
                                    <input type="text" class="form-control" name="product_name" required value="{{ $product->product_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category Name</label>
                                    <select class="form-control" name="cat_id">
                                        @foreach($categories as $category)
                                             <option <?php if($category->id==$product->cat_id){ echo "selected"; } ?> value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Supplier Name</label>
                                    <select class="form-control" name="sup_id">
                                      @foreach($supplier as $sup)
                                            <option <?php if($sup->id==$product->sup_id){ echo "selected"; } ?> value="{{ $sup->id }}">{{ $sup->name }}</option>
                                      @endforeach
                                    </select>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Code</label>
                                    <input type="text" class="form-control" name="product_code" required value="{{ $product->product_code }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Garage</label>
                                    <input type="text" class="form-control" name="product_garage" required value="{{ $product->product_garage }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Route</label>
                                    <input type="text" class="form-control" name="product_route" required value="{{ $product->product_route }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Buying Date</label>
                                    <input type="date" class="form-control" name="buy_date" required value="{{ $product->buy_date }}">
                                </div>
                               
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Expire Date</label>
                                    <input type="date" class="form-control" name="expire_date" required value="{{ $product->expire_date }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Buying Price</label>
                                    <input type="text" class="form-control" name="buying_price" required value="{{ $product->buying_price }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Selling Price</label>
                                    <input type="text" class="form-control" name="selling_price" required value="{{ $product->selling_price }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Photo</label>
                                    <img style="height: 100px;width: 100px;" src="{{ URL::to($product->product_image) }}" alt="" id="image">

                                    <input type="file" class="upload" accept="image/*"  onchange="readURL(this);" name="photo" value="{{ $product->product_image }}">
                                </div>

                                <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
                            </form>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->
                </div> <!-- end row -->

        </div> <!-- container -->
                   
    </div> <!-- content -->
</div>

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
