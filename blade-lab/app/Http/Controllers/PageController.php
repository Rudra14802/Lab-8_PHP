<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        $products = [
            ['id' => 1, 'name' => 'Product A','price' => 100],
            ['id' => 2, 'name' => 'Product B','price' => 150],
            ['id' => 3, 'name' => 'Product C','price' => 200],
            
        ];
        return view('home',['products' => $products]);
    }

    public function about(){
        return view('about');
    }
}
