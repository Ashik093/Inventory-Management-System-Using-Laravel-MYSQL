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
                        <li class="active">All Advance Salary</li>
                    </ol>
                </div>
            </div>
            <!-- Start Widget -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">All Advance Salary</h3>
                        </div>
                        <div class="panel-body">
                            <a href="{{ route('add.advance.salary') }}" class="btn btn-sm btn-primary">Add New</a>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Advance</th>
                                                <th>Salary</th>
                                                <th>Month</th>
                                                <th>Year</th>
                                                <th>Photo</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            @foreach($advanced_salary as $advance)
                                            <tr>
                                                <td>{{ $advance->name }}</td>
                                                <td>{{ $advance->advanced_salary }}</td>
                                                <td>{{ $advance->salary }}</td>
                                                <td>{{ $advance->month }}</td>
                                                <td>{{ $advance->year }}</td>
                                                <td><img src="{{ URL::to($advance->photo) }}" style="width: 40px;height: 40px;" alt=""></td>
                                                <td><div class="btn-group"><a class="btn btn-group btn-sm btn-primary" href="">Edit</a><a class="btn btn-sm btn-danger" href="" id="delete">Delete</a><a class="btn btn-sm btn-success" href="">View</a></div></td>
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