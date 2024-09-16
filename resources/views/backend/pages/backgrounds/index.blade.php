@extends('backend.layouts.app')
@section('title', 'الخلفيات')
@push('css')
@endpush

@section('content')
  <div class="d-flex align-items-center justify-content-between flex-wrap mb-4">
    <h4 class="page-title">جميع الخلفيات</h4>
  </div>
  <div class="row">
    @forelse ($global_backgrounds['all'] as $item)
      <form action="{{ route('admin.backgrounds.update', $item) }}" method="post" class="col-md-6" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="card">
          <img src="{{ $item->image != '' ? asset('storage/'.$item->image) : '/img.png' }}" class="card-image-top" />
          <div class="card-body">
            <h3 class="text-center card-title">{{ $item->place }}</h3>
            <div class="d-flex my-3 gap-2 align-items-center">
              <input type="file" class="form-control file-input" data-button-id="input-save-image-{{ $item->id }}" name="image" accept="image/*">
              <button type="submit" class="btn btn-primary" style="display: none" id="input-save-image-{{ $item->id }}" class="btn-save-image">حفظ</button>
            </div>
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
      </form>
    @empty
        <div class="col-12">
          <div class="text-center card card-body text-muted fs-4">لا يوجد الخلفيات متاحة!</div>
        </div>
    @endforelse
  </div>
</div>
@endsection

@push('js')
<script>
  const fileInputs = document.querySelectorAll('.file-input');
  fileInputs.forEach(fileInput => {
      fileInput.addEventListener('change', function() {
          const file = fileInput.files[0];
          const buttonId = fileInput.getAttribute('data-button-id');
          const button = document.getElementById(buttonId);
          
          if (file && file.type.startsWith('image/')) {
              button.style.display = 'inline-block';
          } else {
              button.style.display = 'none';
          }
      });
  });
</script>
@endpush