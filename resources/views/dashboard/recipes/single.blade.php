@extends('templates.application')

@section('content')
  <h1 class="page-header"><small>Recipe:</small> {{ $recipe->name }}</h1>
  <h2>Meta</h2>

  <h2>Ingredients</h2>
  <ul>
  @foreach($recipe->ingredients as $ing)
    <li>{{ $ing['qty'] }}  {{ $ing['uom'] }}  {{ $ing['item'] }}  </li>
  @endforeach
  </ul>

  <h2>Procedures</h2>
  <ol>
  @foreach($recipe->procedures as $step)
    <li>{{ $step }}</li>
  @endforeach
  </ol>
  <h2>Quality</h2>
@endsection
