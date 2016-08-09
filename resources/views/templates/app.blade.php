@extends('master')

{{-- CSS --}}
@push('head')
  <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}" media="screen" charset="utf-8">
@endpush

{{-- Content --}}
@section('body')
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
