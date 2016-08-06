@extends('master')

{{-- CSS --}}
@push('header')
  <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" media="screen" charset="utf-8">
  <link rel="stylesheet" href="{{ asset('assets/css/public.css') }}" media="screen" charset="utf-8">
@endpush

{{-- content --}}
@section('body')
  @include('shared.navbar')
  <div class="container">
    <div class='row'>
      @yield('content')
    </div>
  </div>
@endsection

{{-- Javascript --}}
@push('footer')
  <script src="{{ asset('assets/js/jquery.js') }}" charset="utf-8"></script>
  <script src="{{ asset('assets/js/bootstrap.js') }}" charset="utf-8"></script>
@endpush
