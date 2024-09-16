@extends('frontend.layouts.app')
@section('title', 'ميديا')
@push('css')
<link href="{{asset('assets/frontend/lib/twentytwenty/twentytwenty.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
@endpush

@section('content')
    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 hero-header " style="background: linear-gradient(rgba(9, 30, 62, .85), rgba(9, 30, 62, .85)), url({{ isset($global_backgrounds['medias_background']) && $global_backgrounds['medias_background']->image !=  ''  ? asset('storage/'.$global_backgrounds['medias_background']->image) : asset('assets/frontend/img/carousel-1.jpg') }}) center center no-repeat;background-size: cover;">
        <div class="row py-3">
            <div class="col-12 text-center">
                <h1 class="display-3 text-white animated zoomIn">تجربة تحول شامل</h1>
                <a href="" class="h4 text-white">الرئيسية</a>
                <i class="fa fa-tooth text-white px-2"></i>
                <a href="" class="h4 text-white">ميديا</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    
    
    <!-- Media Section Start -->
    <section class="container py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="row mb-5">
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="section-title mb-5">
                    <h5 class="position-relative d-inline-block text-uppercase">ميديا</h5>
                    <h1 class="display-5 mb-0">تجربة تحول كامل</h1>
                </div>
                <p class="mb-5">اكتشف كيف يمكن لعلاجنا أن يحدث فرقاً ملحوظاً في حياتك. إليك صوراً توضح التغيير الذي
                    حققناه من خلال خبرتنا والتقنيات الحديثة.</p>
                <p class="mb-5">اطلع على نتائج علاجنا التي تتحدث عن نفسها. هذه الصور توضح كيف أن العناية الدقيقة
                    والتقنيات المتطورة يمكن أن تحول الابتسامة بشكل كبير.</p>
                </a>
            </div>
            <div class="col-md-6 col-lg-8 mb-4">
                <div class="owl-carousel media-carousel wow zoomIn" data-wow-delay="0.6s">
                    @foreach ($media->where('status', 0) as $item)
                        <div class="item media-item text-center text-white">
                            <div class="before">
                                <img src="{{asset('storage/'.$item->image_before)}}" style="height: 250px;" alt="k"  loading="lazy"/>
                            </div>
                            <div class="after">
                                <img src="{{asset('storage/'.$item->image_after)}}" style="height: 250px;" alt="k"  loading="lazy"/>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($media->where('status', 1) as $item)
                <div class="col-lg-6 wow zoomIn" data-wow-delay="0.3s" style="min-height: 400px;">
                    <div class="twentytwenty-container position-relative h-100 rounded overflow-hidden">
                        <img class="position-absolute w-100 h-100" src="{{asset('storage/'.$item->image_before)}}"
                            style="object-fit: cover;" loading="lazy">
                        <img class="position-absolute w-100 h-100" src="{{asset('storage/'.$item->image_after)}}"
                            style="object-fit: cover;" loading="lazy">
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- Media Section End -->
@endsection

@push('js')
    <script src="{{asset('assets/frontend/lib/twentytwenty/jquery.event.move.js')}}"></script>
    <script src="{{asset('assets/frontend/lib/twentytwenty/jquery.twentytwenty.js')}}"></script>
    <script src="{{asset('assets/frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>
@endpush