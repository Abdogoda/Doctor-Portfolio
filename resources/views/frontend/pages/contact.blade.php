@extends('frontend.layouts.app')
@section('title', 'تواصل معنا')
@push('css')
@endpush

@section('content')
    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 hero-header mb-5" style="background: linear-gradient(rgba(9, 30, 62, .85), rgba(9, 30, 62, .85)), url({{ isset($global_backgrounds['contact_background']) && $global_backgrounds['contact_background']->image !=  ''  ? asset('storage/'.$global_backgrounds['contact_background']->image) : asset('assets/frontend/img/carousel-1.jpg') }}) center center no-repeat;background-size: cover;">
        <div class="row py-3">
            <div class="col-12 text-center">
                <h1 class="display-3 text-white animated zoomIn">هل لديك أي استفسار؟</h1>
                <a href="/" class="h4 text-white">الرئيسية</a>
                <i class="fa fa-tooth text-white px-2"></i>
                <a href="#" class="h4 text-white">تواصل معنا</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Appointment Start -->
    <section class="container py-5">
        <div class="row">
            <div class="col-md-6 mb-5 wow slideInUp" data-wow-delay="0.3s">
                <form action="{{ route('send-message') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-3">
                            <input type="text" name="name" name="name" style="height: 55px;"
                                class="form-control bg-light border-0" placeholder="إسمك" value="{{ old('name') }}" autofocus autocomplete="name">
                                @error('name')
                                    <span class="text-danger text-samll">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="col-12 mb-3 col-sm-6">
                            <input type="email" name="email" id="email" style="height: 55px;"
                                class="form-control bg-light border-0" placeholder="البريد الإلكتروني" value="{{ old('email') }}" autocomplete="email">
                            @error('email')
                                <span class="text-danger text-samll">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12 mb-3 col-sm-6">
                            <input type="text" name="phone" id="phone" style="height: 55px;"
                                class="form-control bg-light border-0" minlength="11" maxlength="11" placeholder="رقم الهاتف" value="{{ old('phone') }}" autocomplete="phone">
                            @error('phone')
                                <span class="text-danger text-samll">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <select class="form-select bg-light border-0" style="height: 55px;" name="service_id"
                                id="service_id">
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
                                <textarea rows="5" class="form-control bg-light border-0" id="message" name="message"
                                    placeholder="رسالتك">{{ old('message') }}</textarea>
                                @error('message')
                                    <span class="text-danger text-samll">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-main-color w-100 py-3" type="submit">قم بالحجز الآن</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 mb-5 wow slideInUp" data-wow-delay="0.1s">
                <div class="bg-light rounded h-100 p-5">
                    <div class="section-title">
                        <h5 class="position-relative d-inline-block text-uppercase">تواصل معنا</h5>
                        <p class=" mb-5">نحن هنا لمساعدتك. املأ النموذج أو اتصل بنا مباشرة للحصول على
                            الدعم الذي تحتاجه.</ح>
                    </div>
                    @if (isset($global_settings) && $global_settings['address'])
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-geo-alt fs-1 text-main-color ms-3"></i>
                            <div class="text-end">
                                <h5 class="mb-0">عنواننا</h5>
                                <span>{{ $global_settings['address'] }}</span>
                            </div>
                        </div>
                    @endif
                    @if (isset($global_settings) && $global_settings['email'])
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-envelope-open fs-1 text-main-color ms-3"></i>
                            <div class="text-end">
                                <h5 class="mb-0">البريد الإلكتروني</h5>
                                <span>{{ $global_settings['email'] }}</span>
                            </div>
                        </div>
                    @endif
                    @if (isset($global_settings) && $global_settings['phone'])
                        <div class="d-flex align-items-center">
                            <i class="bi bi-phone-vibrate fs-1 text-main-color ms-3"></i>
                            <div class="text-end">
                                <h5 class="mb-0">رقم الهاتف</h5>
                                <span dir="ltr">+2{{ $global_settings['phone'] }}</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            @if (isset($global_settings) && $global_settings['location'])
                <div class="col-12 wow slideInUp" data-wow-delay="0.6s">
                    <iframe class="position-relative rounded w-100 h-100"
                        src="{{ $global_settings['location'] }}"
                        frameborder="0" style="min-height: 400px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>
            @endif
        </div>
    </section>
    <!-- Appointment End -->
@endsection

@push('js')
@endpush