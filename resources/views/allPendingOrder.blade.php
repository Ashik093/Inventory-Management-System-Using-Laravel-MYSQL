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
                        <li class="active">All Pending Orders</li>
                    </ol>
                </div>
            </div>
            <!-- Start Widget -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">All Pending Order</h3>
                        </div>
                        <div class="panel-body">
                           {{--  <a href="{{ route('add.employee') }}" class="btn btn-sm btn-primary">Add New</a> --}}
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Customer Name</th>
                                                <th>Order Date</th>
                                                <th>Quantity</th>
                                                <th>Total Amount</th>
                                                <th>Payment</th>
                                                <th>Order Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            @foreach($orders as $order)
                                                <tr>
                                                    <td>{{ $order->name }}</td>
                                                    <td>{{ $order->order_date }}</td>
                                                    <td>{{ $order->total_products }}</td>
                                                    <td>{{ $order->total }}</td>
                                                    <td>{{ $order->payment_status }}</td>
                                                    <td><span class="badge badge-danger">{{ $order->order_status }}</span></td> 
                                                    <td><a class="btn btn-sm btn-success" href="{{ URL::to('view-single-order/'.$order->order_id) }}">View</a></div></td>
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