<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; //import database library
use App\Models\Category; //import category model

class CategoryController extends Controller
{
    public function add(){
        $r=request(); //receive the data by GET or POST method
        $addCategory=Category::create([
            'name'=>$r->categoryName,
        ]);
        Return view('addCategory');
    }

    public function view(){
        $viewCategory=Category::all(); //generate sql select * from categories
        Return view('showCategory')->with('categories', $viewCategory);
    }
}
