<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <title> @yield('title', 'الرئيسية') | دكتور محمد الخولي</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{asset('assets/frontend/img/logo/icon.png')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('assets/frontend/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('assets/frontend/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Additional Styles -->
    @stack('css')
    
    <!-- Main Stylesheet -->
    <link href="{{asset('assets/frontend/css/style.css')}}" rel="stylesheet">
    
</head>

<body>
    <!-- Loader Start -->
    <div id="loader-container" class="show">
        <span id="loader"></span>
    </div>
    <!-- Loader End -->
    
    <!-- Content Start -->
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xxl-3">
                <div class="card mb-0 shadow rounded p-2 pb-3">
                    <div class="card-body">
                        <a href="{{route('home')}}" class="text-nowrap logo-img text-center d-block py-3 w-100">
                            <img src="{{asset('assets/frontend/img/logo/icon.png')}}" width="180" alt="logo-image">
                        </a>
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/frontend/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('assets/frontend/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('assets/frontend/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/frontend/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('assets/frontend/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Additional Scripts -->
    @stack('js')

    <!-- Main Javascript -->
    <script src="{{asset('assets/frontend/js/main.js')}}"></script>

</body>

</html>