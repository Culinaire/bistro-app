@extends('templates.application')

@section('content')
  <h1 class="page-header">Products</h1>
  <table class='table'>
    <thead>
      <tr>
        <th>Product</th>
        <th>Purchase Price</th>
        <th>Vendor</th>
        <th>Unit Price</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
        <tr>
          <td>{{ $product['name'] or $product['desc'] }}</td>
          <td>{{ $product->purchase_price }}</td>
          <td>{{ $product->vendor->name }}</td>
          <td></td>
        </tr>
      @endforeach

    </tbody>
  </table>
@endsection
