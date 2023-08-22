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
        $types = ['category', 'category_child', 'brand', 'wattage'];
        $partyData = Party::whereIn('type', $types)->get()->groupBy('type');

        return view('front.shop', ['pageTitle' => $pageTitle, 'products' => $products, 'partyData' => $partyData]);

    }

    public function filterProduct($id, $id1, $id2)
    {
        $pageTitle = "Sản Phẩm";
        $imgBr = [];
        $nameParty = [];
        // mảng cha
        $partys = [];
        $part123 = "";


        if ($id >= 0 && $id1 < 0 && $id2 < 0) {
            $partycate = PartyRelationship::where('party_id', $id)->where('entity_child', 'product')->get();
            $partys = $partycate->pluck('child_id')->all();

            $nameParty1 = Party::find($id);
            $part123 = $nameParty1->description;

        }
        if ($id >= 0 && $id1 >= 0 && $id2 < 0) {
            $party1 = PartyRelationship::where('party_id', $id)->where('entity_child', 'product')->get();

            $party2 = PartyRelationship::where('party_id', $id1)->where('entity_child', 'product')->get();
            $partyIDs1 = $party1->pluck('child_id')->all();
            $partyIDs2 = $party2->pluck('child_id')->all();
            $intersection = collect($partyIDs1)->intersect($partyIDs2)->all();
            $partys = $intersection;
            $nameParty1 = Party::find($id1);
            $part123 = $nameParty1->description;
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
            $part123 = $nameParty1->description . " " . $nameParty2->description;

        }
        if ($id < 0 && $id1 < 0 && $id2 >= 0) {

            $partycate = PartyRelationship::where('party_id', $id2)->where('entity_child', 'product')->get();
            if ($partycate->count() > 0) {
                $partys = $partycate->pluck('child_id')->all();

                $nameParty1 = Party::find($id2);

                $part123 = $nameParty1->description;
            } else {
                $part123 = "Hãng Không Tồn Tại !!!";
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
        $types = ['category', 'category_child', 'brand', 'wattage'];
        $partyData = Party::whereIn('type', $types)->get()->groupBy('type');

        return view('front.shop2', ['pageTitle' => $pageTitle, 'products' => $products, 'party123' => $part123,'partyData'=>$partyData]);
    }


    public function filterProduct1(Request $request)
    {

        $id = $request->input('category', -1);
        $id1 = $request->input('category_child', -1);
        $id2 = $request->input('brand', -1);
        $id3 = $request->input('wattage', -1);

        $pageTitle = "Sản Phẩm";
        $imgBr = [];
        $partys = [];

        $relationships = [
            ['id' => $id, 'entity' => 'product', 'relation' => 'category'],
            ['id' => $id1, 'entity' => 'product', 'relation' => 'category_child'],
            ['id' => $id2, 'entity' => 'product', 'relation' => 'brand'],
            ['id' => $id3, 'entity' => 'product', 'relation' => 'wattage'],
        ];

        foreach ($relationships as $relationship) {
            if ($relationship['id'] > -1) {
                $partycate = PartyRelationship::where('party_id', $relationship['id'])
                    ->where('entity_child', $relationship['entity'])
                    ->get();
                $partys[] = $partycate->pluck('child_id')->all();
            }
        }

        // Intersect all arrays in the $partys array
        if (!empty($partys)) {
            $partys = call_user_func_array('array_intersect', $partys);
        }
        $search = $request->input('search');

        if (!empty($search)) {
            $searchedProductIDs = Product::whereRaw('LOWER(name) like ?', ['%' . strtolower($search) . '%'])->pluck('id')->toArray();

            if (!empty($partys)) {
                // Tìm kiếm trong danh sách đã lọc
                $partys = array_intersect($partys, $searchedProductIDs);
            } else {
                // Tìm kiếm trong toàn bộ sản phẩm nếu không có lọc
                $partys = $searchedProductIDs;
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

        $types = ['category', 'category_child', 'brand', 'wattage'];
        $partyData = Party::whereIn('type', $types)->get()->groupBy('type');

        return view('front.shopfilter', [
            'pageTitle' => $pageTitle,
            'products' => $products,
            'partyData' => $partyData,
            'id' => $id,
            'id1' => $id1,
            'id2' => $id2,
            'id3' => $id3,
        ]);
    }


}
