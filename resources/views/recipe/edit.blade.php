@extends('master')

@section('content')

@if ($recipe->type == 'batch')
  @include('recipe.partials.edit-batch', ['recipe'=>$recipe])
@elseif ($recipe->type == 'build')
  @include('recipe.partials.edit-build', ['recipe'=>$recipe])
@endif

@endsection
