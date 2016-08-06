@extends('master')

@push('head')
  <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

  <style>

      .content {
        font-weight: 100;
        font-family: 'Lato', sans-serif;
        text-align: center;
        padding-top: 28%;
      }

      .title {
        font-size: 96px;
      }
  </style>
@endpush

@section('content')
  <div class="content">
      <div class="title">Laravel 5</div>
  </div>
@endsection
