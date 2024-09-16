@extends('backend.layouts.app')
@section('title', 'الرسائل')
@push('css')
<link rel="stylesheet" href="{{asset('assets/backend/css/modal.css')}}">
@endpush

@section('content')
  <div class="d-flex align-items-center justify-content-between flex-wrap mb-4">
    <h4 class="page-title">جميع الرسائل</h4>
    @if ($messages_unreaded > 0)
        <button type="button" class="btn btn-primary" data-modal-target="mardAllAsReadModal">تعيين الكل كمقروء ({{ $messages_unreaded }}) <i class="fa fa-eye"></i></button>
    @endif
  </div>
  <div class="row">
    @forelse ($messages as $item)
      <div class="col-12">
        <div class="card">
          <div class="card-body {{ !$item->read ? 'bg-light' : '' }}">
            <div class="d-flex justify-content-between flex-wrap">
              <div class="card-title">
                {{ $item->name }} @if ($item->email) <span class="text-muted">({{ $item->email }})</span> @endif<br>
                <small>{{ $item->phone }}</small>
              </div>
              <div class="buttons d-flex align-items-center gap-2">
                @if (!$item->read)
                  <a href="{{ route('admin.messages.read', $item) }}" class="btn btn-primary flex-fill">تعيين كمقروء <i class="fa fa-eye"></i> </a>
                @endif
                <button type="button" class="btn btn-danger flex-fill" data-modal-target="deletemessagesModal" data-action="{{ route('admin.messages.destroy', $item) }}">حذف <i class="ti ti-trash"></i></button>
              </div>
            </div>
            <p class="card-text mt-3">
              {{ $item->message }}
            </p>
          </div>
        </div>
      </div>
    @empty
        <div class="col-12">
          <div class="text-center card card-body text-muted fs-4">لا يوجد الرسائل متاحة!</div>
        </div>
    @endforelse
  </div>
  <div class="m-auto">{{ $messages->links('pagination::bootstrap-5') }}</div>

<!-- Mark as read Modal -->
<div class="modal" id="mardAllAsReadModal">
  <div class="modal-content">
    <span class="modal-close">&times;</span>
    <h1 class="border-bottom pb-3">تعين جميع الرسائل كمقروئة</h1>
    <form action="{{ route('admin.messages.read_all') }}" method="POST">
      @csrf
        <p>هل أنت متأكد من أنك تريد تعيين جميع الرسائل كمقروءة؟</p>
        <button type="submit" class="btn btn-primary">تأكيد</button>
      </form>
  </div>
</div>

<!-- Delete Modal -->
<div class="modal" id="deletemessagesModal">
  <div class="modal-content">
    <span class="modal-close">&times;</span>
    <h1 class="border-bottom pb-3">حذف الرسالة</h1>
    <form id="actionForm" method="POST">
      @csrf
      @method('DELETE')
        <p>هل أنت متأكد من أنك تريد حذف هذة الرسائل؟</p>
        <button type="submit" class="btn btn-danger">حذف الرسائل</button>
      </form>
  </div>
</div>
@endsection

@push('js')
  <script src="{{asset('assets/backend/js/modal.js')}}"></script>
@endpush