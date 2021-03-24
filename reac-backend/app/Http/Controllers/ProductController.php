<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //

    function productadd(Request $request)
    {
        $product= new Product;
        $product->name=$request->input('name');
        $product->description=$request->input('description');
        $product->price=$request->input('price');
        $product->file_path=$request->file('file')->store('products');
        $product->save();
        $donus= $product;
        return  $donus;
    }   
}
