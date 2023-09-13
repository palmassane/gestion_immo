<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('page-title', 'Espace Admin | Dashboard')</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href=" {{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/assets/core-admin/styles/app.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  @yield('header-scripts')
</head>
<body class="hold-transition sidebar-mini layout-fixed" style="height: auto;padding-top: 70px;">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  @include('layouts.partials.topnav')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('layouts.partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1>
                      @yield('page-header-title')
                  </h1>
              </div>
              <div class="col-sm-6">
                {{ Breadcrumbs::render() }}
              </div>
          </div>
      </div>
    </div>

    @include('layouts.partials.message')
    <div class="content">
        {{$slot}}
    </div>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('layouts.partials.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/core-admin/scripts/app.js')}}"></script>
    <script src="/js/app.js"></script>
    @yield('footer-scripts')
</body>
</html>
