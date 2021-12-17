<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; //import database library
use App\Models\Category; //import category model
use Session;

class CategoryController extends Controller
{
    public function add(){
        $r=request(); //receive the data by GET or POST method
        $addCategory=Category::create([
            'name'=>$r->categoryName,
        ]);
        
        Session::flash('success',"Category created sucessfully!");
        //Return view('addCategory');
        Return redirect()->route('showCategory');
    }

    public function view(){
        $viewCategory=Category::all(); //generate sql select * from categories
        Return view('showCategory')->with('categories', $viewCategory);
    }
}
