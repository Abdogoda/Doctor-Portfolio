@extends('backend.layouts.app')
@section('title', 'الحساب الشخصي')
@push('css')
@endpush

@section('content')
  <div class="card card-body">
    <h4 class="page-title mb-3">معلومات الحساب</h4>
    <form action="{{ route("admin.profile.update") }}" method="post">
      @csrf
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="name" class="mb-1">الاسم</label>
          <input type="text" value="{{ auth()->user()->name }}" name="name" class="form-control" id="name">
          @error('name')
              <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-md-6 mb-3">
          <label for="email" class="mb-1">البريد الإلكتروني</label>
          <input type="email" value="{{ auth()->user()->email }}" name="email" class="form-control" id="email">
          @error('email')
              <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <button type="submit" class="btn btn-primary">تعديل البيانات</button>
    </form>
  </div>

  <div class="card card-body">
    <h4 class="page-title mb-3">تغيير كلمة المرور</h4>
    <form action="{{ route("admin.profile.change-password") }}" method="post">
      @csrf
      <div class="row">
        <div class="col-md-12 mb-3">
          <label for="current_password" class="mb-1">كلمة المرور الحالية</label>
          <input type="password" class="form-control" name="current_password" id="current_password">
          @error('current_password')
              <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-md-6 mb-3">
          <label for="password" class="mb-1">كلمة المرور الجديدة</label>
          <input type="password" class="form-control" name="password" id="password">
          @error('password')
              <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-md-6 mb-3">
          <label for="password_confirmation" class="mb-1"> تأكيد كلمة المرور الجديدة</label>
          <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
        </div>
      </div>
      <button type="submit" class="btn btn-primary">تغيير كلمة المرور</button>
    </form>
  </div>
@endsection

@push('js')
@endpush