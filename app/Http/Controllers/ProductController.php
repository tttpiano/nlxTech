<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Image_related;
use App\Models\Product;

class ProductController extends Controller
{
    public function getProductsWithImages()
    {
        $pageTitle = "nlxTech";
        $products = Product::all();

        foreach ($products as $product) {
            $imageRelated = Image_related::where('related_id', $product->id)
                ->where('entity', 'product')
                ->first();

            if ($imageRelated) {
                $image = Image::find($imageRelated->img_id);
                $product->image = $image; // Gắn hình ảnh vào thuộc tính image của sản phẩm
            }
            if ($product->price_status !== 'show' || empty($product->price)) {
                $product->price = null;
            }
        }
        return view('front.index', ['products' => $products, 'pageTitle' => $pageTitle]);
    }

}
