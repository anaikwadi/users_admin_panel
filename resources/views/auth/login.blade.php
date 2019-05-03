@extends('admin_layouts.admin_login') 

@section('content')

<div class="login-box">
          <div class="login-logo">
            {{-- <a href="#"><b>Admin</b>LTE</a> --}}
            <img class="mb-4" src="{{ asset('img/laravel.png') }}" alt="" width="72" height="72">
          </div>
          <!-- /.login-logo -->
          <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>
        
            <form class="form-signin" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="sr-only">Email address</label>
                        <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email address" required autofocus>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                </div>
                
                <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="sr-only">Password</label>
                        <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>                        
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                </div>
                
                <div class="form-group">
                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" name="remember" {{ old( 'remember') ? 'checked' : '' }}> Remember me
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                    <a class="btn btn-link" href="{{ route('password.request') }}"> Forgot Your Password? </a>
                    <a class="btn btn-link" href="{{ route('register') }}"> Sign Up </a>
                    <p class="mt-5 mb-3 text-muted">©2019 Shiv-Swapn Development Studios</p>
                </div>

            </form>
        
          </div>
          <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->
        
@endsection