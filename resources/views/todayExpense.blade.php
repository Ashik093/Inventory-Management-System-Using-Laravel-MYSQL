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
                        <li class="active">Today Expense</li>
                        
                    </ol>
                </div>
            </div>
            <!-- Start Widget -->
            <div class="row">
                <div class="col-md-12">
                    <p class="text-success">{{ date("l jS \of F Y") }}</p>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Today Expense<div class="btn-group pull-right">
                                <a href="{{ route('monthly.expense') }}" class="btn btn-sm btn-primary">This Month Expense</a>
                                <a href="{{ route('today.expense') }}" class="btn btn-sm btn-success">Today Expense</a>
                            </div></h3>
                            <h3 class="text-info">Today Expense (total) : {{ $total }} Taka</h3>
                        </div>
                        <div class="panel-body">
                            <a href="{{ route('add.expense') }}" class="btn btn-sm btn-primary pull-right">Add New</a>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Details</th>
                                                <th>Amount</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            @foreach($expenses as $row)
                                            <tr>
                                                <td>{{ $row->details }}</td>
                                                <td>{{ $row->amount }}</td>
                                                <td><div class="btn-group"><a class="btn btn-group btn-sm btn-primary" href="{{ URL::to('edit-today-expense/'.$row->id) }}">Edit</a><a class="btn btn-sm btn-danger" href="{{ URL::to('delete-today-expense/'.$row->id) }}" id="delete">Delete</a></div></td>
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