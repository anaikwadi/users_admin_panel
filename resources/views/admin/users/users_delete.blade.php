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
                    
                        <div class="clearfix"></div>
                        <p>Are you sure you want to delete <strong>{{$user->name}}</strong></p>
                    
                        <form method="POST" action="{{ route('users.destroy', ['id' => $user->id]) }}">
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-danger">Yes I'm sure. Delete</button>
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