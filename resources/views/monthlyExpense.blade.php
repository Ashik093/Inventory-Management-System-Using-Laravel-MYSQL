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
                        <li class="active">Monthly Expense</li>
                        
                    </ol>
                </div>
            </div>
            <!-- Start Widget -->
            <div class="row">
                <div class="btn-group">
                    <a href="{{ url('view-expense/january') }}" class="btn btn-sm btn-primary">January</a>
                    <a href="{{ url('view-expense/february') }}" class="btn btn-sm btn-success">February</a>
                    <a href="{{ url('view-expense/march') }}" class="btn btn-sm btn-info">March</a>
                    <a href="{{ url('view-expense/april') }}" class="btn btn-sm btn-danger">April</a>
                    <a href="{{ url('view-expense/may') }}" class="btn btn-sm btn-warning">May</a>
                    <a href="{{ url('view-expense/june') }}" class="btn btn-sm btn-success">June</a>
                    <a href="{{ url('view-expense/july') }}" class="btn btn-sm btn-info">July</a>
                    <a href="{{ url('view-expense/agust') }}" class="btn btn-sm btn-primary">August</a>
                    <a href="{{ url('view-expense/september') }}" class="btn btn-sm btn-danger">September</a>
                    <a href="{{ url('view-expense/october') }}" class="btn btn-sm btn-warning">October</a>
                    <a href="{{ url('view-expense/november') }}" class="btn btn-sm btn-warning">November</a>
                    
                    <a href="{{ url('view-expense/december') }}" class="btn btn-sm btn-primary">December</a>
                </div>
                <div class="col-md-12">
                    <p class="text-success">{{ date("Y") }}</p>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><span class="text-danger">Monthly</span> Expense<div class="btn-group pull-right">
                                <a href="{{ route('monthly.expense') }}" class="btn btn-sm btn-primary">This Month Expense</a>
                                <a href="{{ route('today.expense') }}" class="btn btn-sm btn-success">Today Expense</a>
                            </div></h3>
                            <h3 class="text-info"> Expense (total) : {{ $total }} Taka</h3>
                        </div>
                        <div class="panel-body">
                            <a href="{{ route('add.expense') }}" class="btn btn-sm btn-primary pull-right">Add New</a>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Details</th>
                                                <th>Date</th>
                                                <th>Amount</th>
                                                
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            @foreach($data as $row)
                                            <tr>
                                                <td>{{ $row->details }}</td>
                                                <td>{{ $row->date }}</td>
                                                <td>{{ $row->amount }}</td>
                                                
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