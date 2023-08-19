<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Image_related;
use App\Models\Party;
use App\Models\PartyRelationship;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shop()
    {
        $pageTitle = "Sản Phẩm";
        $imgBr = [];
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
        ])->orderBy('id', 'desc')->paginate(18);

        foreach ($products as $product) {
            foreach ($product->partyRelationship as $relationship) {
                if ($relationship->party_type === 'brand') {
                    $product->brand = $relationship->party->description;
                    $imgBr[] = $product->brand;
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
            }
            $wattageParty = PartyRelationship::where('party_type', 'wattage')
                ->where('child_id', $product->id)
                ->where('entity_child', 'product')->first();
            if ($wattageParty) {
                $wattage = Party::find($wattageParty->party_id);
                $product->wattage = $wattage;
            }
        }
        return view('front.shop', ['pageTitle' => $pageTitle, 'products' => $products]);

    }

    public function filterProduct($id, $id1, $id2)
    {
        $pageTitle = "Sản Phẩm";
        $imgBr = [];
        $nameParty = [];
        // mảng cha
        $partys = [];


        if ($id >= 0 && $id1 < 0 && $id2 < 0) {
            $partycate = PartyRelationship::where('party_id', $id)->where('entity_child', 'product')->get();
            $partys = $partycate->pluck('child_id')->all();

            $nameParty1 = Party::find($id);
            $part = $nameParty1->description;

        }
        if ($id >= 0 && $id1 >= 0 && $id2 < 0) {
            $party1 = PartyRelationship::where('party_id', $id)->where('entity_child', 'product')->get();

            $party2 = PartyRelationship::where('party_id', $id1)->where('entity_child', 'product')->get();
            $partyIDs1 = $party1->pluck('child_id')->all();
            $partyIDs2 = $party2->pluck('child_id')->all();
            $intersection = collect($partyIDs1)->intersect($partyIDs2)->all();
            $partys = $intersection;
            $nameParty1 = Party::find($id1);
            $part = $nameParty1->description;
        }

        if ($id >= 0 && $id1 >= 0 && $id2 >= 0) {
            $party1 = PartyRelationship::where('party_id', $id1)->where('entity_child', 'product')->get();
            $party2 = PartyRelationship::where('party_id', $id2)->where('entity_child', 'product')->get();
            $partyIDs1 = $party1->pluck('child_id')->all();
            $partyIDs2 = $party2->pluck('child_id')->all();
            $intersection = collect($partyIDs1)->intersect($partyIDs2)->all();
            $partys = $intersection;
            $nameParty1 = Party::find($id1);
            $nameParty2 = Party::find($id2);
            $part = $nameParty1->description . " " . $nameParty2->description;

        }
        if ($id < 0 && $id1 < 0 && $id2 >= 0) {

            $partycate = PartyRelationship::where('party_id', $id2)->where('entity_child', 'product')->get();
            if ($partycate->count() > 0) {
                $partys = $partycate->pluck('child_id')->all();

                $nameParty1 = Party::find($id2);

                $part = $nameParty1->description;
            } else {
                $part = "Hãng Không Tồn Tại !!!";
            }

        }


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
        }


        return view('front.shop2', ['pageTitle' => $pageTitle, 'products' => $products, 'party' => $part]);
    }

}
