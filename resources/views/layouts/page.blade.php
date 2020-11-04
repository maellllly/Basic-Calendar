@extends('layouts.master')

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('body')

<div class="wrapper" style="background-color: #f4f6f9">
  <!-- Navbar -->
    @include('layouts.components.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    @include('layouts.components.sidebar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

            <h1 class="m-0 text-dark">@yield('content_header')</h1>
          </div><!-- /.col -->
          
{{--           <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Compose</li>
            </ol>
          </div> --}}
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <div class="content">
        <div class="container-fluid">
          @yield('content')
        </div>
      </div>

    </div>

</div>

@stop

@section('adminlte_js')
	@stack('css')
	@yield('js')
@stop