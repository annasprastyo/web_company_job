<!DOCTYPE html>
<html>
<head>
  @include('partials.head')
</head>
<body id="minovate" class="appWrapper">
<div id="wrap" class="animsition">

  <header class="main-header">
    @include('partials.header')
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  {{-- <aside class="main-sidebar"> --}}
    @include('partials.sidemenu')
  {{-- </aside> --}}

  <!-- Content Wrapper. Contains page content -->
    <!-- Main content -->
    <section class="content">
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  {{-- @include('partials.footer') --}}
</div>
<!-- ./wrapper -->
  @include('partials.script')

</body>
</html>
