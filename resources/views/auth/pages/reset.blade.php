@extends('auth.layouts.app')
@section('title', 'تغيير كلمة المرور')
@push('css')
@endpush

@section('content')

    <h3 class="text-center">تغيير كلمة المرور</h3>
    <form action="{{route('reset-password')}}" method="post">
      @csrf
      <input type="hidden" name="token" value="{{request('token')}}">
      <div class="mb-4">
        <label for="password" class="form-label">كلمة المرور الجديدة</label>
        <input type="password" class="form-control" id="password" name="password"
          autocomplete="current-password">
          @error('password')
              <span class="text-danger">{{$message}}</span>
          @enderror
      </div>
      <div class="mb-4">
        <label for="password_confirmation" class="form-label">تأكيد كلمة المرور</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
          autocomplete="current-password">
      </div>
      <div class="d-flex align-items-center justify-content-between my-4">
        <a class="text-main-color fw-bold" href="{{route('login')}}">العودة الي تسجيل الدخول</a>
      </div>
      <button type="submit" class="btn btn-main-color w-100 py-8 fs-4 mb-4 rounded-2">إرسال الرابط</button>
    </form>
@endsection

@push('js')
@endpush