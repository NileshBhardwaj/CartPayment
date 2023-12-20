<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function fetch_product(){
        $product = Product::all();
        return view('/user',compact('product')); 
    }
}
