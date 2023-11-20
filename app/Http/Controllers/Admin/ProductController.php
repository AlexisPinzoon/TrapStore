<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('isadmin');
    }

    public function getHome(){
        return view('admin.products.home');
    }

    public function getProductAdd(){
        $cats = Category::where('section', '0')->pluck('name','id');
        $data = ['cats'=> $cats];
        return view('admin.products.add', $data);
    }
}
