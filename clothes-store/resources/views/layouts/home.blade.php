<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @yield('title')

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset("adminlte/plugins/fontawesome-free/css/all.min.css") }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset("adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css") }}">
  <link rel="stylesheet" href="{{ asset("adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css") }}">
  <link rel="stylesheet" href="{{ asset("adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css") }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("adminlte/dist/css/adminlte.min.css") }}">
  <!-- Main css -->
  <link rel="stylesheet" href="{{ asset("css/main.css") }}">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  @yield('css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  @include("partials.navbar")
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include("partials.sidebar")

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              @yield('title-content')
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    @yield("content")
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!--Footer-->
  @include("partials.footer")

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset("adminlte/plugins/jquery/jquery.min.js") }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset("adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset("adminlte/plugins/datatables/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset("adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js") }}"></script>
<script src="{{ asset("adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js") }}"></script>
<script src="{{ asset("adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js") }}"></script>
<script src="{{ asset("adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js") }}"></script>
<script src="{{ asset("adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js") }}"></script>
<script src="{{ asset("adminlte/plugins/jszip/jszip.min.js") }}"></script>
<script src="{{ asset("adminlte/plugins/pdfmake/pdfmake.min.js") }}"></script>
<script src="{{ asset("adminlte/plugins/pdfmake/vfs_fonts.js") }}"></script>
<script src="{{ asset("adminlte/plugins/datatables-buttons/js/buttons.html5.min.js") }}"></script>
<script src="{{ asset("adminlte/plugins/datatables-buttons/js/buttons.print.min.js") }}"></script>
<script src="{{ asset("adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset("adminlte/dist/js/adminlte.min.js") }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset("adminlte/dist/js/demo.js") }}"></script>
<!--Delete-->
<script src="{{ asset('lib/sweetalert2/sweetalert2@11.js') }}"></script>
<!--Main js-->
<script src="{{ asset('js/main.js') }}"></script>
<!--Custome form js-->
<script src="{{ asset('js/home.js') }}"></script>
<!--Custome js-->
@yield('js')
<!-- Page specific script -->

</body>
</html>
