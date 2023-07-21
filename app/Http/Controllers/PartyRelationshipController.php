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
        $types = ['category', 'category_child', 'brand', 'wattage'];
        $partyData = Party::whereIn('type', $types)->get()->groupBy('type');

        // Kiểm tra xem mảng $partyData có tồn tại và có key 'category' không
        if (isset($partyData['category'])) {
            // Thực hiện các tác vụ hoặc truy xuất dữ liệu từ $partyData
            // Ví dụ: lấy số lượng phần tử trong từng nhóm (group) trong $partyData
            $groupCounts = [];
            foreach ($partyData as $type => $group) {
                $groupCounts[$type] = $group->count();
            }

            // Đưa dữ liệu vào view
            return view('front.admins.party_relationship_add', compact('partyData', 'pageTitle', 'groupCounts'));
        } else {
            // Xử lý trường hợp mảng $partyData không có key 'category'
            // Ví dụ: trả về thông báo lỗi hoặc thực hiện một tác vụ khác
            return view('front.admins.party_relationship_add', compact('partyData', 'pageTitle'));
        }
    }


    public function partyEdit()
    {
        $pageTitle = "PartyController Edit";
        $types = ['category', 'category_child', 'brand', 'wattage'];
        $partyData = Party::whereIn('type', $types)->get()->groupBy('type');
        return view('front.admins.party_relationship_edit', compact('partyData', 'pageTitle'));
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
                    return response()->json(['success' => false, 'message' => 'Đã tồn tại trên dữ liệu']);
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
        }
        else{
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
                    return response()->json(['success' => false, 'message' => 'Đã tồn tại trên dữ liệu']);
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
        }
        else{
            return response()->json(['success' => false, 'message' => 'Error. Vui lòng chọn dữ liệu vào Brand']);
        }
    }


}
