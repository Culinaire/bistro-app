@if(isset($recipe->meta) and ! empty($recipe->meta))
<ul class="meta">
  <li>Last Updated: {{ $recipe->updated_at->toFormattedDateString() }}</li>
  <li>Yield: {{ $recipe->yield }}</li>
  <li>Category: {{ $recipe->category }}</li>
  <li>Prep Time:
    <ul>
      <li>active: {{ $recipe->prep_time['active'] }} minutes</li>
      <li>inactive: {{ $recipe->prep_time['inactive'] }} minutes</li>
      <li>total: {{ $recipe->prep_time['active']+$recipe->prep_time['inactive'] }} minutes</li>
    </ul>
  </li>
</ul>
@endif
