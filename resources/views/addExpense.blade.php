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
                        <li class="active">Add Expense</li>
                    </ol>
                </div>
            </div>

            <!-- Start Widget -->
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Add Expense<div class="btn-group pull-right">
                                <a href="" class="btn btn-sm btn-primary">This Month Expense</a>
                                <a href="{{ route('today.expense') }}" class="btn btn-sm btn-success">Today Expense</a>
                            </div></h3>
                            
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="panel-body">
                            <form action="{{ url('insert-expense') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Expense Detail</label>
                                    <textarea name="details" class="form-control" id="" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Amount</label>
                                    <input type="text" class="form-control" name="amount" required placeholder="Enter Amount">
                                    <input type="hidden" name="year" value="{{ date('Y') }}">
                                    <input type="hidden" name="month" value="{{ date('m/Y') }}">
                                    <input type="hidden" name="date" value="{{ date('d/m/Y') }}">
                                </div>
                                

                                <button type="submit" class="btn btn-purple waves-effect waves-light">Add</button>
                            </form>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->
                </div> <!-- end row -->

        </div> <!-- container -->
                   
    </div> <!-- content -->
</div>
@endsection
