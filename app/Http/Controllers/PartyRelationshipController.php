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

    public function viewPartyRelationship()
    {
        $pageTitle = "";
        $partyType = 'category';
        $childType = 'category_child';
        $partyType2 = 'category_child';
        $childType2 = 'brand';

        $relatedParties = PartyRelationship::where('party_type', $partyType)
            ->where('child_type', $childType)
            ->get();
        $relatedParties2 = PartyRelationship::where('party_type', $partyType2)
            ->where('child_type', $childType2)
            ->get();
        return view('front.admins.party_relationship', compact('relatedParties', 'relatedParties2', 'pageTitle'));
    }

    public function partyAdd()
    {
        $pageTitle = "PartyController";
        $types = ['category', 'category_child', 'brand', 'wattage'];
        $partyData = Party::whereIn('type', $types)->get()->groupBy('type');


        if (isset($partyData['category'])) {

            $groupCounts = [];
            foreach ($partyData as $type => $group) {
                $groupCounts[$type] = $group->count();
            }
            return view('front.admins.party_relationship_add', compact('partyData', 'pageTitle', 'groupCounts'));
        } else {

            return view('front.admins.party_relationship_add', compact('partyData', 'pageTitle'));
        }
    }


    public function partyEdit($id)
    {
        $pageTitle = "PartyController Edit";
        $relatedPartie = PartyRelationship::find($id);
        $types = ['category', 'category_child', 'brand', 'wattage'];
        $partyData = Party::whereIn('type', $types)->get()->groupBy('type');
        if (isset($partyData['category'])) {

            $groupCounts = [];
            foreach ($partyData as $type => $group) {
                $groupCounts[$type] = $group->count();
            }
            return view('front.admins.party_relationship_edit', compact('partyData', 'relatedPartie', 'pageTitle', 'groupCounts'));
        } else {
            return view('front.admins.party_relationship_edit', compact('partyData', 'relatedPartie', 'pageTitle'));
        }


    }


    public function partyEdit2($id)
    {
        $pageTitle = "PartyController Edit";
        $relatedPartie = PartyRelationship::find($id);
        $types = ['category', 'category_child', 'brand', 'wattage'];
        $partyData = Party::whereIn('type', $types)->get()->groupBy('type');
        if (isset($partyData['category'])) {

            $groupCounts = [];
            foreach ($partyData as $type => $group) {
                $groupCounts[$type] = $group->count();
            }
            return view('front.admins.party_relationship_edit2', compact('partyData', 'relatedPartie', 'pageTitle', 'groupCounts'));
        } else {
            return view('front.admins.party_relationship_edit2', compact('partyData', 'relatedPartie', 'pageTitle'));
        }


    }


    public function insert(Request $request)
    {
        $category_childs = $request->category_child;
        if (!empty($category_childs)) {
            foreach ($category_childs as $category_child) {
                $existingRecord = PartyRelationship::where([
                    'party_id' => $request->category,
                    'child_id' => $category_child,
                    'party_type' => 'category',
                    'child_type' => 'category_child',
                    'entity_child' => 'party'
                ])->first();

                // Nếu 'child_id' đã tồn tại, trả về lỗi
                if ($existingRecord) {
                    return response()->json(['success' => false, 'message' => 'Đã tồn tại ' . $existingRecord->child->description . ' trên dữ liệu']);
                } else {
                    PartyRelationship::create([
                        'party_id' => $request->category,
                        'child_id' => $category_child,
                        'party_type' => 'category',
                        'child_type' => 'category_child',
                        'entity_child' => 'party'
                    ]);
                }
            }

            // Sau khi kiểm tra toàn bộ dữ liệu trong $category_childs và không gặp trùng lặp, trả về thành công
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Error. Vui lòng chọn dữ liệu vào Category_child']);
        }
    }


    public function insert2(Request $request)
    {
        $brands = $request->brand;

        if (!empty($brands)) {
            foreach ($brands as $brand) {
                // Kiểm tra xem 'child_id' đã tồn tại trong cơ sở dữ liệu chưa
                $existingRecord = PartyRelationship::where([
                    'party_id' => $request->category_child2,
                    'child_id' => $brand,
                    'party_type' => 'category_child',
                    'child_type' => 'brand',
                    'entity_child' => 'party'
                ])->first();

                // Nếu 'child_id' đã tồn tại, trả về lỗi
                if ($existingRecord) {
                    return response()->json(['success' => false, 'message' => 'Đã tồn tại ' . $existingRecord->child->description . ' trên dữ liệu']);
                } else {
                    // Nếu 'child_id' chưa tồn tại, thêm vào cơ sở dữ liệu
                    PartyRelationship::create([
                        'party_id' => $request->category_child2,
                        'child_id' => $brand,
                        'party_type' => 'category_child',
                        'child_type' => 'brand',
                        'entity_child' => 'party'
                    ]);
                }
            }
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Error. Vui lòng chọn dữ liệu vào Brand']);
        }
    }

    public function destroy_category($id)
    {
        $category = PartyRelationship::find($id);
        $category->delete();
        return redirect()->route('admin_party_relationship')->with('success', 'Bài viết đã được xoá thành công');
    }

    public function destroy_category_child($id)
    {
        $category_child = PartyRelationship::find($id);
        $category_child->delete();
        return redirect()->route('admin_party_relationship')->with('success', 'Bài viết đã được xoá thành công');
    }
    public function updatetCategory(Request $request)
    {

        $category_childs = $request->category_child;
        if (!empty($category_childs)) {
            foreach ($category_childs as $category_child) {
                $existingRecord = PartyRelationship::where([
                    'party_id' => $request->category,
                    'child_id' => $category_child,
                    'party_type' => 'category',
                    'child_type' => 'category_child',
                    'entity_child' => 'party'
                ])->first();

                // Nếu 'child_id' đã tồn tại, trả về lỗi
                if ($existingRecord) {
                    return response()->json(['success' => false, 'message' => 'Đã tồn tại ' . $existingRecord->child->description . ' trên dữ liệu']);
                } else {
                    PartyRelationship::find($request->id)->update([
                        'party_id' => $request->category,
                        'child_id' => $category_child,
                        'party_type' => 'category',
                        'child_type' => 'category_child',
                        'entity_child' => 'party'
                    ]);
                }
            }

            // Sau khi kiểm tra toàn bộ dữ liệu trong $category_childs và không gặp trùng lặp, trả về thành công
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Error. Vui lòng chọn dữ liệu vào Category_child']);
        }

    }
    public function updatetCategory2(Request $request)
    {
        $brands = $request->brand;
        if (!empty($brands)) {
            foreach ($brands as $brand) {
                $existingRecord = PartyRelationship::where([
                    'party_id' => $request->category_child,
                    'child_id' => $brand,
                    'party_type' => 'category_child',
                    'child_type' => 'brand',
                    'entity_child' => 'party'
                ])->first();

                // Nếu 'child_id' đã tồn tại, trả về lỗi
                if ($existingRecord) {
                    return response()->json(['success' => false, 'message' => 'Đã tồn tại ' . $existingRecord->child->description . ' trên dữ liệu']);
                } else {
                    PartyRelationship::find($request->id)->update([
                        'party_id' => $request->category_child,
                        'child_id' => $brand,
                        'party_type' => 'category_child',
                        'child_type' => 'brand',
                        'entity_child' => 'party'
                    ]);
                }
            }

            // Sau khi kiểm tra toàn bộ dữ liệu trong $category_childs và không gặp trùng lặp, trả về thành công
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Error. Vui lòng chọn dữ liệu vào Category_child']);
        }

    }

}
