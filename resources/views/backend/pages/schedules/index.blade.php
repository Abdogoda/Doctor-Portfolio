@extends('backend.layouts.app')
@section('title', 'جدول المواعيد')
@push('css')
@endpush

@section('content')
  <div class="card card-body">
    <livewire:schedule-manager />
  </div>

@endsection

@push('js')
@endpush