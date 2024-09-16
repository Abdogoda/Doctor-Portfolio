@extends('backend.layouts.app')
@section('title', 'ميديا')
@push('css')
<link rel="stylesheet" href="{{asset('assets/backend/css/modal.css')}}">
@endpush

@section('content')
  <div class="d-flex align-items-center justify-content-between flex-wrap mb-4">
    <h4 class="page-title">جميع الميديا</h4>
    <a href="{{route('admin.media.create')}}" class="btn btn-primary">إضافة ميديا جديدة</a>
  </div>
  <div class="row">
    @forelse ($media as $item)
      <div class="col-12">
        <div class="card">
          <div class="card-body row">
            <div class="col-sm-6 mb-3">
              <h3 class="mb-2">قبل</h3>
              <img src="{{asset('storage/'.$item->image_before)}}" class="w-100" alt="item-image" loading="lazy">
            </div>
            <div class="col-sm-6 mb-3">
              <h3 class="mb-2">بعد</h3>
              <img src="{{asset('storage/'.$item->image_after)}}" class="w-100" alt="item-image" loading="lazy">
            </div>
            <p class="card-text">
              @if ($item->status)
                  <i class="fa fa-star text-warning"></i>الميديا مميزة (تظهر في الصفحة الرئيسية)  
              @endif
            <div class="d-flex flex-wrap gap-2">
              <a href="{{route('admin.media.edit', $item)}}" class="btn btn-success flex-fill">تعديل الخدمة <i class="ti ti-edit"></i></a>
              <button type="button" class="btn btn-danger flex-fill" data-modal-target="deleteMediaModal"  
              data-action="{{ route('admin.media.destroy', $item) }}">حذف الخدمة <i class="ti ti-trash"></i></button>
            </div>
          </div>
        </div>
      </div>
    @empty
        <div class="col-12">
          <div class="text-center card card-body text-muted fs-4">لا يوجد ميديا متاحة!</div>
        </div>
    @endforelse
  </div>

<!-- Delete Modal -->
<div class="modal" id="deleteMediaModal">
  <div class="modal-content">
    <span class="modal-close">&times;</span>
    <h1 class="border-bottom pb-3">حذف الميديا</h1>
    <form id="deleteForm" method="POST">
      @csrf
      @method('DELETE')
        <p>هل أنت متأكد من أنك تريد حذف هذة الميديا؟</p>
        <button type="submit" class="btn btn-danger">حذف الميديا</button>
      </form>
  </div>
</div>
@endsection

@push('js')
  <script src="{{asset('assets/backend/js/modal.js')}}"></script>
  <script>
    var showenModal = document.querySelector('.modal.modal-show')
    if(showenModal){
      var modalID = showenModal.getAttribute('id');
      var modalButton = document.querySelector(`[data-modal-target="${modalID}"]`);
      if (modalButton) {
        const actionUrl = modalButton.getAttribute('data-action');
        console.log(actionUrl);
        var deleteForm = shownModal.querySelector('#deleteForm');
        deleteForm.setAttribute('action', actionUrl);
      }
    }
   // Listen for when the modal becomes visible
    $('#deleteServiceModal').on('shown.bs.modal', function (event) {
        // Code to execute when the modal is shown
        console.log('Modal is now visible');
    }); 
  </script>
@endpush