@extends('auth.layouts.app')
@section('title', 'نسيت كلمة المرور')
@push('css')
@endpush

@section('content')
    <h3 class="text-center">نسيت كلمة المرور</h3>
    <form action="{{route('forgot-password')}}" method="post">
      @csrf
      <p>من فضلك قم بإدخال البريد الإلكتروني الخاص بك لكي نرسل لك رابط تغيير كلمة المرور عبر البريد الإلكتروني الخاص بك.</p>
      <div class="mb-3">
        <label for="email" class="form-label">البريد الإلكتروني</label>
        <input type="email" class="form-control" id="email" name="email" autofocus autocomplete="email">
        @error('email')
            <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="d-flex align-items-center justify-content-between my-4">
        <a class="text-main-color fw-bold" href="{{route('login')}}">العودة الي تسجيل الدخول</a>
      </div>
      <button type="submit" class="btn btn-main-color w-100 py-8 fs-4 mb-4 rounded-2">إرسال الرابط</button>
    </form>
@endsection

@push('js')
@endpush