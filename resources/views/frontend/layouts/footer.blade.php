    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light pt-5 pb-2">
     <div class="container pt-5">
         <div class="row  py-4">
             <div class="col-md-6 col-lg-3 mb-5">
                 <a href="{{route('home')}}"
                     class="navbar-brand p-0 d-flex flex-column flex-lg-row m-0 align-items-center mb-3">
                     <img src="{{asset('assets/frontend/img/logo/icon.png')}}" height="30px" style="margin-left: 10px;" alt="logo-icon" loading="lazy"><br>
                     @if ($global_settings['name'])
                        <p class="text-white header-title m-0">{{ $global_settings['name'] }}</p>
                     @endif
                 </a>
                 @if ($global_settings['short_description'])
                        <p>{{ $short_description }}</p>
                 @endif
             </div>
             <div class="col-md-6 col-lg-3 mb-5">
                 <h4 class="header-title text-white mb-3">روابط سريعة</h4>
                 <div class="d-flex flex-column justify-content-start">
                     <a class="text-light mb-2 link-hover-move" href="{{route('home')}}"><i
                             class="bi bi-arrow-left text-main-color ms-2"></i><span>الرئيسية</span></a>
                     <a class="text-light mb-2 link-hover-move" href="{{route('services')}}"><i
                             class="bi bi-arrow-left text-main-color ms-2"></i><span>الخدمات</span></a>
                     <a class="text-light mb-2 link-hover-move" href="{{route('media')}}"><i
                             class="bi bi-arrow-left text-main-color ms-2"></i><span>ميديا</span></a>
                     <a class="text-light link-hover-move" href="{{route('contact')}}"><i
                             class="bi bi-arrow-left text-main-color ms-2"></i><span>تواصل
                             معنا</span></a>
                     <a class="text-light mb-2 link-hover-move" href="{{route('sadaka')}}"><i
                             class="bi bi-arrow-left text-main-color ms-2"></i><span>صدقة جارية</span></a>
                 </div>
             </div>
             <div class="col-md-6 col-lg-3 mb-5">
                 <h4 class="text-white mb-3">الخدمات</h4>
                 <div class="d-flex flex-column justify-content-start">
                        @foreach ($global_services->take(6) as $service) {{-- global variable for views in the AppServiceProvider --}}
                                <a class="text-light mb-2 link-hover-move" href="{{route('services')}}"><i class="bi bi-arrow-left text-main-color ms-2"></i><span>{{$service->name}}</span></a>
                        @endforeach
                 </div>
             </div>
             <div class="col-md-6 col-lg-3 mb-5">
                <h4 class="text-white mb-3">تواصل معنا</h4>
                @if ($global_settings['address'])
                    <p class="mb-2"><i class="bi bi-geo-alt text-main-color ms-2"></i>{{ $global_settings['address'] }}</p>
                @endif
                @if ($global_settings['email'])
                    <p class="mb-2"><i class="bi bi-envelope-open text-main-color ms-2"></i>{{ $global_settings['email'] }}</p>
                @endif
                @if ($global_settings['phone'])
                    <p class="mb-2"><i class="bi bi-telephone text-main-color ms-2"></i><span dir="ltr">+2{{ $global_settings['phone'] }}</span></p>
                @endif
                @if ($global_settings['phone2'])
                    <p class="mb-2"><i class="bi bi-telephone text-main-color ms-2"></i><span dir="ltr">+2{{ $global_settings['phone2'] }}</span></p>
                @endif
                
                <div class="d-flex mt-3 flex-wrap">
                @foreach ($global_socials->toArray() as $key => $value) {{-- global variable for views in the AppsettingProvider --}}
                    @if ($value)
                    <a class="btn btn-lg btn-main-color btn-scale-hover btn-square rounded ms-2" target="__blank" href="{{ $value }}"><i class="fab fa-{{ $key }} fw-normal"></i></a>
                    @endif
                @endforeach
                </div>
             </div>
         </div>
         <div class="d-flex align-items-center justify-content-center g-0 gap-2" style="font-size: 8px;">
             <small class="mb-md-0">&copy; جميع الحقوق محفوظة </small>-
             <small class="mb-0">تم التصميم بواسطة HTML Codex</small>
         </div>
     </div>
 </div>
 <!-- Footer End -->