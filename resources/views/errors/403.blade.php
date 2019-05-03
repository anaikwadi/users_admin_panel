@extends('admin_layouts.admin_login') 

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        403 Error Page
        </h1>
        <ol class="breadcrumb">
        <li><a href="{{ URL('/dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">403 error</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="error-page">
        <h2 class="headline text-yellow"> 403</h2>

        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Oops! Not Authorized.</h3>

            <p>
            We could not find the page you were looking for.
            Meanwhile, you may <a href="{{ URL('/dashboard') }}">return.
        </div>
        <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection