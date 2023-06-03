<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $product;

    public function index ()
    {
        return view('index');
    }

    public function store (Request $request)
    {
        $this->validate($request, [
           'name' => 'required|min:3|string',
           'price' => 'required|numeric',
           'image' => 'required',
           'shop_id' => 'required|numeric',
        ]);
        Product::createProduct($request);
        return redirect()->back()->with('message', 'Product created successfully');
    }

    public function manage ()
    {
        return view('manage', ['products' => Product::all()]);
    }

    public function edit ($id)
    {
        return view('edit', [
            'product' => Product::find($id),
        ]);
    }

    public function update (Request $request, $id)
    {
        Product::updateProduct($request, $id);
        return redirect('/product/manage')->with('message', 'Product Updated Successfully');
    }

    public function destroy ($id)
    {
        $this->product = Product::find($id);
        if ($this->product->image)
        {
            unlink($this->product->image);
        }
        $this->product->delete();
        return redirect()->back()->with('message', 'Product Deleted Successfully');
    }
}
