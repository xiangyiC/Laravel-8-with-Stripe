<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;


class ProductController extends Controller
{
    public function add(){
        $r=request(); //receive the data by GET or POST method
        $image=$r->file('productImage');
        $image->move('images',$image->getClientOriginalName()); // images is the location
        $imageName=$image->getClientOriginalName();
        
        $addProduct=Product::create([
            'name'=>$r->productName, //name must same with database
            'description'=>$r->productDescription,//field name
            'quantity'=>$r->productQuantity,
            'price'=>$r->productPrice,
            'CategoryID'=>$r->CategoryID,
            'image'=>$imageName,
        ]);
        Return view('addProduct');
    }
}
