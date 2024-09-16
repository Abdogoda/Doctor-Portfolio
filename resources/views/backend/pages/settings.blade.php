@extends('backend.layouts.app')
@section('title', 'الإعدادات')
@push('css')
@endpush

@section('content')
  <div class="card card-body">
    <div class="d-flex align-items-center justify-content-between flex-wrap mb-4">
      <h4 class="page-title">الإعدادات العامة</h4>
    </div>
    <form action="{{ route('admin.settings.update_settings') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
        @foreach ($global_settings->toArray() as $key => $value) {{-- global variable for views in the AppsettingProvider --}}
          @if (in_array($key, ['logo', 'large_logo']))
            <div class="col-md-6">
              <div class="form-group mb-3">
                <label for="{{ $key }}" class="mb-1">{{ __('messages.'.$key) }} @if ($value) <img src="{{ asset('storage/'. $value) }}" width="30px" alt="{{ $key }}-image"  loading="lazy"> @endif</label>
                <input type="file" class="form-control" name="{{ $key }}" id="{{ $key }}" value="{{ $value }}" accept="images/*">
                @error($key)
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
          @elseif(in_array($key, ['description', 'short_description']))
          <div class="col-md-12">
            <div class="form-group mb-3">
              <label for="{{ $key }}" class="mb-1">{{ __('messages.'.$key) }}</label>
              <textarea class="form-control" name="{{ $key }}" id="{{ $key }}" rows="3">{{ $value }}</textarea>
              @error($key)
                  <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          @else
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="{{ $key }}" class="mb-1">{{ __('messages.'.$key) }}</label>
                <input type="text" class="form-control" name="{{ $key }}" id="{{ $key }}" value="{{ $value }}">
                @error($key)
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
          @endif
        @endforeach
        <div class="form-group">
          <button type="submit" class="btn btn-primary">حفظ الإعدادات</button>
        </div>
      </div>
    </form>
  </div>

  <div class="card card-body">
    <div class="d-flex align-items-center justify-content-between flex-wrap mb-4">
      <h4 class="page-title">الإعدادات التواصل</h4>
    </div>
    <form action="{{ route('admin.settings.update_social') }}" method="post" >
      @csrf
      <div class="row">
        @foreach ($global_socials->toArray() as $key => $value) {{-- global variable for views in the AppsettingProvider --}}
            <div class="col-md-6">
              <div class="form-group mb-3">
                <label for="{{ $key }}" class="mb-1">{{ __('messages.'.$key) }} <i class="fab fa-{{ $key }}"></i></label>
                <input type="text" class="form-control" name="{{ $key }}" id="{{ $key }}" value="{{ $value }}">
                @error($key)
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
        @endforeach
        <div class="form-group">
          <button type="submit" class="btn btn-primary">حفظ الإعدادات</button>
        </div>
      </div>
    </form>
  </div>

@endsection

@push('js')
@endpush