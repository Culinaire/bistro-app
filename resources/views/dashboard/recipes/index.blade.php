@extends('templates.application')

@section('content')
  <h1 class="page-header">Recipes</h1>
  <table class='table'>
    <thead>
      <tr>
        <th>Name</th>
        <th>Type</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($recipes as $recipe)
        <tr>
          <td><a href="{{ url('admin/recipes', $recipe->id) }}">{{ $recipe->name }}</a></td>
          <td>{{ $recipe->type }}</td>
          <td></td>
          <td></td>
        </tr>
      @endforeach

    </tbody>
  </table>
@endsection
