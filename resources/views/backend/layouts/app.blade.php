<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <title> @yield('title', 'لوحة التحكم') | {{ $global_settings['name'] ?? '' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{$global_settings['logo'] ? asset('storage/'.$global_settings['logo']) : asset('assets/frontend/img/logo/icon.png')}}" type="image" rel="shortcut icon">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('assets/backend/css/styles.min.css')}}" />

    <!-- Additional Styles -->
    @stack('css')
    @livewireStyles
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
  data-sidebar-position="fixed" data-header-position="fixed">
  <!-- Sidebar Start -->
  @include('backend.layouts.sidebar')
  <!--  Sidebar End -->
  <!--  Main wrapper -->
  <div class="body-wrapper">
    <!--  Header Start -->
    @include('backend.layouts.navbar')
    <!--  Header End -->
    <div class="container-fluid">
      @yield('content')
    </div>
  </div>
</div>
<script src="{{asset('assets/backend/libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('assets/backend/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/backend/js/sidebarmenu.js')}}"></script>
<script src="{{asset('assets/backend/js/app.min.js')}}"></script>
{{-- <script src="{{asset('assets/backend/libs/apexcharts/dist/apexcharts.min.js')}}"></script> --}}
<script src="{{asset('assets/backend/libs/simplebar/dist/simplebar.js')}}"></script>
<script src="{{asset('assets/backend/js/dashboard.js')}}"></script>

@stack('js')
@livewireScripts
</body>

</html>