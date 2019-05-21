<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all()->toArray();
        $products = Product::all()->toArray();
        return view('home', compact('categories', 'products'));
    }
}
