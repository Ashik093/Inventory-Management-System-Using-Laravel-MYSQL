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
                        <li class="active">All Employees Attendence</li>
                    </ol>
                </div>
            </div>
            <!-- Start Widget -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">All Employee Attendence</h3>
                           
                        </div>
                        <div class="panel-body">
                           
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">

                                 
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Photo</th>
                                                <th>Attendence</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                            
                                                @foreach($view as $employee)
                                                <tr>
                                                    <td>{{ $employee->name }}</td>
                                                    
                                                    <td><img src="{{ URL::to($employee->photo) }}" style="width: 40px;height: 40px;" alt=""></td> 
                                                    
                                                    
                                                    <td>
                                                        <input disabled="" type="radio" name="attendence[{{ $employee->id }}]" value="Pressent" required="" <?php if($employee->attendence=='Pressent'){ echo "checked"; } ?> > Pressent
                                                        <input disabled="" type="radio" name="attendence[{{ $employee->id }}]" value="Absent" required="" <?php if($employee->attendence=='Absent'){ echo "checked"; } ?>> Absent
                                                    </td>
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