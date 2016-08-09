<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Recipe;

class BatchRecipe extends Recipe
{
  protected $table = 'recipe_originals';

  public function setYieldUomAttribute($value)
  {
    $meta = json_decode($this->attributes['meta'], true);
    $meta['yield']['uom'] = $value;
    $this->attributes['meta'] = json_encode($meta);
  }

  public function setYieldQtyAttribute($value)
  {
    $meta = json_decode($this->attributes['meta'], true);
    $meta['yield']['qty'] = $value;
    $this->attributes['meta'] = json_encode($meta);
  }

  public function getYieldAttribute()
  {
    $string = $this->meta['yield']['qty']." ".$this->meta['yield']['uom'];
    return $string;
  }

  public function getCategoryAttribute()
  {
    return $this->meta['category'];
  }

  public function getPrepTimeAttribute()
  {
    $time = [
      'active'=> $this->meta['prep_time']['active'],
      'inactive'=> $this->meta['prep_time']['inactive']
    ];
    return $time;
  }
}
