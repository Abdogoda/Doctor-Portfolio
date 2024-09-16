@extends('frontend.layouts.app')
@section('title', 'الخدمات')
@push('css')
@endpush

@section('content')
    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 hero-header mb-5" style="background: linear-gradient(rgba(9, 30, 62, .85), rgba(9, 30, 62, .85)), url({{ isset($global_backgrounds['services_background']->image) && $global_backgrounds['services_background'] !=  ''  ? asset('storage/'.$global_backgrounds['services_background']->image) : asset('assets/frontend/img/carousel-1.jpg') }}) center center no-repeat;background-size: cover;">
        <div class="row py-3">
            <div class="col-12 text-center">
                <h1 class="display-3 text-white animated zoomIn">استكشف خدماتنا</h1>
                <a href="" class="h4 text-white">الرئيسية</a>
                <i class="fa fa-tooth text-white px-2"></i>
                <a href="" class="h4 text-white">الخدمات</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- Service Section Start -->
    <section class="container py-3 wow fadeInUp" data-wow-delay="0.1s">
        <div class="row mb-5">
            @forelse ($global_services as $service) {{-- global variable for views in the AppServiceProvider --}}
                <div class="col-md-6 col-lg-4 mb-5 service-item wow zoomIn" data-wow-delay="0.3s">
                    <div class="rounded-top overflow-hidden">
                        <img class="img-fluid" src="{{asset('storage/'.$service->image)}}" alt="service-{{$service->id}}-image" loading="lazy">
                    </div>
                    <div class="service-image-tooth"></div>
                    <div class="position-relative pt-5 bg-light rounded-bottom text-center p-4">
                        <h4 class="m-0">{{$service->name}}</h4>
                        <p class="mt-2 text-muted">{{$service->description}}</p>
                    </div>
                </div>
            @empty
                <div class="col-12 card wow zoomIn p-3 text-center text-muted">لا يوجد خدمات متاحة</div>
            @endforelse
        </div>
    </section>
    <!-- Service Section End -->
@endsection

@push('js')
@endpush