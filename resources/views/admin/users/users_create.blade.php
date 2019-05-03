{{-- @extends('layouts.adminpages') --}}
@extends('admin_layouts.layout') 


@section('content')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
            {{ $title }}
          {{-- <small>advanced tables</small> --}}
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ URL('/dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Users</a></li>
          <li class="active">{{ $title }}</li>
        </ol>
      </section>

    <!-- Main content -->
    <section class="content">
            <a class="btn btn-sm btn-primary" href="{{route('users.index')}}">Back</a>

        <div class="row">
          <div class="col-xs-12">
            <div class="box">

                <div class="box-header">
                  <h3 class="box-title">{{ $title }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                        <form method="post" action="{{ route('users.store') }}" data-parsley-validate class="form-horizontal form-label-left">

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="{{ Request::old('name') ?: '' }}" id="name" name="name" class="form-control col-md-7 col-xs-12"> @if ($errors->has('name'))
                                        <span class="help-block">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                        
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="{{ Request::old('email') ?: '' }}" id="email" name="email" class="form-control col-md-7 col-xs-12"> @if ($errors->has('email'))
                                        <span class="help-block">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                        
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row">
                                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" value="{{ Request::old('password') ?: '' }}" id="password" name="password" class="form-control col-md-7 col-xs-12"> @if ($errors->has('password'))
                                        <span class="help-block">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                        
                                <div class="form-group{{ $errors->has('confirm_password') ? ' has-error' : '' }} row">
                                    <label for="confirm_password" class="col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" value="{{ Request::old('confirm_password') ?: '' }}" id="confirm_password" name="confirm_password"
                                            class="form-control col-md-7 col-xs-12"> @if ($errors->has('confirm_password'))
                                        <span class="help-block">{{ $errors->first('confirm_password') }}</span>
                                        @endif
                                    </div>
                                </div>
                        
                                <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }} row">
                                    <label class="col-sm-2 col-form-label" for="category_id">Role
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" id="role_id" name="role_id">
                                            @if(count($roles)) @foreach($roles as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach @endif
                                        </select>
                                        @if ($errors->has('role_id'))
                                        <span class="help-block">{{ $errors->first('role_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                        
                                <div class="ln_solid"></div>
                        
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                                        <button type="submit" class="btn btn-success">Create User</button>
                                    </div>
                                </div>
                            </form>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
          </div>
        </div>
    </section>

  </div>

@endsection
