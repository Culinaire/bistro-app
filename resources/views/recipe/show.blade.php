@extends('templates.app')

@section('title', $recipe->slug )

@section('content')
<div class="recipe {{ $recipe->type }}-recipe">

  <div class="page-header">
    <h1>
      {{ $recipe['name'] }}
      <div class="hidden-print pull-right">
        <a class="btn btn-primary" href="{{ route('app.recipes.'.$recipe->type.'.edit', ['id'=> $recipe->id]) }}"><span class="fa fa-pencil"></span> Edit</a>
      </div>
    </h1>
  </div>

  @include('recipe.partials.'.$recipe->type.'-meta', ['recipe' => $recipe ])
  @include('recipe.partials.ingredients', ['recipe' => $recipe ])
  @include('recipe.partials.procedures', ['recipe' => $recipe ])
  @include('recipe.partials.quality', ['recipe' => $recipe ])

</div>
@endsection
