<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function index($category, $product)
    {
        $category = Category::where('categoryName', $category)->first();
        $product = Product::where('id', $product)->first();
        return view('product', compact('category', 'product'));
    }
}
