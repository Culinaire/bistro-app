@extends('templates.application')

@section('content')
  <h1 class="page-header">Vendors</h1>
  <table class='table'>
    <thead>
      <tr>
        <th>Name</th>
        <th>Representative</th>
        <th>Portal Link</th>
      </tr>
    </thead>
    <tbody>
      @foreach($vendors as $vendor)
        <tr>
          <td>{{ $vendor['name'] }}</td>
          <td>{{ $vendor['rep_first_name'] }} {{ $vendor['rep_last_name'] }}</td>
          <td> <a href="{{ $vendor['portal_url'] }}">Portal</a></td>
        </tr>
      @endforeach

    </tbody>
  </table>
@endsection
