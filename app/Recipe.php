<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
  protected $table = 'recipe_originals';

  protected $fillable = [
    'name','slug','meta','ingredients','procedures','quality'
  ];

  protected $casts = [
    'meta'        => 'array',
    'ingredients' => 'array',
    'procedures'  => 'array',
    'quality'     => 'array'
  ];

  public function uoms()
  {
    $array = [
      'oz' => 'oz',
      'ozm' => 'ozm',
      'lb' => 'lb',
      'lbm' => 'lbm',
      'qt' => 'qt',
      'qts' => 'qts',
      'gal' => 'gal',
      'gals' => 'gals',
      'cup' => 'cup',
      'cups' => 'cups'
    ];
    return $array;
  }

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

  public function getChitNameAttribute()
  {
    return $this->meta['chit_name'];
  }

  public function getCookTimeAttribute()
  {
    return $this->meta['cook_time'];
  }

  public function getPluAttribute()
  {
    return $this->meta['plu'];
  }

  public function getMenuPriceAttribute()
  {
    return $this->meta['menu_price'];
  }

  public function getServicePieceAttribute()
  {
    return $this->meta['service_piece'];
  }

  public function getTogoSpecAttribute()
  {
    return $this->meta['togo_spec'];
  }

  public function getMenuTypeAttribute()
  {
    return $this->meta['menu_type'];
  }

  public function getStationAttribute()
  {
    return $this->meta['station'];
  }

  public function getImageAttribute()
  {
    return $this->meta['image'];
  }

  public function image()
  {
    $image = "";
    if($this->image != "") {
      $image = '<img src="'.$this->image.'" />';
    }
    return $image;
  }

}
