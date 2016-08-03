@if (isset($recipe->quality) and ! empty($recipe->quality))
<h2>Quality</h2>
<ul class="quality">
  @foreach($recipe->quality as $q)
  <li>{{ $q }}</li>
  @endforeach
</ul>
@endif
