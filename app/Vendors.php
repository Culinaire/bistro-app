<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendors extends Model
{
  protected $table = "manual_vendors";

  public function products()
  {
    return $this->hasMany('App\Products');
  }
}
