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
    
    function list()
    {
        return Product::all();
    }
    function delete($id)
    {
        $result=Product::where('id',$id)->delete();
        if($result){
            return ["ürün silindi.."];

        }
    }
    function getProduct($id)
    {
        //$list=Product::where('id',$id)->first()-get();
        return  Product::find($id);
    }

    function search($key)
    {
        $list=Product::where('name','Like','%$key%')-get();
        return $list;
    }
  
}
