@extends('master')

@push('head')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" charset="utf-8">
@endpush

@section('body')
  @include('templates.partials.navbar')
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 col-md-2 sidebar">
        @include('templates.partials.sidebar')
      </div>
      <div class="col-sm-9 col-md-10 col-sm-offset-3 col-md-offset-2">
        @yield('content')
      </div>
    </div>
  </div>
@endsection
