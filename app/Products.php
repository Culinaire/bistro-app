<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
  protected $table = "manual_products";
  protected $casts = [
    'purchase_price' => 'double'
  ];

  // Accessors
  public function getPurchasePriceAttribute($value)
  {
    $float = floatval($value);
    setlocale(LC_MONETARY, 'en_US');
    $price = money_format('%.2n', $float);
    return $price;
  }

  // Relationships
  public function vendor()
  {
    return $this->hasOne('App\Vendors', 'id', 'vendor_id');
  }
}
