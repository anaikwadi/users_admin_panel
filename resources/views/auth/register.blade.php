@extends('admin_layouts.admin_login') 

@section('content')

<div class="register-box">
        <div class="register-logo">
                <img class="mb-4" src="{{ asset('img/laravel.png') }}" alt="" width="72" height="72">
        </div>
      
        <div class="register-box-body">
          <p class="login-box-msg">Register a new membership</p>
      
          {{-- <form action="../../index.html" method="post"> --}}
            <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
            
            <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Name" required autofocus>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password" class="form-control" name="password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group has-feedback">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    <input type="hidden" class="form-control" name="role" value=3 required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            
            <div class="row">
              <div class="col-xs-8">
                <div class="checkbox icheck">
                  <label>
                    <input type="checkbox" required> I agree to the terms.
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
          
          <a href="{{ route('login') }}" class="text-center">I Already Have a Membership</a>
          <p class="mt-5 mb-3 text-muted">©2019 Shiv-Swapn Development Studios</p>
        </div>
        <!-- /.form-box -->
      </div>
      <!-- /.register-box -->

      
@endsection