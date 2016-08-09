@if(isset($recipe->meta) and ! empty($recipe->meta))
<ul class="meta">
  <li>Last Updated: {{ $recipe->updated_at->toFormattedDateString() }}</li>
  <li>Chit Name: {{ $recipe->chit_name }}</li>
  <li>Cook Time: {{ $recipe->cook_time }} minutes</li>
  <li>PLU: {{ $recipe->plu }}</li>
  <li>Menu Price: {{ $recipe->menu_price }}</li>
  <li>Service Piece: {{ $recipe->service_piece }}</li>
  <li>Togo Spec: {{ $recipe->togo_spec }}</li>
  <li>Menu Type: {{ $recipe->menu_type }}</li>
  <li>Station: {{ $recipe->station }}</li>
</ul>
{!! $recipe->image() !!}
@endif
