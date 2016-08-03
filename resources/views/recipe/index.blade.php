@extends('master')

@section('content')

@if (session('status'))
<div class="alert alert-success">
  {{ session('status') }}
</div>
@endif

<h1 class="page-header">Recipes</h1>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>ID</th>
        <th>Slug</th>
        <th>Name</th>
        <th>Type</th>
        <th>File</th>
        <th colspan="2"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($recipes as $recipe)
        <tr>
          <td>{{ $recipe->id }}</td>
          <td>{{ $recipe->name }}</td>
          <td>{{ $recipe->slug }}</td>
          <td>{{ $recipe->type }}</td>
          <td>{{ $recipe->file }}</td>
          <td><a class="btn btn-primary" href="{{ route('recipes.'.$recipe->type.'.edit', ['id'=> $recipe->id]) }}"><span class="fa fa-pencil"></span> Edit</a></td>
          <td><a class="btn btn-primary" href="{{ route('recipes.'.$recipe->type.'.show', ['id'=> $recipe->id]) }}"><span class="fa fa-eye"></span> Show</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>

@endsection
