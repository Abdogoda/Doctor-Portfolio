@extends('auth.layouts.app')
@section('title', 'تسجيل الدخول')
@push('css')
@endpush

@section('content')
    <h3 class="text-center">تسجيل الدخول إلي حسابك</h3>
    <form action="{{route('login-handler')}}" method="post">
      @csrf
      <div class="mb-3">
        <label for="email" class="form-label">البريد الإلكتروني</label>
        <input type="email" class="form-control" id="email" name="email" autofocus autocomplete="email">
        @error('email')
            <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="mb-4">
        <label for="password" class="form-label">كلمة المرور</label>
        <input type="password" class="form-control" id="password" name="password"
          autocomplete="current-password">
          @error('password')
              <span class="text-danger">{{$message}}</span>
          @enderror
      </div>
      <div class="d-flex align-items-center justify-content-between my-4">
        <div class="form-check">
          <input class="form-check-input main-color" type="checkbox" value="" id="flexCheckChecked" checked>
          <label class="form-check-label text-dark" for="flexCheckChecked">
            تذكرني
          </label>
        </div>
        <a class="text-main-color fw-bold" href="{{route('forgot')}}">هل نسيت كلمة المرور؟</a>
      </div>
      <button type="submit" class="btn btn-main-color w-100 py-8 fs-4 mb-4 rounded-2">تسجيل الدخول</button>
    </form>
@endsection

@push('js')
@endpush