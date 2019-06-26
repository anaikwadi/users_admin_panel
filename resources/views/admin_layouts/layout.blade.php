
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminPanel | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link href="{{ asset('admin_thm/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" type='text/css' media='all' />
  <!-- Font Awesome -->
  <link href="{{ asset('admin_thm/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type='text/css' media='all' />
  <!-- Ionicons -->
  <link href="{{ asset('admin_thm/bower_components/Ionicons/css/ionicons.min.css') }}" rel="stylesheet" type='text/css' media='all' />
  <!-- jvectormap -->
  <link href="{{ asset('admin_thm/bower_components/jvectormap/jquery-jvectormap.css') }}" rel="stylesheet" type='text/css' media='all' />
  <!-- Theme style -->
  <link href="{{ asset('admin_thm/dist/css/AdminLTE.min.css') }}" rel="stylesheet" type='text/css' media='all' />
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link href="{{ asset('admin_thm/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" type='text/css' media='all' />
  <!-- DataTables -->
  <link href="{{ asset('admin_thm/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type='text/css' media='all' />
  
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

        @include('admin_layouts.header')

        @include('admin_layouts.navmenu')

        <!-- Content Wrapper. Contains page content -->
        <div class="wrapper" style="margin-left:12%;">
            @include('admin_layouts.flash-message.flash-message')
         </div>

        @yield('content')

        @include('admin_layouts.footer')


        @include('admin_layouts.sidebar')
        
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->
</body>

<!-- jQuery 3 -->
<script type='text/javascript' src="{{ asset('admin_thm/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script type='text/javascript' src="{{ asset('admin_thm/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- DataTables -->
<script type='text/javascript' src="{{ asset('admin_thm/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('admin_thm/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<!-- FastClick -->
<script type='text/javascript' src="{{ asset('admin_thm/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script type='text/javascript' src="{{ asset('admin_thm/dist/js/adminlte.min.js') }}"></script>
<!-- Sparkline -->
<script type='text/javascript' src="{{ asset('admin_thm/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap  -->
<script type='text/javascript' src="{{ asset('admin_thm/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('admin_thm/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- SlimScroll -->
<script type='text/javascript' src="{{ asset('admin_thm/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- ChartJS -->
<script type='text/javascript' src="{{ asset('admin_thm/bower_components/chart.js/Chart.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script type='text/javascript' src="{{ asset('admin_thm/dist/js/pages/dashboard2.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script type='text/javascript' src="{{ asset('admin_thm/dist/js/demo.js') }}"></script>





</html>
