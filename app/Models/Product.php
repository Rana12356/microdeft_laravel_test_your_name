<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    private static $product, $image, $imageName, $directory, $imageUrl;

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageName = rand(1000, 999).self::$image->getClientOriginalName();
        self::$directory = 'upload/product-images/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function createProduct($request)
    {
        self::$product = new Product();
        self::$product->name = $request->name;
        self::$product->price = $request->price;
        self::$product->image = self::getImageUrl($request);
        self::$product->shop_id = $request->shop_id;
        self::$product->save();
    }

    public static function updateProduct($request, $id)
    {
        self::$product = Product::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$product->image))
            {
                unlink(self::$product->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        } else {
            if (self::$imageUrl == null)
            {
                self::$imageUrl = null;
            } else{
                self::$imageUrl = self::$product->image;
            }
        }
        self::$product->name = $request->name;
        self::$product->price = $request->price;
        self::$product->image = self::$imageUrl;
        self::$product->shop_id = $request->shop_id;
        self::$product->save();
    }
}
