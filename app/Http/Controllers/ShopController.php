<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ShopController extends Controller
{
    public function shop(){
        $pageTitle = "Sản Phẩm";
        $products = Product::with([
            'images',
            'partyRelationship' => function ($query) {
                $query->with('party')->where(function ($q) {
                    $q->where('party_type', 'category')
                        ->orWhere('party_type', 'category_child')
                        ->orWhere('party_type', 'brand')
                        ->orWhere('party_type', 'wattage');
                });
            },
            'partyRelationship.party'
        ])->orderBy('id', 'desc')->paginate(10);


        return view('front.shop', ['pageTitle' => $pageTitle, 'products' => $products]);

    }

}
