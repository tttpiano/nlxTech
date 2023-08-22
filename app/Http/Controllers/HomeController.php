<?php
// File: app/Http/Controllers/Admin/BannerController.php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Image_related;
use App\Models\Party;
use App\Models\PartyRelationship;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    public function filterProduct(Request $request)
    {
        $partys = [];

        $output = ''; // Chuỗi sẽ chứa tất cả các khung dữ liệu sản phẩm
        $filterBrand = $request->brand;
        $filterBrand2 = $request->brand2;
        $party1 = PartyRelationship::where('party_id', $filterBrand)->where('entity_child', 'product')->get();

        $party2 = PartyRelationship::where('party_id', $filterBrand2)->where('entity_child', 'product')->get();
        $partyIDs1 = $party1->pluck('child_id')->all();
        $partyIDs2 = $party2->pluck('child_id')->all();
        $intersection = collect($partyIDs1)->intersect($partyIDs2)->all();
        $partys = $intersection;

        $products = Product::whereIn('id', $partys)->paginate(18);
        foreach ($products as $product) {

            foreach ($product->partyRelationship as $relationship) {
                if ($relationship->party_type === 'brand') {
                    $product->brand = $relationship->party->description;
                    $imgBr[] = $product->brand;
                }
            }
            $wattageParty = PartyRelationship::where('party_type', 'wattage')
                ->where('child_id', $product->id)
                ->where('entity_child', 'product')->first();
            if ($wattageParty) {
                $wattage = Party::find($wattageParty->party_id);
                $product->wattage = $wattage;
            }
            foreach ($imgBr as $imgRelate) {
                $imgBrand = Image_related::where('entity', $imgRelate)
                    ->first();
                if ($imgBrand !== null) {
                    $image2 = Image::find($imgBrand->img_id);
                    if ($image2 !== null) {
                        $product->img = $image2;
                    }
                }
            }

            if ($product) {
                $output .= '<div class="col-sm-6 col-md-4 col-lg-3 " style="margin-top:20px;">
                <div class="mb ">
                    <div class="brand">
                        <a href="">';
                if ($product->img !== null) {
                    $output .= '<img src="' . asset('storage/img/logo_brand/' . $product->img->file_name) . '"
                    class="img-fluid" alt=""
                    width="37%">';
                }
                $output .= '</a>
                    </div>
                    <a class="link-img" href="' . route('detail', $product->url_seo) . '">
                        <div class="img-content">';
                if ($product->images->first()->image) {
                    $output .= '<img src="' . asset('images/' . $product->images->first()->image->file_name) . '"
                 class="img-fluid featured__item__pic set-bg" alt="">';
                } else {
                    $output .= '<img src="' . asset('storage/img/error.jpg') . '"
                 class="img-fluid product-img" alt="">';
                }
                $output .= '</div>
                        <span class="ribbons" style="position: absolute;top: -27px;right: 41px;">
                            <span class="ribbon" style="background-color: #ec2434">Hot</span>
                        </span>
                    </a>
                    <div class="product-name title" id="product-name-container' . $product->id . '">
                        <span>
                            <a class="disable-hover" >
                                ' . \Illuminate\Support\Str::limit(  $product->name, 50)  . '
                            </a>
                        </span>
                    </div>
                    <div class="prices title">';
                if ($product->price > 0 && $product -> price_status !== "Hidden") {
                    $output .= '<span>' . number_format($product->price) .'<i class="fa-solid fa-dong-sign"></i> </span>';
                } else {
                    $output .= '<span>Liên hệ</span>';
                }
                $output .= '</div>
                </div>
            </div>';
            }

        }
        return response($output); // Trả về phản hồi dưới dạng JSON
    }


    public function search(Request $request)
    {
        $pageTitle = "Năng Lượng Xanh";
        $keyword = $request->input('keyword');
        $products = Product::where('name', 'like', '%' . $keyword . '%')->paginate(18);

        $types = ['category', 'category_child', 'brand', 'wattage'];
        $partyData = Party::whereIn('type', $types)->get()->groupBy('type');

        return view('front.result_search', compact('products', 'keyword','pageTitle', 'partyData',));
    }
    public function searchLq(Request $request)
    {
        $pageTitle = "Năng Lượng Xanh";
        $keyword = $request->search;

        $products = Product::where('name', 'like', '%' . $keyword . '%')->paginate(18);
        $output= "";

        foreach($products as $product){
            $imageRelated = Image_related::where('related_id', $product->id)
                ->where('entity', 'product')
                ->first();

            if ($imageRelated) {
                $image = Image::find($imageRelated->img_id);
                $product->image = $image; // Gắn hình ảnh vào thuộc tính image của sản phẩm
            }
            if ($product->price_status !== 'Show' || $product->price == 0) {
                $product->price = null;
            }
            $output .= '<div class="sp" style="display: flex;align-items: center;border-bottom: 1px solid #ccc;">
                            <img src="' . asset('images/' . $product['image']->file_name) . '" alt="Product Image" style="width: 100px; height: 100px; object-fit: contain; margin-right: 10px;">
                            <div>
                                <span style="font-size: 16px; display: block; margin-bottom: 5px;">
                                    <a class="disable-hover" href="' . route('detail', $product['url_seo']) . '">
                                        ' . $product['name'] . '
                                    </a>
                                </span>';

            if ($product['price'] !== null) {
                $output .= '<span style="color: red">' . number_format($product['price']) . ' <i class="fa-solid fa-dong-sign"></i></span>';
            } else {
                $output .= '<span style="color: red">Liên Hệ</span>';
            }

            $output .= '
                            </div>
                        </div>';
        }
        return response($output);

    }
}
