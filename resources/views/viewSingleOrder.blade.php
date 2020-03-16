@extends('layouts.app')

@section('content')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Invoice</h4>
                   
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="clearfix">
                                <div class="pull-left">
                                    
                                    
                                </div>
                                <div class="pull-right">
                                    <h4>Date<br>
                                    <strong>{{ date('d/m/Y') }}</strong>
                                    </h4>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <div class="pull-left m-t-30">
                                        <address>
                                            <strong>Name : {{ $order->name }}</strong><br>
                                            <strong>Shop Name : {{ $order->shopName }}</strong><br>
                                            Address: {{ $order->address }}<br>
                                            City : {{ $order->city }}<br>
                                            Phone : {{ $order->phone }}
                                    </address>
                                </div>
                                <div class="pull-right m-t-30">
                                    <p><strong>Order Date: </strong> {{ $order->order_date }}</p>
                                    <p class="m-t-10"><strong>Order Status: </strong> <span class="badge @if($order->order_status=='pending') badge-danger @else badge-success @endif">{{ $order->order_status }}</span></p>
                                    <p class="m-t-10"><strong>Order ID: </strong> {{ $order->order_id }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="m-h-50"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table m-t-30">
                                        <thead>
                                            <tr><th>SL.</th>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Unit Cost</th>
                                            <th>Total</th>
                                        </tr></thead>
                                        <tbody>
                                            @php
                                                $sl=1;
                                            @endphp
                                            @foreach($contents as $content)
                                                <tr>
                                                <td>{{ $sl++ }}</td>
                                                <td>{{ $content->product_name }}</td>
                                                <td>{{ $content->quantity }}</td>
                                                <td>{{ $content->unitcost }}</td>
                                                <td>{{ $content->total }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="border-radius: 0px;margin-top: 100px;">
                            <div class="col-md-9">
                                <p class="text-left"><b>Payment By: <i style="color: green;">{{ $order->payment_status }}</i></b></p>
                                <p class="text-left"><b>Paid: <i style="color: green;">{{ $order->pay }}</i></b></p>
                                <p class="text-left"><b>Due: <i style="color: green;">{{ $order->due }}</i></b></p>
                            </div>
                            <div class="col-md-3">
                                <p class="text-right"><b>Sub-total: <i style="color: green;">{{ $order->sub_total }}</i></b></p>
                                <p class="text-right"><b>Discout: 0.0%</b></p>
                                <p class="text-right"><b>VAT: <i style="color: green;">{{ $order->vat }}</i></b></p>
                                <hr>
                                <h3 class="text-right"><b>Total: <i style="color: green;">{{ $order->total }}</i></b></h3>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="hidden-print">
                            <div class="pull-right">
                                <a href="{{ URL::to('/make-pdf/'.$order->order_id) }}" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                @if($order->order_status == 'pending')
                                    <a href="{{ URL::to('/aprove-pending-order/'.$order->order_id) }}" class="btn btn-primary waves-effect waves-light">Aprove</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div> <!-- container -->
        
        </div> <!-- content -->
        <footer class="footer text-right">
            2015 © Moltran.
        </footer>
    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->
@endsection
