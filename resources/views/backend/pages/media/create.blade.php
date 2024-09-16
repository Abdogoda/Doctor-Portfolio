@extends('backend.layouts.app')
@section('title', 'انشاء ميديا')
@push('css')
@endpush

@section('content')
  <div class="d-flex align-items-center justify-content-between flex-wrap mb-4">
    <h4 class="page-title">إنشاء ميديا جديدة</h4>
    <a href="{{route('admin.media.index')}}" class="btn btn-primary">عرض الخدمات</a>
  </div>
  <div class="card">
    <div class="card-body">
      <form action="{{route('admin.media.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-6 mb-3">
            <div class="form-group mb-2">
              <label for="image_before" class="form-label">صورة الميديا قبل</label>
              <input type="file" name="image_before" id="image_before" data-image-preview="image_before_preview" accept="image/*" class="form-control">
              @error('image_before')
                  <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <img src="" loading="lazy" id="image_before_preview" alt="Image Preview" style="display: none; width: 300px; max-width:100%"/>
          </div>
          <div class="col-md-6 mb-3">
            <div class="form-group mb-2">
              <label for="image_after" class="form-label">صورة الميديا بعد</label>
              <input type="file" name="image_after" id="image_after" data-image-preview="image_after_preview" accept="image/*" class="form-control">
              @error('image_after')
                  <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <img src="" loading="lazy" id="image_after_preview" alt="Image Preview" style="display: none; width: 300px; max-width:100%"/>
          </div>
          <div class="col-md-12 mb-3">
            <div class="form-group">
              <label for="status" class="form-label">حالة الميديا</label><br>
              <div class="d-flex align-items-center gap-3">
                <span>مميزة (تظهر في الصفحة الرئيسية)</span>
                <input type="checkbox" name="status" id="status"> 
              </div>
              @error('status')
                  <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">إضافة الميديا</button>
        </div>
      </form>
    </div>
  </div>
@endsection

@push('js')
<script>
  document.querySelectorAll('[data-image-preview]').forEach(element => {
    element.addEventListener('change', function(event) {
      const fileInput = event.target;
      
      const previewId = fileInput.getAttribute('data-image-preview');
      const previewImage = document.querySelector(`img#${previewId}`);
      
      if (fileInput.files && fileInput.files[0] && previewImage) {
        const file = fileInput.files[0];
        const reader = new FileReader();
        
          reader.onload = function(e) {
              previewImage.src = e.target.result;
              previewImage.style.display = 'block';
          }
          
          reader.readAsDataURL(file);
      } else {
          previewImage.src = '';
          previewImage.style.display = 'none';
      }
    });
  });

</script>
@endpush