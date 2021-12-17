<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use Session;
use App\Models\Category;

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

    public function delete($id){
        
        $deleteProduct=Product::find($id);
        $deleteProduct->delete();
        Session::flash('success',"Product was deleted sucessfully!");
        Return redirect()->route('showProduct');
    }

    public function edit($id){
        $products=Product::all()->where('id',$id);
        return view('editProduct')->with('products',$products)
        ->with('CategoryID',Category::all());
    }

    public function update(){
        $r=request();
        $products =Product::find($r->productID);
        
        if($r->file('productImage')!=''){
            $image=$r->file('productImage');        
            $image->move('images',$image->getClientOriginalName());                   
            $imageName=$image->getClientOriginalName(); 
            $products->image=$imageName;
            }    
        
        $products->name=$r->productName;
        $products->description=$r->productDescription;
        $products->price=$r->productPrice;
        $products->quantity=$r->productQuantity;
        $products->CategoryID=$r->CategoryID;
        $products->save();

        Return redirect()->route('showProduct');
    }

    public function productdetail($id){
        $products=Product::all()->where('id',$id);
        return view('productDetail')->with('products',$products);
    }

    public function viewProduct(){
        $products = Product::all();
        return view('viewProducts')->with('products', $products);
    }
}
