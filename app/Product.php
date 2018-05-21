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

  public static function navbar(){
  //$categorys = DB::table('products')->select('primary_category')->where('active',1)->get();
  $categorys = static::select('primary_category')->where('active',1)->get();
  $primarycategoryArray = array();
  $secondarycategoryArray = array();
  $navbarArray = array();
  //listing primary category

  foreach ($categorys as $category) {
    if (!in_array($category->primary_category, $primarycategoryArray))
        {
          $primarycategoryArray[] = $category->primary_category;
        }
      }
      foreach($primarycategoryArray as $primary_category){
        //$secondary_categorys = DB::table('products')->select('secondary_category')->where([['primary_category', $primary_category],['active',1]])->get();
          $secondary_categorys = static::select('secondary_category')->where([['primary_category', $primary_category],['active',1]])->get();
          $secondarycategoryArray = array();
        foreach($secondary_categorys as $secondary_category){
          if(!in_array($secondary_category->secondary_category, $secondarycategoryArray))
              {
                $secondarycategoryArray[] = $secondary_category->secondary_category;
              }
          }
      $navbarArray[$primary_category] = $secondarycategoryArray;
    }
  return $navbarArray;
}
}
