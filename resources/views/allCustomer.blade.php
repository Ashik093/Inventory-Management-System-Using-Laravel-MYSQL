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
                        <li class="active">All Customer</li>
                    </ol>
                </div>
            </div>
            <!-- Start Widget -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">All Customer</h3>
                        </div>
                        <div class="panel-body">
                            <a href="{{ route('add.customer') }}" class="btn btn-sm btn-primary">Add New</a>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Shop Name</th>
                                                <th>Photo</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            @foreach($customers as $customer)
                                                <tr>
                                                    <td>{{ $customer->name }}</td>
                                                    <td>{{ $customer->email }}</td>
                                                    <td>{{ $customer->phone }}</td>
                                                    <td>{{ $customer->address }}</td>
                                                    <td>{{ $customer->shopName }}</td>
                                                    <td><img src="{{ $customer->photo }}" style="width: 40px;height: 40px;" alt=""></td> 
                                                    <td><div class="btn-group"><a class="btn btn-group btn-sm btn-primary" href="{{ URL::to('edit-customer/'.$customer->id) }}">Edit</a><a class="btn btn-sm btn-danger" href="{{ URL::to('delete-customer/'.$customer->id) }}" id="delete">Delete</a><a class="btn btn-sm btn-success" href="{{ URL::to('view-customer/'.$customer->id) }}">View</a></div></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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