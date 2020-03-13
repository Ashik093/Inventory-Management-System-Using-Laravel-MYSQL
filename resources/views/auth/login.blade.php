@extends('layouts.app')

@section('content')
 <div class="wrapper-page">
        <div class="panel panel-color panel-primary panel-pages">
            <div class="panel-heading bg-img"> 
                <div class="bg-overlay"></div>
                <h3 class="text-center m-t-10 text-white"> Sign In to <strong>Inventory Management</strong> </h3>
            </div> 


            <div class="panel-body">
            <form class="form-horizontal m-t-20" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror input-lg " value="{{ old('email') }}" required placeholder="Email Address">
                        @error('email')
                            <span class="invalid-feedback" style="color: red;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="password" class="form-control @error('password') is-invalid @enderror input-lg" type="password" name="password" required placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" style="color: red;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group ">
                    <div class="col-xs-12">
                        <div class="checkbox checkbox-primary">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">
                                Remember me
                            </label>
                        </div>
                        
                    </div>
                </div>
                
                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>

                <div class="form-group m-t-30">
                    <div class="col-sm-7">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                        @endif
                    </div>
                </div>
            </form> 
            </div>                                 
            
        </div>
    </div>
@endsection
