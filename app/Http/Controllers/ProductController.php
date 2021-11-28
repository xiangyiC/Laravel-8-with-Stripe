<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use Session;

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
        Session::flash('success',"Product created sucessfully!");
        
        //Return view('addProduct');
        Return redirect()->route('showProduct');
    }

    public function view(){
        //$viewProduct=Product::all();
        $viewProduct=DB::table('products') //select everything from table
        ->leftjoin('categories','categories.id','=','products.CategoryID')
        ->select('products.*','categories.name as categoryName')
        ->get();

        Return view('showProduct')->with('products',$viewProduct); 
        
    }
}
