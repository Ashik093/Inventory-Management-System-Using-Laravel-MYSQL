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
                        <li class="active">View Customer</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">View Customer</h3></div>
                        <div class="panel-body">
                                <div class="text-center">
                                  <img style="width: 200px;height: 200px;" src="{{ URL::to($single->photo) }}" class="rounded" alt="...">
                                </div>
                                
                                <div class="text-center">
                                    <label for="exampleInputEmail1">Name :</label>
                                    <span class="viewSingleEmployee">{{ $single->name }}</span>
                                    
                                </div>
                                <div class="text-center">
                                    <label for="exampleInputEmail1">Email :</label>
                                    <span class="viewSingleEmployee">{{ $single->email }}</span>
                                </div>
                                <div class="text-center">
                                    <label for="exampleInputEmail1">Phone :</label>
                                    <span class="viewSingleEmployee">{{ $single->phone }}</span>
                                </div>
                                <div class="text-center">
                                    <label for="exampleInputEmail1">Address :</label>
                                    <span class="viewSingleEmployee">{{ $single->address }}</span>
                                </div>
                                <div class="text-center">
                                    <label for="exampleInputEmail1">Shop Name :</label>
                                    <span class="viewSingleEmployee">{{ $single->shopName }}</span>
                                </div>
                               
                                <div class="text-center">
                                    <label for="exampleInputEmail1">Account Holder :</label>
                                    <span class="viewSingleEmployee">{{ $single->account_holder }}</span>
                                </div>
                                <div class="text-center">
                                    <label for="exampleInputEmail1">Account Number :</label>
                                    <span class="viewSingleEmployee">{{ $single->account_number }}</span>
                                </div>
                                <div class="text-center">
                                    <label for="exampleInputEmail1">Bank Name :</label>
                                    <span class="viewSingleEmployee">{{ $single->bank_name }}</span>
                                </div>
                                <div class="text-center">
                                    <label for="exampleInputEmail1">Bank Branch :</label>
                                    <span class="viewSingleEmployee">{{ $single->bank_branch }}</span>
                                </div>
                                <div class="text-center">
                                    <label for="exampleInputEmail1">City :</label>
                                    <span class="viewSingleEmployee">{{ $single->city }}</span>
                                </div>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->
                </div> <!-- end row -->

        </div> <!-- container -->
                   
    </div> <!-- content -->
</div>
@endsection
