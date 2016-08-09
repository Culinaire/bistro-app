@extends('templates.site')

@section('content')
  <div class="panel panel-default login">
    <div class="panel-heading">Login</div>
    <div class="panel-body">
      @include('site.partials.login')
    </div>
  </div>
  
@endsection
