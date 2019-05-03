
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminPanel | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link href="{{ asset('admin_thm/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" type='text/css' media='all' />
        <!-- Font Awesome -->
        <link href="{{ asset('admin_thm/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type='text/css' media='all' />
        <!-- Ionicons -->
        <link href="{{ asset('admin_thm/bower_components/Ionicons/css/ionicons.min.css') }}" rel="stylesheet" type='text/css' media='all' />
        <!-- Theme style -->
        <link href="{{ asset('admin_thm/dist/css/AdminLTE.min.css') }}" rel="stylesheet" type='text/css' media='all' />
        <!-- iCheck -->
        <link href="{{ asset('admin_thm/plugins/iCheck/square/blue.css') }}" rel="stylesheet" type='text/css' media='all' />
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>


<body class="hold-transition login-page">

        @yield('content')

</body>


<!-- jQuery 3 -->
<script type='text/javascript' src="{{ asset('admin_thm/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script type='text/javascript' src="{{ asset('admin_thm/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- iCheck -->
<script type='text/javascript' src="{{ asset('admin_thm/plugins/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</html>
