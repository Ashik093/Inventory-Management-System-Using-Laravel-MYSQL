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
                                            <strong>Name : {{ $customer->name }}</strong><br>
                                            <strong>Shop Name : {{ $customer->shopName }}</strong><br>
                                            Address: {{ $customer->address }}<br>
                                            City : {{ $customer->city }}<br>
                                            Phone : {{ $customer->phone }}
                                    </address>
                                </div>
                                <div class="pull-right m-t-30">
                                    <p><strong>Order Date: </strong> {{ date('D-M-Y') }}</p>
                                    <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p>
                                    <p class="m-t-10"><strong>Order ID: </strong> 1</p>
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
                                                <td>{{ $content->name }}</td>
                                                <td>{{ $content->qty }}</td>
                                                <td>{{ $content->price }}</td>
                                                <td>{{ $content->price*$content->qty }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="border-radius: 0px;">
                            <div class="col-md-3 col-md-offset-9">
                                <p class="text-right"><b>Sub-total:</b> {{ Cart::subtotal() }}</p>
                                <p class="text-right">Discout: 0.0%</p>
                                <p class="text-right">VAT: {{ Cart::tax() }}</p>
                                <hr>
                                <h3 class="text-right">Total: {{ Cart::total() }}</h3>
                            </div>
                        </div>
                        <hr>
                        <div class="hidden-print">
                            <div class="pull-right">
                                <a href="#" onclick="window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                <a href="#" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Submit</a>
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


<!--Modal-->
<form action="{{ url('final-invoice') }}" method="POST" >
    @csrf
    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> ×</button>
                    <h4 class="modal-title text-info">Invoice of {{ $customer->name }} <span class="pull-right"> Total: {{ Cart::total() }}</span></h4>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-4" class="control-label">Payment </label>
                                <select name="payment_status" class="form-control">
                                    <option selected="" disabled="">--select--</option>
                                    <option value="Handcash">HandCash</option>
                                    <option value="Cheque">Cheque</option>
                                    <option value="Due">Due</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-5" class="control-label">Pay</label>
                                <input type="text" class="form-control"  name="pay" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-6" class="control-label">Due</label>
                                <input type="text" class="form-control"  name="due">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="customer_id"     value="{{ $customer->id }}">
                    <input type="hidden" name="order_date"      value="{{ date('m/d/Y') }}">
                    <input type="hidden" name="order_status"    value="pending">
                    <input type="hidden" name="total_products"  value="{{ Cart::count() }}">
                    <input type="hidden" name="sub_total"       value="{{ Cart::subtotal() }}">
                    <input type="hidden" name="vat"             value="{{ Cart::tax() }}">
                    <input type="hidden" name="total"           value="{{ Cart::total() }}">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
                </div>
            </div>
        </div>
        </div><!-- /.modal -->
    </form>
@endsection
