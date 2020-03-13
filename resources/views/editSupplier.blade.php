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
                        <li class="active">Edit Supplier</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Edit Supplier</h3></div>
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
                            <form action="{{ url('update-supplier/'.$edit->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" name="name" required value="{{ $edit->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" name="email" required value="{{ $edit->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phone</label>
                                    <input type="text" class="form-control" name="phone" required value="{{ $edit->phone }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Address</label>
                                    <input type="text" class="form-control" name="address" required value="{{ $edit->address }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Type</label>
                                    <select name="type" id="" class="form-control">
                                        
                                        <option <?php if($edit->type==1) {echo 'selected';} ?> value="1">Distributor</option>
                                        <option <?php if($edit->type==2) {echo 'selected';} ?> value="2" >Whole Sale</option>
                                        <option <?php if($edit->type==3) {echo 'selected';} ?> value="3">Brochure</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Shop Name</label>
                                    <input value="{{ $edit->shop }}" type="text" class="form-control" name="shop" required >
                                </div>
                               
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Account Holder</label>
                                    <input type="text" class="form-control" name="accountholder" required value="{{ $edit->accountholder }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Account Number</label>
                                    <input type="text" class="form-control" name="accountnumber" required value="{{ $edit->accountnumber }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bank Name</label>
                                    <input type="text" class="form-control" name="bankname" required value="{{ $edit->bankname }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bank Branch</label>
                                    <input type="text" class="form-control" name="bankbranch" required value="{{ $edit->bankbranch }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">City</label>
                                    <input type="text" class="form-control" name="city" required value="{{ $edit->city }}">
                                </div>
                                <div class="form-group">
                                    <img style="width: 100px;height: 80px;" src="{{ URL::to($edit->photo) }}" alt="" id="image">
                                    <label for="exampleInputEmail1">Photo</label>
                                    <input type="file" class="upload" accept="image/*" onchange="readURL(this);" name="photo" value="{{ $edit->photo }}">
                                </div>

                                <button type="submit" class="btn btn-purple waves-effect waves-light">Add</button>
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
