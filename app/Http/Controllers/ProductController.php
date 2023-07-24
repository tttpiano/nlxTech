<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Image_related;
use App\Models\Party;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Support\Carbon;

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
        $posts = Post::where('status', 'show')->get(); // Lấy  các bài viết có status là "show"
        foreach ($posts as $post) {
            $imageRelated = Image_related::where('related_id', $post->id)
                ->where('entity', 'post')
                ->first();

            if ($imageRelated) {
                $image = Image::find($imageRelated->img_id);
                $post->image = $image;
            }


            // Định dạng lại created_at thành chuỗi ngày tháng năm (vd: '17/07/2023')
        }
            // Định dạng lại created_at thành chuỗi ngày tháng năm (vd: '17/07/2023')
        return view('front.index', ['products' => $products, 'pageTitle' => $pageTitle,'posts' => $posts]);
    }
    public function productAdd()
    {
        $pageTitle = "Add Product";
        $types = ['category', 'category_child', 'brand', 'wattage'];
        $partyData = Party::whereIn('type', $types)->get()->groupBy('type');


        if (isset($partyData['category'])) {

            $groupCounts = [];
            foreach ($partyData as $type => $group) {
                $groupCounts[$type] = $group->count();
            }
            return view('front.admins.product_add', compact('partyData', 'pageTitle', 'groupCounts'));
        } else {

            return view('front.admins.product_add', compact('partyData', 'pageTitle'));
        }


    }
    public function productEdit()
    {
        $pageTitle = "Edit Product";

        // Kiểm tra và xử lý trạng thái bài viết
        return view('front.admins.product_edit', compact('pageTitle'));
    }



}
