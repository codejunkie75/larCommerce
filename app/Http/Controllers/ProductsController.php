<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\product;

class ProductsController extends Controller
{
    public function index($primary_category,$secondary_category){
      return $products = Product::IndexProducts($primary_category,$secondary_category)->get();
      return view('products.index',compact('products','primary_category','secondary_category'));
    }
    public function view(Product $id){
      return $id;
    }
    public function create(){
      return view('products.create');
    }

    public function store(Request $request)
    {
      /*
      $this->validate($request, [
        'name' => 'required|unique:products|max:50|min:3',
        'primary_category' => 'required|max:20|min:3',
        'secondary_category' => 'required|max:20|min:3',
        'price' => 'required|numeric|between:0,9999.99',
        'stock' => 'required|numeric|between:0,9999',
        'low_stock_level' => 'required|numeric|between:0,9999',
        'sku' => 'required|unique:products',
        'description' => 'required|max:5000|min:20',
        'sale_percentage' => 'required|numeric|between:0,100',

    ]);
    */
    $product = new Product;
    $product->name = $request->name;
    $product->primary_category = $request->primary_category;
    $product->secondary_category = $request->secondary_category;
    $product->price = $request->price;
    $product->stock = $request->stock;
    $product->low_stock_level = $request->low_stock_level;
    $product->sku = $request->sku;
    $product->description = $request->description;
    $product->active = 0;
    $product->times_viewed = 0;
    $product->times_ordered = 0;
    $product->size_variation = 0;
    $product->average_rating = 0;
    $product->image = 0;
    $product->sale_percentage = $request->sale_percentage;
    $product->weight = $request->weight;
    $product->langth = $request->langth;
    $product->width = $request->width;
    $product->height = $request->height;

    $product->save();
    return redirect('/products/images/manage/'.$product->id);
    }
}
