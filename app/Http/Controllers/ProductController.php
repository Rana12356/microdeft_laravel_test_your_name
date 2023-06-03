<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index ()
    {
        return view('index');
    }

    public function store (Request $request)
    {
        Product::createProduct($request);
        return redirect()->back()->with('message', 'Product created successfully');
    }
}
