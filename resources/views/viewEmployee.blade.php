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
                        <li class="active">View Employee</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">View Employee</h3></div>
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
                                    <label for="exampleInputEmail1">Experience :</label>
                                    <span class="viewSingleEmployee">{{ $single->experience }} Years</span>
                                </div>
                                <div class="text-center">
                                    <label for="exampleInputEmail1">Salary :</label>
                                    <span class="viewSingleEmployee">${{ $single->salary }}</span>
                                </div>
                               
                                <div class="text-center">
                                    <label for="exampleInputEmail1">Vacation :</label>
                                    <span class="viewSingleEmployee">{{ $single->vacation }}</span>
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
