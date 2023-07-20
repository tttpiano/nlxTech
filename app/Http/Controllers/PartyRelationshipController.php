<?php

namespace App\Http\Controllers;


use App\Models\Image;
use App\Models\Image_related;
use App\Models\Party;
use App\Models\PartyRelationship;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class PartyRelationshipController extends Controller
{
    public function partyAdd()
    {
        $pageTitle = "PartyController";

        // Kiểm tra và xử lý trạng thái bài viết
        return view('front.admins.party_relationship_add', compact('pageTitle'));
    }

    public function partyEdit()
    {
        $pageTitle = "PartyController";

        // Kiểm tra và xử lý trạng thái bài viết
        return view('front.admins.party_relationship_edit', compact('pageTitle'));
    }

//    public function insert(Request $request)
//    {
//        if ($request->categoty !== null) {
//            PartyController::create([
//                'description' => $request->categoty,
//                'type' => 'categoty'
//            ]);
//        }
//        if ($request->categoty_child !== null) {
//            PartyController::create([
//                'description' => $request->categoty_child,
//                'type' => 'categoty_child'
//            ]);
//            PartyRelationship::create([
//
//            ]);
//        }
//
//        if ($request->brand !== null) {
//            PartyController::create([
//                'description' => $request->brand,
//                'type' => 'brand'
//            ]);
//        }
//
//        if ($request->wattage !== null) {
//            PartyController::create([
//                'description' => $request->wattage,
//                'type' => 'wattage'
//            ]);
//        }
//
//        if ($request->tag !== null) {
//            PartyController::create([
//                'description' => $request->tag,
//                'type' => 'tag'
//            ]);
//        }
//        return response()->json(['success' => true]);
//
//    }

}
