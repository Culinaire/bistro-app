@if(isset($recipe->ingredients) and ! empty($recipe->ingredients))
<h2>Ingredients</h2>
<table class="table table-condensed">
  <thead>
    <tr>
      <th>Qty</th>
      <th>Unit</th>
      <th>Ingredient</th>
    </tr>
  </thead>
  <tbody>
    @foreach($recipe->ingredients as $ing)
    <tr>
      <td>{{ $ing['qty'] }}</td>
      <td>{{ $ing['uom'] }}</td>
      <td>{{ $ing['item'] }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endif
