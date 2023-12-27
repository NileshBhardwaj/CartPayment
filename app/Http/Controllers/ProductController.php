<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function fetch_product(){
        // dd("igcsdvc");
        $product = Product::all();
        // dd($product);
        return view('products',compact('product')); 
    }
}
