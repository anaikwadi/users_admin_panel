{{-- @extends('layouts.adminpages') --}}
@extends('admin_layouts.layout') 


@section('content')

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
        <a class="btn btn-sm btn-primary" href="{{route('permission.create')}}">Add New Permission</a>

        <div class="row">
          <div class="col-xs-12">
            <div class="box">

                <div class="box-header">
                  <h3 class="box-title">{{ $title }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                            <th>Sr. No.</th>
                            <th>Name</th>
                            <th>Display Name</th>
                            <th>Description</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($permissions as $row)
                              <tr>
                                <td>{{ $inc }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->display_name }}</td>
                                <td>{{ $row->description }}</td>
                                <td>
                                  <div class="btn-group">
                                    <a class="btn btn-primary" href="{{ route('permission.edit', ['id' => $row->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                                    <a class="btn btn-danger" href="{{ route('permission.show', ['id' => $row->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
                                  </div>
                                </td>
                              </tr>
                            @php $inc++; @endphp
                            @endforeach
                        </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
          </div>
        </div>
    </section>


@endsection