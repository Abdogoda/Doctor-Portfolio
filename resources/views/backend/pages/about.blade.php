@extends('backend.layouts.app')
@section('title', 'عن الطبيب')
@push('css')
@endpush

@section('content')
  <div class="card card-body">
    <h4 class="page-title mb-4">عن الطبيب</h4>
    <form action="{{ route("admin.about.update") }}" method="post" enctype="multipart/form-data">
      @csrf
        <div class="form-group mb-3">
          <label for="education" class="mb-1">مستوي التعليم</label>
          <input type="text" id="education" name="education" class="form-control" value="{{ $education->text }}">
          @error('education')
              <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
          <label for="image" class="mb-1">الصورة التعريفية @if ($image->text) <img src="{{ asset('storage/'.$image->text) }}" width="30px" alt="doctor-profile" loading="lazy"> @endif</label>
          <input type="file" accept="image/*" id="image" name="image_profile" class="form-control">
          @error('image')
              <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group mb-3">
          <label for="" class="mb-1">الوصف</label>
          @foreach ($paragraphs as $key => $paragraph)
              <textarea rows="3" class="form-control mb-2" name="paragraphs[]">{{ $paragraph->text }}</textarea>
              @error('paragraphs.'.$key)
                  <span class="text-danger">{{ $message }}</span>
              @enderror
          @endforeach
        </div>
        <div class="form-group mb-3">
          <label for="" class="mb-1">المميزات</label>
          @foreach ($features as $key => $feature)
              <input type="text" class="form-control mb-2" value="{{ $feature->text }}" name="features[]">
              @error('features.'.$key)
                  <span class="text-danger">{{ $message }}</span>
              @enderror
          @endforeach
        </div>
      <button type="submit" class="btn btn-primary">تعديل البيانات</button>
    </form>
  </div>

@endsection

@push('js')
@endpush