@extends('master')

{{-- CSS --}}
@push('head')
  <link rel="stylesheet" href="{{ asset('assets/css/public.css') }}" charset="utf-8">
@endpush

{{-- Content --}}
@section('body')
  <div class="container">
    <div class='row'>
      <div class="col-sm-10 col-sm-offset-1 main">
        @yield('content')
      </div>
    </div>
  </div>
@endsection
