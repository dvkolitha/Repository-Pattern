<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <title>Eco Solve(PVT)</title>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="{{URL::asset('css/all.css')}}" rel="stylesheet">
  </head>
  <body class="nav-md"  >
    <div class="container body">
      <div class="main_container">
        <!-- sidebar content-->
         @include('layouts.assets.sidebar.admin-sidebar')
        <!-- sidebar content-->
        <!-- top-navigation content -->
         @include('layouts.assets.top-navigation')
        <!-- top-navigation content -->
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
          @yield('page-content')
         
          </div>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
          <div class="pull-right">
          © 2018 Eco Solve(PVT).  <a href="http://www.ecosolve.lk/">All Rights Reserved.</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>


   <!-- jQuery -->
   <script src="/vendors/jquery/dist/jquery.min.js"></script>
   <!-- Bootstrap -->
   <script src="/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
   <!-- FastClick -->
   <script src="/vendors/fastclick/lib/fastclick.js"></script>
   <!-- NProgress -->
   <script src="/vendors/nprogress/nprogress.js"></script>
   <!-- iCheck -->
   <script src="/vendors/iCheck/icheck.min.js"></script>
   <!-- Datatables -->
   <script src="/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
   <script src="/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
   <script src="/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
   <script src="/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
   <script src="/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
   <script src="/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
   <script src="/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
   <script src="/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
   <script src="/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
   <script src="/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
   <script src=/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
   <script src="/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
   <script src="/vendors/jszip/dist/jszip.min.js"></script>
   <script src="/vendors/pdfmake/build/pdfmake.min.js"></script>
   <script src="/vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="/build/js/custom.min.js"></script>
    <!-- Custom Theme Scripts -->
    @yield('extra-script')
  </body>
</html>
