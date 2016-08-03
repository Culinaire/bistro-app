@extends('master')

@section('title', $recipe->slug )

@section('content')
<div class="recipe {{ $recipe->type }}-recipe">

  <h1 class="page-header">
    {{ $recipe['name'] }}
    <div class="hidden-print pull-right">
      <a class="btn btn-primary" href="{{ route('recipes.'.$recipe->type.'.edit', ['id'=> $recipe->id]) }}"><span class="fa fa-pencil"></span> Edit</a>
    </div>
  </h1>

  @include('recipe.partials.'.$recipe->type.'-meta', ['recipe' => $recipe ])
  @include('recipe.partials.ingredients', ['recipe' => $recipe ])
  @include('recipe.partials.procedures', ['recipe' => $recipe ])
  @include('recipe.partials.quality', ['recipe' => $recipe ])

</div>
@endsection
