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
                        <li class="active">Pay Salary</li>
                    </ol>
                </div>
            </div>
            <!-- Start Widget -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Pay Salary For <span class="text-primary">{{ date('F Y',strtotime('-1 months')) }}</span> <span class="pull-right text-success"><span class="text-danger">Current Month:</span> {{ date('F Y') }}</span></h3>
                            
                        </div>
                        <div class="panel-body">
                            
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Photo</th>
                                                <th>Salary</th>
                                                <th>Month</th>
                                                <th>Advance Paid</th>  
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            @foreach($emp as $em)
                                            <tr>
                                                <td>{{ $em->name }}</td>
                                                <td><img src="{{ URL::to($em->photo) }}" style="width: 40px;height: 40px;" alt=""></td>
                                                <td>{{ $em->salary }}</td>
                                                <td><span class="badge badge-pill badge-success">{{ date('F',strtotime('-1 months')) }}</span></td>
                                                <td></td>
                                                
                                                <td><div class="btn-group"><a class="btn btn-sm btn-success" href="">Pay Now</a></div></td>
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
            
            @endsection