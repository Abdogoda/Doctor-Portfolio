@extends('frontend.layouts.app')
@section('title', 'الرئيسية')
@push('css')
    <link href="{{asset('assets/frontend/lib/twentytwenty/twentytwenty.css')}}" rel="stylesheet" />
@endpush

@section('content')
    
    <!-- Hero Section Start -->
    <section class="container-fluid p-0">
        <div class="hero">
            <img class="w-100" src="{{isset($global_backgrounds['main_background']) && $global_backgrounds['main_background']->image != '' ? asset('storage/'.$global_backgrounds['main_background']->image) : asset('assets/frontend/img/carousel-1.jpg')}}" alt="Image" loading="lazy">
            <div class="caption d-flex flex-column align-items-center justify-content-center">
                <div class="p-3" style="max-width: 900px; margin: auto;">
                    <h5 class="text-white text-uppercase mb-3 animated slideInDown">حافظ علي صحة أسنانك</h5>
                    <h1 class="display-1 text-white mb-md-4 animated zoomIn">احصل علي افضل علاج لأسنانك</h1>
                    <a href="{{route('services')}}" class="btn btn-main-color py-md-3 px-md-5 ms-3 animated slideInLeft">الخدمات</a>
                    <a href="{{route('contact')}}" class="btn btn-second-color py-md-3 px-md-5 animated slideInRight">تواصل معنا</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->


    <!-- Banner Section Start -->
    <section class="container banner mb-5 d-none d-md-block">
        <div class="row gx-0">
            <div class="col-lg-4 mb-5 wow zoomIn" data-wow-delay="0.1s">
                <div class="bg-main-color d-flex flex-column p-5" style="height: 300px;">
                    <h3 class="text-white mb-3">ساعات العمل</h3>
                    @foreach ($global_schedules as $schedule)
                        <div class="d-flex justify-content-between text-white mb-3">
                            <h6 class="text-white mb-0">{{$schedule->days}}</h6>
                            <p class="mb-0">
                                @if ($schedule->status)
                                    {{ App\Helpers\TimeHelper::formatTimeWithArabic($schedule->start) }} - {{ App\Helpers\TimeHelper::formatTimeWithArabic($schedule->end) }}
                                @else
                                    مغلق
                                @endif
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 mb-5 wow zoomIn" data-wow-delay="0.3s">
                <div class="bg-dark d-flex flex-column p-5" style="height: 300px;">
                    <h3 class="text-white mb-3">إحجز موعد الآن</h3>
                    <div class="date mb-3" id="date" data-target-input="nearest">
                        <input type="text" class="form-control bg-light border-0 datetimepicker-input"
                            placeholder="Appointment Date" data-target="#date" data-toggle="datetimepicker"
                            style="height: 40px;">
                    </div>
                    <select class="form-select bg-light border-0 mb-3" style="height: 40px;">
                        <option selected>أختر خدمة</option>
                        <option value="1">Service 1</option>
                        <option value="2">Service 2</option>
                        <option value="3">Service 3</option>
                    </select>
                    <a class="btn btn-light" href="{{ route('contact') }}">إحجز موعد الآن</a>
                </div>
            </div>
            <div class="col-lg-4 mb-5 wow zoomIn" data-wow-delay="0.6s">
                <div class="bg-second-color d-flex flex-column p-5" style="height: 300px;">
                    <h3 class="text-white mb-3">تواصل معنا</h3>
                    <p class="text-white">تواصل معنا الان لتحصل علي أفضل رعاية ممكنة</p>
                    <h2 class="text-white mb-0" dir="ltr">+2{{ isset($global_settings) ? $global_settings['phone'] : '' }}</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->


    <!-- About Section Start -->
    <section class="container py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="section-title center-title mb-5">
            <h5 class="position-relative d-inline-block fw-bold text-uppercase wow zoomIn">عن الدكتور</h5>
        </div>
        <div class="row ">
            <div class="col-lg-7 mb-5">
                <h1 class="display-5 mb-5">{{ $global_settings['name'] ?? '' }}</h1>
                <h4 class="text-body fst-italic mb-5">{{ $global_about['education']->text ?? ''}}</h4>
                @if (isset($global_about['paragraphs']))
                    @foreach ($global_about['paragraphs'] as $item)
                        <p class="mb-5">{{ $item->text }}</p>
                    @endforeach
                @endif

                <div class="row">
                    @if (isset($global_about['features']))
                        @foreach ($global_about['features'] as $item)
                            <div class="col-sm-6 mb-3 wow zoomIn" data-wow-delay="0.3s">
                                <h5 class="mb-3"><i class="fa fa-check-circle text-main-color ms-3"></i>{{ $item->text }}</h5>
                            </div>
                        @endforeach
                    @endif
                </div>
                <a href="#appointment" class="btn btn-main-color py-3 px-5 mt-4 wow zoomIn" data-wow-delay="0.6s">إحجز
                    موعد الآن</a>
            </div>
            @if (isset($global_about['image']))
                <div class="col-lg-5 mb-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.5s"
                            src="{{asset('storage/'.$global_about['image']->text)}}" style="object-fit: cover;" loading="lazy">
                    </div>
                </div>
            @endif
        </div>
    </section>
    <!-- About Section End -->


    <!-- Service Section Start -->
    <section class="" style="background-color: #F7F7F7;">
        <div class="container py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="section-title center-title mb-5">
                <h5 class="position-relative d-inline-block fw-bold text-uppercase wow zoomIn">الخدمات</h5>
            </div>
            <div class="row  mb-5">
                @foreach ($global_services->take(6) as $service) {{-- global variable for views in the AppServiceProvider --}}
                    <div class="col-md-6 col-lg-4 mb-5 mb-5 service-item wow zoomIn" data-wow-delay="0.3s">
                        <div class="rounded-top overflow-hidden">
                            <img class="img-fluid" src="{{asset('storage/'.$service->image)}}" alt="service-{{$service->id}}-image" loading="lazy">
                        </div>
                        <div class="service-image-tooth"></div>
                        <div class="position-relative pt-5 bg-light rounded-bottom text-center p-4">
                            <h5 class="m-0">{{$service->name}}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mb-5 width text-center">
                <a href="{{route('services')}}" class="btn btn-main-color px-5 py-2 wow zoomInUp">المزيد <i class="far fa-arrow-alt-circle-left me-2"></i></a>
            </div>
        </div>
    </section>
    <!-- Service Section End -->


    <!-- Media Section Start -->
    <section class="container py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="row">
            <div class="col-lg-5 mb-5">
                <div class="section-title mb-5">
                    <h5 class="position-relative d-inline-block text-uppercase">ميديا</h5>
                    <h1 class="display-5 mb-0">تحولات مذهلة بفضل الرعاية المتخصصة</h1>
                </div>
                <p class="mb-5">اكتشف كيف يمكن لعلاجنا أن يحدث فرقاً ملحوظاً في حياتك. إليك صوراً توضح التغيير الذي
                    حققناه من خلال خبرتنا والتقنيات الحديثة.</p>
                <p class="mb-5">اطلع على نتائج علاجنا التي تتحدث عن نفسها. هذه الصور توضح كيف أن العناية الدقيقة
                    والتقنيات المتطورة يمكن أن تحول الابتسامة بشكل كبير.</p>
                <a href="{{route('media')}}" class="btn btn-main-color wow fadeInUp" data-wow-delay="0.3s">شاهد المزيد
                </a>
            </div>
            <div class="col-lg-7 mb-5 wow zoomIn" data-wow-delay="0.3s" style="min-height: 400px;">
                <div class="twentytwenty-container position-relative h-100 rounded overflow-hidden">
                    @if ($special_media)
                        <img class="position-absolute w-100 h-100" src="{{asset('storage/'.$special_media->image_before)}}"
                        style="object-fit: cover;" loading="lazy">
                        <img class="position-absolute w-100 h-100" src="{{asset('storage/'.$special_media->image_after)}}"
                            style="object-fit: cover;" loading="lazy">
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Media Section End -->


    <!-- Appointment Section Start -->
    <div class="container-fluid bg-offer mt-5 py-4 wow fadeInUp" data-wow-delay="0.1s" id="appointment" style="background: url({{ isset($global_backgrounds['appointment_background']) &&  $global_backgrounds['appointment_background'] != '' ? asset('storage/'.$global_backgrounds['appointment_background']) : asset('assets/frontend/img/carousel-1.jpg') }}) center center no-repeat;background-size: cover;">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="bg-main-color col-12 col-md-10 p-5 col-lg-8 wow zoomIn" data-wow-delay="0.6s">
                    <h3 class="text-center text-white pb-4">قم بحجز موعدك الآن</h3>
                    <form action="{{ route('send-message') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-6 mb-3">
                                <input type="text" name="name" name="name" class="form-control bg-light border-0" style="min-height: 55px"
                                    placeholder="إسمك"  value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger text-samll">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-6 mb-3 ">
                                <input type="email" name="email" id="email" class="form-control bg-light border-0" style="min-height: 55px"
                                    placeholder="البريد الإلكتروني"  value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger text-samll">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-6 mb-3 ">
                                <input type="text" name="phone" id="phone" minlength="11" maxlength="11" class="form-control bg-light border-0" style="min-height: 55px"
                                    placeholder="رقم الهاتف"  value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="text-danger text-samll">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-6 mb-3 ">
                                <select class="form-select bg-light border-0" name="service_id" id="service_id" style="min-height: 55px">
                                    <option disabled selected>نوع الخدمة</option>
                                    @foreach ($global_services as $service) {{-- global variable for views in the AppServiceProvider --}}
                                        <option {{ old('service_id') == $service->id ? 'selected' : '' }} value="{{ $service->id }}">{{ $service->name }}</option>
                                    @endforeach
                                </select>
                                @error('service_id')
                                    <span class="text-danger text-samll">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <div class="date" id="date1" data-target-input="nearest">
                                    <textarea rows="5" class="form-control bg-light border-0" id="message"
                                        name="message" placeholder="رسالتك">{{ old('message') }}</textarea>
                                    @error('message')
                                        <span class="text-danger text-samll">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-second-color w-100 py-3" type="submit">قم بالحجز الآن</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment Section End -->

@endsection

@push('js')
    <script src="{{asset('assets/frontend/lib/twentytwenty/jquery.event.move.js')}}"></script>
    <script src="{{asset('assets/frontend/lib/twentytwenty/jquery.twentytwenty.js')}}"></script>
@endpush