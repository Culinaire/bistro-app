@extends('templates.app')

@section('content')

  <div class="page-header">
      <h1>
        Edit {{ ucwords($recipe->type) }}
        <div class="pull-right hidden-print">
          <a class="btn btn-primary" href="{{ route('recipes.'.$recipe->type.'.export', ['id'=> $recipe->id]) }}"><span class="fa fa-pencil"></span> Export Config</a>
          <a class="btn btn-primary" href="{{ route('recipes.'.$recipe->type.'.importyaml', ['id'=> $recipe->id]) }}"><span class="fa fa-pencil"></span> Import Config</a>
        </div>
      </h1>
  </div>

@if ($recipe->type == 'batch')
  @include('recipe.partials.edit-batch', ['recipe'=>$recipe])
@elseif ($recipe->type == 'build')
  @include('recipe.partials.edit-build', ['recipe'=>$recipe])
@endif

@endsection
