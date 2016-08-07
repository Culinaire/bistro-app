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
      <div class="col-sm-10 col-sm-offset-1 main">
        @yield('content')
      </div>    
    </div>
  </div>
@endsection

{{-- Javascript --}}
@push('footer')
  <script src="{{ asset('assets/js/jquery.js') }}" charset="utf-8"></script>
  <script src="{{ asset('assets/js/bootstrap.js') }}" charset="utf-8"></script>
@endpush
