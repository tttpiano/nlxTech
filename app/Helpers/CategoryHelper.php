<?php

namespace App\Helpers;

use App\Models\Image;
use App\Models\Image_related;
use App\Models\Party;
use App\Models\PartyRelationship;
use App\Models\Product;

class CategoryHelper
{

    public static function getNestedCategories3($parentType = null)
    {
        $categories = Party::where('type', $parentType)
            ->get();


        $nestedCategories = [];

        foreach ($categories as $category) {
            $childParty = [];

            $children_lv1 = PartyRelationship::where('party_id', $category->id)
                ->where('entity_child', 'party')
                ->get();
            foreach ($children_lv1 as $a) {
                $party = Party::find($a->child_id);
                $childParty2 = [];
                $children_lv2 = PartyRelationship::where('party_id', $party->id)
                    ->where('entity_child', 'party')
                    ->get();
                foreach ($children_lv2 as $lv3) {
                    $party2 = Party::find($lv3->child_id);
                    $childParty2[] = $party2;
                }
                $party->children = $childParty2;
                $childParty[] = $party;
            }
            $category->children = $childParty;

        }
        return $categories;
    }
    public static function getNestedCategories2($parentType = null)
    {
        $categories = Party::where('type', $parentType)
            ->get();
        $nestedCategories = [];
        foreach ($categories as $category) {
            $childParty = [];

            $children_lv1 = PartyRelationship::where('party_id', $category->id)
                ->where('entity_child', 'party')
                ->get();
            foreach ($children_lv1 as $a) {
                $party = Party::find($a->child_id);
                $childParty2 = [];
                $childParty3 = [];
                $children_lv2 = PartyRelationship::where('party_id', $party->id)
                    ->where('entity_child', 'party')
                    ->get();
                $product = PartyRelationship::where('party_id', $party->id)
                    ->where('entity_child', 'product')
                    ->get();

                foreach ($product as $getProduct){
                    $getProduct = Product::find($getProduct->child_id);
                        $imageRelated = Image_related::where('related_id', $getProduct->id)
                            ->where('entity', 'product')
                            ->first();

                        if ($imageRelated) {
                            $image = Image::find($imageRelated->img_id);
                            $getProduct->image = $image; // Gắn hình ảnh vào thuộc tính image của sản phẩm
                        }
                    if ($getProduct->price_status !== 'Show' || $getProduct->price == 0) {
                        $getProduct->price = null;
                    }
                    $brand = PartyRelationship::where('party_type', 'brand')
                        ->where('child_id', $getProduct->id)
                        ->where('entity_child', 'product')->get();
                    foreach ($brand as $item) {
                        $brandParty = Party::find($item->party_id);
                        $getProduct->brand = $brandParty;
                        $img[] = $getProduct->brand;
                    }
                    $wattageParty = PartyRelationship::where('party_type', 'wattage')
                ->where('child_id', $getProduct->id)
                ->where('entity_child', 'product')->first();
            if ($wattageParty) {
                $wattage = Party::find($wattageParty->party_id);
                $getProduct->wattage = $wattage;
            }

                    foreach ($img as $imgRelate) {
                        $imgBrand = Image_related::where('entity', $imgRelate->description)
                            ->first();
                        if($imgBrand !== null){
                            $image2 = Image::find($imgBrand->img_id);
                            if($image2 !== null){
                                $getProduct->img = $image2;
                            }
                        }


                    }
                    $childParty3[] = $getProduct;
                }


                foreach ($children_lv2 as $lv3) {
                    $party2 = Party::find($lv3->child_id);
                    $childParty2[] = $party2;
                }
                $party->children = $childParty2;
                $childParty[] = $party;
                $party->product = $childParty3;

            }
            $category->children = $childParty;
        }

        return $categories;
    }





    //////// Menu đa cấp
    public static function getNestedCategories($parentType = null)
    {
        $categories = Party::where('type', $parentType)
            ->get();

        $nestedCategories = [];

        foreach ($categories as $category) {
            $category->children = self::getNestedChildren($category->id);
            $nestedCategories[] = $category;
        }

        return $nestedCategories;
    }

    public static function getNestedChildren($partyId)
    {
        $children = [];

        $relationships = PartyRelationship::where('party_id', $partyId)
            ->where('entity_child', 'party')
            ->get();

        foreach ($relationships as $relationship) {
            $childParty = Party::find($relationship->child_id);
            if ($childParty) {
                $childParty->children = self::getNestedChildren($childParty->id);
                $children[] = $childParty;
            }
        }

        return $children;
    }

}





