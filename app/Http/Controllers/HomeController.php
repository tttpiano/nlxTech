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
        $output = ''; // Chuỗi sẽ chứa tất cả các khung dữ liệu sản phẩm
        $filterBrand = $request->brand;
        $filterBrand2 = $request->brand2;
        $brands = PartyRelationship::where('party_id', $filterBrand)->where('entity_child', 'product')->orderBy('id', 'desc') // Sắp xếp theo ID giảm dần
        ->take(8) // Giới hạn kết quả trả về thành 8
        ->get();
        foreach ($brands as $brand) {
            $product = Product::find($brand->child_id);
            $brandId = PartyRelationship::where('child_id',$product->id)->where('party_type','brand')->where('entity_child','product')->get();
            foreach ($brandId as $item2){
            $brandParty = Party::find($item2 -> party_id);
            $imgBrand2 = Image_related::where('entity', $brandParty-> description)
                ->first();
            if($imgBrand2 !== null){
                $image5 = Image::find($imgBrand2->img_id);
                if($image5 !== null){
                    $product->img = $image5;
                }
            }
            }
            $imgBrand = Image_related::where('entity', 'product')->where('related_id', $product->id)
                ->first();
            if($imgBrand !== null){
                $image2 = Image::find($imgBrand->img_id);
                if($image2 !== null){
                    $product->image = $image2;
                }
//            if ($product->price_status !== 'Show' || empty($product->price)) {
//                $product->price = null;
//            }
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
                if ($product->image) {
                    $output .= '<img src="' . asset('images/' . $product->image->file_name) . '"
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
                            <a class="disable-hover" href="' . route('detail', $product->url_seo) . '">
                                ' . $product->name . '
                            </a>
                        </span>
                    </div>
                    <script>
                        var originalText = document.getElementById("product-name-container' . $product->id . '").querySelector("a").innerHTML;
                        var productNameContainer = document.getElementById("product-name-container' . $product->id . '");
                        var productNameLink = productNameContainer.querySelector("a");
                        var shortenedText = ' . json_encode(substr($product->name, 0, 70)) . ' + " ...";

                        if (window.innerWidth < 1400) {
                            shortenedText = originalText.substring(0, 70) + " ...";
                        }
                        if (window.innerWidth < 1104) {
                            shortenedText = originalText.substring(0, 60) + " ...";
                        }
                        if (window.innerWidth < 767) {
                            shortenedText = ' . json_encode(substr($product->name, 0, 50)) . ' + " ...";
                        }
                        productNameLink.innerHTML = shortenedText;
                    </script>
                    <div class="prices title">';
                if ($product->price !== null) {
                    $output .= '<span>' . $product->price . '</span>';
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

}
