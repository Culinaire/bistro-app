<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipes extends Model
{
  protected $table = "manual_recipes";
  protected $casts = [
    'meta'        => 'array',
    'ingredients' => 'array',
    'procedures'  => 'array',
    'quality'     => 'array'
  ];
  public function getSlugAttribute()
  {
    $value = $this->name;
    return str_slug($value);
  }
}
