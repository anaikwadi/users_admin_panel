@extends('admin_layouts.admin_login') 

@section('content')


<div class="lockscreen-wrapper">
        <div class="lockscreen-logo">
          <a href="../../index2.html"><b>Reset</b>Password</a>
        </div>
      
        <!-- START LOCK SCREEN ITEM -->
        <div class="lockscreen-item">
          <!-- lockscreen image -->
          <div class="lockscreen-image">
            {{-- <img src="../../dist/img/user1-128x128.jpg" alt="User Image"> --}}
            <img src="{{ asset('img/laravel.png') }}" alt="" width="128" height="128">

          </div>
          <!-- /.lockscreen-image -->

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

      
          <!-- lockscreen credentials (contains the form) -->
          <form class="lockscreen-credentials" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}
            <div class="input-group">
              <input id="email" type="email" class="form-control" placeholder="Enter Email ID" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                
              <div class="input-group-btn">
                <button type="submit"  class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
              </div>
            </div>
          </form>
          <!-- /.lockscreen credentials -->
      
        </div>
        <!-- /.lockscreen-item -->
        <div class="help-block text-center">
          Enter your password to retrieve your session
        </div>
        <div class="text-center">
          <a href="{{ route('login') }}">Or sign in as a different user</a>
        </div>
            <div class="lockscreen-footer text-center">
                    ©2019 Shiv-Swapn Development Studios<br> All rights reserved
            </div>
      </div>
      <!-- /.center -->
      
@endsection