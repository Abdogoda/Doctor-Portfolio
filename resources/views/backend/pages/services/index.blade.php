@extends('backend.layouts.app')
@section('title', 'الخدمات')
@push('css')
<link rel="stylesheet" href="{{asset('assets/backend/css/modal.css')}}">
@endpush

@section('content')
  <div class="d-flex align-items-center justify-content-between flex-wrap mb-4">
    <h4 class="page-title">جميع الخدمات</h4>
    <a href="{{route('admin.services.create')}}" class="btn btn-primary">إضافة خدمة جديدة</a>
  </div>
  <div class="row">
    @forelse ($global_services as $service) {{-- global variable for views in the AppServiceProvider --}}
      <div class="col-md-6 col-lg-4">
        <div class="card">
          <img src="{{asset('storage/'.$service->image)}}" class="card-img-top" alt="service-image" loading="lazy">
          <div class="card-body">
            <h5 class="card-title">{{$service->name}}</h5>
            <p class="card-text">{{$service->description}}</p>
            <div class="d-flex flex-wrap gap-2">
              <a href="{{route('admin.services.edit', $service)}}" class="btn btn-success flex-fill">تعديل <i class="ti ti-edit"></i></a>
              <button type="button" class="btn btn-danger flex-fill" data-modal-target="deleteServiceModal"  
              data-action="{{ route('admin.services.destroy', $service) }}">حذف <i class="ti ti-trash"></i></button>
            </div>
          </div>
        </div>
      </div>
    @empty
        <div class="col-12">
          <div class="text-center card card-body text-muted fs-4">لا يوجد خدمات متاحة!</div>
        </div>
    @endforelse
  </div>

<!-- Delete Modal -->
<div class="modal" id="deleteServiceModal">
  <div class="modal-content">
    <span class="modal-close">&times;</span>
    <h1 class="border-bottom pb-3">حذف الخدمة</h1>
    <form id="deleteForm" method="POST">
      @csrf
      @method('DELETE')
        <p>هل أنت متأكد من أنك تريد حذف هذة الخدمة؟</p>
        <button type="submit" class="btn btn-danger">حذف الخدمة</button>
      </form>
  </div>
</div>
@endsection

@push('js')
  <script src="{{asset('assets/backend/js/modal.js')}}"></script>
@endpush