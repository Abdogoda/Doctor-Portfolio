<!-- Topbar Start -->
<div class="container-fluid bg-light pe-5 ps-0 d-none d-lg-block">
 <div class="row gx-0">
     <div class="col-md-6 text-center text-lg-end mb-2 mb-lg-0">
         <div class="d-inline-flex align-items-center">
             <small class="py-2"><i class="far fa-clock text-second-color ms-2"></i>نعمل علي مدار الساعة لضمان راحة عملائنا</small>
         </div>
     </div>
     <div class="col-md-6 text-center text-lg-start">
         <div class="position-relative d-inline-flex bg-main-color text-white ps-5">
             @if ($global_settings['email'])
                <div class="bg-second-color px-4 d-flex align-items-center text-center">
                    <i class="fa fa-envelope-open"></i>
                </div>
                <div class="ms-3 pe-3 border-end py-2">
                    <p class="m-0">{{ $global_settings['email'] }}</p>
                </div>
             @endif
             @if ($global_settings['phone'])
                <div class="bg-second-color px-4 d-flex align-items-center text-center">
                    <i class="fa fa-phone-alt"></i>
                </div>
                <div class="ms-3 pe-3 border-end py-2">
                    <p class="m-0" dir="ltr">+2{{ $global_settings['phone'] }}</p>
                </div>
             @endif
         </div>
     </div>
 </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-1 px-l py-2 py-lg-0">
 <div class="container">
    <a href="{{route('home')}}" class="navbar-brand p-0 d-flex flex-column flex-lg-row m-0 align-items-center">
        <img src="{{$global_settings['logo'] ? asset('storage/'.$global_settings['logo']) : asset('assets/frontend/img/logo/icon.png')}}" height="50px" style="margin-left: 10px;" alt="logo" loading="lazy">
        @if ($global_settings['name'])
            <p class="text-main-color header-title m-0">{{ $global_settings['name'] }}</p>
        @endif
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav me-auto py-0">
            <a href="{{route('home')}}" class="nav-item nav-link {{Route::currentRouteName() == 'home' ? 'active' : ''}}">الرئيسية</a>
            <a href="{{route('services')}}" class="nav-item nav-link {{Route::currentRouteName() == 'services' ? 'active' : ''}}">الخدمات</a>
            <a href="{{route('media')}}" class="nav-item nav-link {{Route::currentRouteName() == 'media' ? 'active' : ''}}">ميديا</a>
            <a href="{{route('contact')}}" class="nav-item nav-link {{Route::currentRouteName() == 'contact' ? 'active' : ''}}">تواصل معنا</a>
            <a href="{{route('sadaka')}}" class="nav-item nav-link {{Route::currentRouteName() == 'sadaka' ? 'active' : ''}}">صدقة جارية</a>
            @auth
                <a href="{{route('admin.dashboard')}}" target="__blank" class="nav-item nav-link" title="لوحة التحكم"><i class="bi bi-gear"></i></a>
            @else
                <a href="{{route('login')}}" class="nav-item nav-link" title="تسجيل الدخول"><i class="bi bi-person"></i></a>
            @endauth
        </div>
        @auth
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-main-color py-2 px-4 ms-3">تسجيل الخروج</button>
            </form>
        @else
            <a href="{{ route('home') }}#appointment" class="btn btn-main-color py-2 px-4 ms-3">إحجز موعد الآن</a>
        @endauth
    </div>
 </div>
</nav>
<!-- Navbar End -->