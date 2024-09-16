<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <title> @yield('title', 'الرئيسية') | {{ $global_settings['name'] ?? '' }}</title>
    <meta name="keywords" content="Dentist, Dental Clinic, Oral Health, Cosmetic Dentistry, Family Dentistry, Teeth Whitening, Dental Implants, Preventive Dentistry, Dental Care, Pediatric Dentistry, Root Canals, Dental Check-ups, Smile Makeover, Orthodontics, Periodontics, Dental Services, Emergency Dental Care, Dental Hygienist, Dental Consultation, Dentist in Cairo, طبيب أسنان, عيادة أسنان, صحة الفم, طب الأسنان التجميلي, طب الأسنان العائلي, تبييض الأسنان, زراعة الأسنان, طب الأسنان الوقائي, رعاية الأسنان, طب أسنان الأطفال, قنوات الجذور, فحوصات الأسنان, تجميل الابتسامة, تقويم الأسنان, أمراض اللثة, خدمات الأسنان, رعاية الأسنان الطارئة, أخصائي صحة الأسنان, استشارة أسنان, طبيب أسنان في القاهرة">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        $description = "أنا طبيب أسنان متخصص أقدم خدمات متنوعة في مجال طب الأسنان، بما في ذلك تبييض الأسنان، تنظيف الأسنان، حشو التجاويف، وتقويم الأسنان. من خلال موقعي هذا، يمكنك الاطلاع على خدماتي وحجز موعد بسهولة. أهدف دائمًا إلى تقديم أفضل رعاية صحية لأسنانك مع الالتزام بأحدث التقنيات الطبية. ستجد هنا أيضًا نصائح مهمة للحفاظ على صحة الفم والأسنان، بالإضافة إلى معلومات عن خبراتي ومؤهلاتي. أهلاً بكم، وأسعى دائمًا لجعل ابتسامتكم أكثر إشراقًا."
    ?>
    <meta name="description" content="{{ $$global_settings['description'] ?? $description }}">

    <!-- Favicon -->
    <link href="{{$global_settings['logo'] ? asset('storage/'.$global_settings['logo']) : asset('assets/frontend/img/logo/icon.png')}}" rel="shortcut icon" type="image">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('assets/frontend/lib/animate/animate.min.css')}}" rel="stylesheet">
    {{-- <link href="{{asset('assets/frontend/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" /> --}}

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('assets/frontend/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Additional Styles -->
    @stack('css')
    
    <!-- Main Stylesheet -->
    <link href="{{asset('assets/frontend/css/style.min.css')}}" rel="stylesheet">
    
</head>

<body>
    <!-- Loader Start -->
    <div id="loader-container" class="show">
        <span id="loader"></span>
    </div>
    <!-- Loader End -->

    <!-- Header Start -->
    @include('frontend.layouts.header')
    <!-- Header End -->
    
    <!-- Content Start -->
    @yield('content')
    <!-- Content End -->
    
    <!-- Footer Start -->
    @include('frontend.layouts.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <div class="btn btn-lg btn-main-color btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></div>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/frontend/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('assets/frontend/lib/easing/easing.min.js')}}"></script>
    {{-- <script src="{{asset('assets/frontend/lib/waypoints/waypoints.min.js')}}"></script> --}}
    {{-- <script src="{{asset('assets/frontend/lib/tempusdominus/js/moment.min.js')}}"></script> --}}
    {{-- <script src="{{asset('assets/frontend/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script> --}}

    <!-- Additional Scripts -->
    @stack('js')

    <!-- Main Javascript -->
    <script src="{{asset('assets/frontend/js/main.js')}}"></script>

</body>

</html>