<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

  public function reviews()
  {
      return $this->hasMany('App\Review');
  }

  public function scopeIndexProducts($query,$primary_category,$secondary_category){
    return $query->where('primary_category',$primary_category)->where('secondary_category',$secondary_category);
  }

}
