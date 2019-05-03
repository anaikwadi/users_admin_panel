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
            <a class="btn btn-sm btn-primary" href="{{route('permission.index')}}">Back</a>

        <div class="row">
          <div class="col-xs-12">
            <div class="box">

                <div class="box-header">
                  <h3 class="box-title">{{ $title }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    
                        <form method="post" action="{{ route('permission.update', ['id' => $permission->id]) }}" data-parsley-validate class="form-horizontal form-label-left">

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$permission->name}}" id="name" name="name" class="form-control col-md-7 col-xs-12"> @if ($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                    
                            <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }} row">
                                <label for="display_name" class="col-sm-2 col-form-label">Display Name</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$permission->display_name}}" id="display_name" name="display_name" class="form-control col-md-7 col-xs-12"> @if ($errors->has('display_name'))
                                    <span class="help-block">{{ $errors->first('display_name') }}</span>
                                    @endif
                                </div>
                            </div>
                    
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }} row">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$permission->description}}" id="description" name="description" class="form-control col-md-7 col-xs-12"> @if ($errors->has('description'))
                                    <span class="help-block">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                            </div>
                    
                            <div class="ln_solid"></div>
                    
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                    <input name="_method" type="hidden" value="PUT">
                                    <button type="submit" class="btn btn-success">Save Permission Changes</button>
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