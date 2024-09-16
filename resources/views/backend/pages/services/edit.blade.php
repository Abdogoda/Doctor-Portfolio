@extends('backend.layouts.app')
@section('title', 'تعديل خدمة')
@push('css')
@endpush

@section('content')
  <div class="d-flex align-items-center justify-content-between flex-wrap mb-4">
    <h4 class="page-title">تعديل خدمة</h4>
    <a href="{{route('admin.services.index')}}" class="btn btn-primary">عرض الخدمات</a>
  </div>
  <div class="card">
    <div class="card-body">
      <form action="{{route('admin.services.update', $service)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="row">
          <div class="col-md-6 mb-3">
            <div class="form-group">
              <label for="name" class="form-label">اسم الخدمة</label>
              <input type="text" name="name" value="{{$service->name}}" class="form-control">
              @error('name')
                  <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <div class="form-group">
              <label for="image" class="form-label">صورة الخدمة</label>
              <input type="file" name="image" accept="image/*" class="form-control">
              @error('image')
                  <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
          </div>
          <div class="col-md-12 mb-3">
            <div class="form-group">
              <label for="description" class="form-label">وصف الخدمة</label>
              <textarea name="description" rows="5" class="form-control">{{$service->description}}</textarea>
              @error('description')
                  <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">تعديل الخدمة</button>
        </div>
      </form>
    </div>
  </div>
@endsection

@push('js')
@endpush