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
                        <li class="active">All Attendence</li>
                    </ol>
                </div>
            </div>
            <!-- Start Widget -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">All Attendence</h3>
                            <div class="btn-group pull-right">
                                <a href="{{ route('take.attendence') }}" class="btn btn-sm btn-primary">Take New</a>
                                <a href="{{ route('all.attendence') }}" class="btn btn-sm btn-success">All Attendence</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php $sl=0; ?>
                                            @foreach($all as $attendence)
                                            <tr>
                                                <td>{{ ++$sl }}</td>
                                                <td>{{ str_replace('_', '/', $attendence->edit_date) }}</td>
                                                <td><div class="btn-group">
                                                    <a class="btn btn-group btn-sm btn-primary" href="{{ URL::to('edit-attendence/'.$attendence->edit_date) }}">Edit</a>
                                                    <a class="btn btn-group btn-sm btn-info" href="{{ URL::to('view-attendence/'.$attendence->edit_date) }}">View</a>
                                                </div></td>
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