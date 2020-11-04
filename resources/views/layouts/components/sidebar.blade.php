<aside class="main-sidebar elevation-4 {{ config('adminlte.classes_sidebar') }}">
  <!-- Brand Logo -->
  <a href="{{ url('/') }}" class="brand-link {{ config('adminlte.skin_logo') }}">
    <img src="{{ config('adminlte.logo_img') }}" @yield('logo_img', config('adminlte.php')) alt="Adminlte3" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">{{ config('adminlte.php.logo') }}</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">


      </ul>
    </nav>

    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>


