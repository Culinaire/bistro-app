@extends('master')

{{-- CSS --}}
@push('header')
  <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" media="screen" charset="utf-8">
  <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}" media="screen" charset="utf-8">
@endpush

{{-- content --}}
@section('body')
  @include('shared.navbar')
  <div class="container-fluid">
    <div class='row'>

      @include('app.shared.sidebar')

      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
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
