<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.layouts.includes.header_links')
    @yield('page_link_and_styles')
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light bg-lightblue">
    @include('admin.layouts.includes.header')
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 sidebar-light-lightblue">
    @include('admin.layouts.includes.sidebar')
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield("content")
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    @include('admin.layouts.includes.footer')
  </footer>
</div>

    @include('admin.layouts.includes.footer_links')
    @yield("page_link_and_javascripts")
</body>
</html>
