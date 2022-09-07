<?php

namespace App\Http\Controllers;

use App\Models\BrandProduct;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function add()
    {
        $categoryProducts = CategoryProduct::orderBy('id', 'desc')->get();
        $brandProducts = BrandProduct::orderBy('id', 'desc')->get();
        return view('admin.product.add', compact(['categoryProducts', 'brandProducts']));
    }

    public function all()
    {
        $products = ProductController::all();
        return view('admin.product.all', compact('products'));
    }
}
