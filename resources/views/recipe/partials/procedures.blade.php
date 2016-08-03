@if(isset($recipe->procedures) and ! empty($recipe->procedures))
<h2>Procedures</h2>
<ol class="procedures">
  @foreach($recipe->procedures as $step)
  <li>{{ $step }}</li>
  @endforeach
</ol>
@endif
