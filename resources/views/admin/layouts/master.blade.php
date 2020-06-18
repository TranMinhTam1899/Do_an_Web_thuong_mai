<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title')</title>
  <!-- Bootstrap -->
  <link href="{{ asset('assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{ asset('assets/admin/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <!-- NProgress -->
  <link href="{{ asset('assets/admin/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
  <!-- bootstrap-daterangepicker -->
  <link href="{{ asset('assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
  <!-- iCheck -->
  <link href="{{ asset('assets/admin/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- Datatables -->
    
    <link href="{{ asset('assets/admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
  <!-- Custom Theme Style -->
  <link href="{{ asset('assets/admin/build/css/custom.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/admin/production/css/setup.css') }}" rel="stylesheet">
  @yield('css')
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="{{route('admin.index')}}" class="site_title"><i class="fa fa-optin-monster" aria-hidden="true"></i> <span>Quản trị viên</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="{{ asset('assets/admin/images/img.jpg')}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>John Doe</h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
         @include('admin.layouts.menu')
          <!-- /sidebar menu -->

        </div>
      </div>

      <!-- top navigation -->
      @include('admin.layouts.header')
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        @yield('main_content')
      </div>
      <!-- /page content -->

      <!-- footer content -->
      @include('admin.layouts.footer')
      <!-- /footer content -->
    
</body>

</html>