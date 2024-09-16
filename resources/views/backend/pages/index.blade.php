@extends('backend.layouts.app')
@section('title', 'لوحة التحكم')
@push('css')
@endpush

@section('content')
  <div class="card card-body">
    <h5 class="page-title">لوحة التحكم</h5>

  </div>
 <div class="row">
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <div class="row alig n-items-start">
          <div class="col-8">
            <h5 class="card-title mb-9 fw-semibold"> الخدمات </h5>
            <h4 class="fw-semibold mb-3">{{ $global_services->count() }}</h4>
          </div>
          <div class="col-4">
            <div class="d-flex justify-content-end">
              <div class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                <i class="fa fa-hand-holding-heart fs-6"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <div class="row alig n-items-start">
          <div class="col-8">
            <h5 class="card-title mb-9 fw-semibold"> ميديا </h5>
            <h4 class="fw-semibold mb-3">{{ App\Models\Media::count() }}</h4>
          </div>
          <div class="col-4">
            <div class="d-flex justify-content-end">
              <div class="text-white bg-warning rounded-circle p-6 d-flex align-items-center justify-content-center">
                <i class="fa fa-images fs-6"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <div class="row alig n-items-start">
          <div class="col-8">
            <h5 class="card-title mb-9 fw-semibold"> المواعيد </h5>
            <h4 class="fw-semibold mb-3">{{ $global_schedules->count() }}</h4>
          </div>
          <div class="col-4">
            <div class="d-flex justify-content-end">
              <div class="text-white bg-danger rounded-circle p-6 d-flex align-items-center justify-content-center">
                <i class="fa fa-clock fs-6"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 </div>
@endsection

@push('js')
@endpush