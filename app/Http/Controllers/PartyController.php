<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Image_related;
use App\Models\Party;
use App\Models\PartyRelationship;
use App\Models\Post;
use Illuminate\Http\Request;


class PartyController extends Controller
{


    //------------------------------ Category_child -----------------------------

    public function ajaxPaginationCategory_child()
    {
        $perPage = 5; // Đặt số mục hiển thị trên mỗi trang theo mong muốn của bạn
        $page = request('page') ?: 1;

        $category_childs = Party::where('type', 'category_child')->paginate($perPage);
        $category_childs->withPath(route('ajax.category_childs')); // Đặt đường dẫn phân trang cho các yêu cầu AJAX

        // Tính toán số thứ tự (STT) cho mỗi mục dựa trên trang hiện tại và chỉ số
        $startNumber = ($page - 1) * $perPage + 1;
        $category_childs->getCollection()->transform(function ($item, $index) use ($startNumber) {
            $item->stt = $startNumber + $index;
            return $item;
        });

        return view('front.admins.pagination.category_child', ['category_child' => $category_childs])->render();
    }

    public function pagin_category_child()
    {
        $pageTitle = "Category_Child";
        $category_child = Party::where('type','category_child')->paginate(5);
        return view('front/admins/pagination/category_child', ['pageTitle' => $pageTitle,'category_child' => $category_child])->render();
    }

    public function indexCategory_Child()
    {
        $pageTitle = "Category_Child";
        $category_child = Party::where('type','category_child')->paginate(5);
        return view('front/admins/party/category_child', ['pageTitle' => $pageTitle,'category_child' => $category_child]);
    }

    public function addCategory_child()
    {
        $pageTitle = "Add-Category_Child";
        return view('front/admins/party/category_child_add', ['pageTitle' => $pageTitle]);
    }

    public function editCategory_Child($id)
    {
        $pageTitle = "";
        $party = Party::find($id);
        return view('front/admins/party/category_child_edit', ['pageTitle' => $pageTitle,'party'=>$party]);
    }
    public function updatetCategory_Child(Request $request)
    {
        Party::find($request->id)->update([
            'description' => $request->category_child,
            'type' => 'category_child',

        ]);
        return response()->json(['success' => true]);
    }

    public function insertCategory_Child(Request $request)
    {
        $category_childs = ['category_child1', 'category_child2', 'category_child3', 'category_child4', 'category_child5'];
        foreach ($category_childs as $category_child) {
            if ($request->has($category_child) && !empty($request->$category_child)) {
                Party::create([
                    'description' => $request->$category_child,
                    'type' => 'category_child',
                ]);
            }
        }
        return response()->json(['success' => true]);
    }
    public function destroy_category_child($id){
        $category_child = Party::find($id);
        $category_child->delete();
        PartyRelationship::where(function($query) use ($id) {
            $query->where('party_id', $id)
                ->where('party_type', 'category_child')
                ->where('entity_child', 'party');
        })->orWhere(function($query) use ($id) {
            $query->where('child_id', $id)
                ->where('child_type', 'category_child')
                ->where('entity_child', 'party');
        })->orWhere(function($query) use ($id) {
            $query->where('party_id', $id)
                ->where('party_type', 'category_child')
                ->where('entity_child', 'product');
        })->delete();


        return redirect()->route('category_child')->with('success', 'Bài viết đã được xoá thành công');
    }
    public function search_category_child(Request $request)
    {
        $count = 1;
        $output = '';
        $category_child = Party::where('description', 'Like', '%' . $request->search . '%')->where('type', 'category_child')
           ->get();
        foreach ($category_child as $c) {
            $output .= '<tr>
            <td>'.$count.'</td>
            <td>'.$c->description.'</td>

            <td>
                <a href="'.route('category_child_edit', $c->id).'" class="btn btn-outline-info"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                <br><br>
                <form id="delete-form" action="'.route('category_child.destroy', $c->id).'" method="POST" style="display: inline-block;">
                    '.csrf_field().'
                    '.method_field('DELETE').'
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletes'.$c->id.'">Xoá</button>
                    <!-- Modal -->
                    <div class="modal fade" id="deletes'.$c->id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Xoá Bài Viết</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn có muốn xoá bài viết này?'.$c->id.'
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-danger">Xoá</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </td>
        </tr>';
            $count++;
        }
        return response($output);
    }


    //------------------------------ Brand -----------------------------
    public function ajaxPaginationBrand()
    {
        $perPage = 5; // Đặt số mục hiển thị trên mỗi trang theo mong muốn của bạn
        $page = request('page') ?: 1;

        $brands = Party::where('type', 'brand')->paginate($perPage);
        $brands->withPath(route('ajax.brands')); // Đặt đường dẫn phân trang cho các yêu cầu AJAX

        // Tính toán số thứ tự (STT) cho mỗi mục dựa trên trang hiện tại và chỉ số
        $startNumber = ($page - 1) * $perPage + 1;
        $brands->getCollection()->transform(function ($item, $index) use ($startNumber) {
            $item->stt = $startNumber + $index;
            return $item;
        });

        return view('front.admins.pagination.brand', ['brand' => $brands])->render();
    }

    public function pagin_brand()
    {
        $pageTitle = "Brand";
        $brand = Party::where('type','brand')->paginate(5);
        return view('front/admins/pagination/brand', ['pageTitle' => $pageTitle,'brand' => $brand])->render();
    }

    public function indexBrand()
    {
        $pageTitle = "Brand";
        $brand = Party::where('type','brand')->paginate(5);
        return view('front/admins/party/brand', ['pageTitle' => $pageTitle,'brand' => $brand]);
    }




    public function addBrand()
    {
        $pageTitle = "Add-Brand";
        return view('front/admins/party/brand_add', ['pageTitle' => $pageTitle]);
    }

    public function editBrand($id)
    {
        $pageTitle = "";
        $party = Party::find($id);
        return view('front/admins/party/brand_edit', ['pageTitle' => $pageTitle,'party'=>$party]);
    }
    public function updatetBrand(Request $request)
    {
        Party::find($request->id)->update([
            'description' => $request->brand,
            'type' => 'brand',

        ]);
        return response()->json(['success' => true]);
    }

    public function insertBrand(Request $request)
    {
        $brands = ['brand1', 'brand2', 'brand3', 'brand4', 'brand5'];
        foreach ($brands as $brand) {
            if ($request->has($brand) && !empty($request->$brand)) {
                Party::create([
                    'description' => $request->$brand,
                    'type' => 'brand',
                ]);
            }
        }
        return response()->json(['success' => true]);
    }

    public function destroy_brand($id)
    {
        $brand = Party::find($id);

        if (!$brand) {
            return redirect()->route('brand')->with('error', 'Không tìm thấy bản ghi');
        }

        PartyRelationship::where(function($query) use ($id) {
            $query->where('party_id', $id)
                ->where('party_type', 'brand')
                ->where('entity_child', 'party');
        })->orWhere(function($query) use ($id) {
            $query->where('child_id', $id)
                ->where('child_type', 'brand')
                ->where('entity_child', 'party');
        })->orWhere(function($query) use ($id) {
            $query->where('party_id', $id)
                ->where('party_type', 'brand')
                ->where('entity_child', 'product');
        })->delete();

        // Xoá bản ghi trong bảng 'party'
        $brand->delete();

        return redirect()->route('brand')->with('success', 'Bài viết đã được xoá thành công');
    }
    public function search_brand(Request $request)
    {
        $count = 1;
        $output = '';
        $brand = Party::where('description', 'Like', '%' . $request->search . '%')->where('type', 'brand')
           ->get();
        foreach ($brand as $c) {
            $output .= '<tr>
            <td>'.$count.'</td>
            <td>'.$c->description.'</td>

            <td>
                <a href="'.route('brand_edit', $c->id).'" class="btn btn-outline-info"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                <br><br>
                <form id="delete-form" action="'.route('brand.destroy', $c->id).'" method="POST" style="display: inline-block;">
                    '.csrf_field().'
                    '.method_field('DELETE').'
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletes'.$c->id.'">Xoá</button>
                    <!-- Modal -->
                    <div class="modal fade" id="deletes'.$c->id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Xoá Bài Viết</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn có muốn xoá bài viết này?'.$c->id.'
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-danger">Xoá</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </td>
        </tr>';
            $count++;
        }
        return response($output);
    }
    //------------------------------ Wattage -----------------------------

    public function ajaxPaginationWattage()
    {
        $perPage = 5; // Đặt số mục hiển thị trên mỗi trang theo mong muốn của bạn
        $page = request('page') ?: 1;

        $wattages = Party::where('type', 'wattage')->paginate($perPage);
        $wattages->withPath(route('ajax.wattages')); // Đặt đường dẫn phân trang cho các yêu cầu AJAX

        // Tính toán số thứ tự (STT) cho mỗi mục dựa trên trang hiện tại và chỉ số
        $startNumber = ($page - 1) * $perPage + 1;
        $wattages->getCollection()->transform(function ($item, $index) use ($startNumber) {
            $item->stt = $startNumber + $index;
            return $item;
        });

        return view('front.admins.pagination.wattage', ['wattage' => $wattages])->render();
    }

    public function pagin_wattage()
    {
        $pageTitle = "Wattage";
        $wattage = Party::where('type','wattage')->paginate(5);
        return view('front/admins/pagination/wattage', ['pageTitle' => $pageTitle,'wattage' => $wattage])->render();
    }

    public function indexWattage()
    {
        $wattage = Party::where('type','wattage')->paginate(5);
        $pageTitle = "Wattage";
        return view('front/admins/party/wattage', ['pageTitle' => $pageTitle,'wattage' => $wattage]);
    }

    public function addWattage()
    {
        $pageTitle = "Add Wattage";
        return view('front/admins/party/wattage_add', ['pageTitle' => $pageTitle]);
    }

    public function editWattage($id)
    {
        $pageTitle = "Edit Wattage";
        $party = Party::find($id);
        return view('front/admins/party/wattage_edit', ['pageTitle' => $pageTitle,'party'=>$party]);
    }


    public function insertWattage(Request $request)
    {
        $wattages = ['wattage1', 'wattage2', 'wattage3', 'wattage4', 'wattage5'];
        foreach ($wattages as $wattage) {
            if ($request->has($wattage) && !empty($request->$wattage)) {
                Party::create([
                    'description' => $request->$wattage,
                    'type' => 'wattage',
                ]);
            }
        }
        return response()->json(['success' => true]);
    }

    public function updatetWattage(Request $request)
    {
        Party::find($request->id)->update([
            'description' => $request->wattage,
            'type' => 'wattage',

        ]);
        return response()->json(['success' => true]);
    }

    public function destroy_wattage($id){
        $wattage = Party::find($id);
        $wattage->delete();
        PartyRelationship::where(function($query) use ($id) {
            $query->where('party_id', $id)
                ->where('party_type', 'wattage')
                ->where('entity_child', 'party');
        })->orWhere(function($query) use ($id) {
            $query->where('child_id', $id)
                ->where('child_type', 'wattage')
                ->where('entity_child', 'party');;
        })->orWhere(function($query) use ($id) {
            $query->where('party_id', $id)
                ->where('party_type', 'wattage')
                ->where('entity_child', 'product');
        })->delete();
        return redirect()->route('wattage')->with('success', 'Bài viết đã được xoá thành công');
    }
    public function search_wattage(Request $request)
    {
        $count = 1;
        $output = '';
        $wattage = Party::where('description', 'Like', '%' . $request->search . '%')->where('type', 'wattage')
            ->get();
        foreach ($wattage as $c) {
            $output .= '<tr>
            <td>'.$count.'</td>
            <td>'.$c->description.'</td>

            <td>
                <a href="'.route('category_edit', $c->id).'" class="btn btn-outline-info"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                <br><br>
                <form id="delete-form" action="'.route('wattage.destroy', $c->id).'" method="POST" style="display: inline-block;">
                    '.csrf_field().'
                    '.method_field('DELETE').'
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletes'.$c->id.'">Xoá</button>
                    <!-- Modal -->
                    <div class="modal fade" id="deletes'.$c->id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Xoá Bài Viết</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn có muốn xoá bài viết này?'.$c->id.'
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-danger">Xoá</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </td>
        </tr>';
            $count++;
        }
        return response($output);
    }
    //------------------------------ Category -----------------------------

    public function ajaxPaginationCategory()
    {
        $perPage = 5; // Đặt số mục hiển thị trên mỗi trang theo mong muốn của bạn
        $page = request('page') ?: 1;

        $categorys = Party::where('type', 'category')->paginate($perPage);
        $categorys->withPath(route('ajax.categorys')); // Đặt đường dẫn phân trang cho các yêu cầu AJAX

        // Tính toán số thứ tự (STT) cho mỗi mục dựa trên trang hiện tại và chỉ số
        $startNumber = ($page - 1) * $perPage + 1;
        $categorys->getCollection()->transform(function ($item, $index) use ($startNumber) {
            $item->stt = $startNumber + $index;
            return $item;
        });

        return view('front.admins.pagination.category', ['category' => $categorys])->render();
    }

    public function pagin_category()
    {
        $pageTitle = "Category";
        $category = Party::where('type','category')->paginate(5);
        return view('front/admins/pagination/category', ['pageTitle' => $pageTitle,'category' => $category])->render();
    }

    public function indexCategory()
    {
        $pageTitle = "Category";
        $category = Party::where('type','category')->paginate(5);
        return view('front/admins/party/category', ['pageTitle' => $pageTitle,'category' => $category]);
    }

    public function addCategory()
    {
        $pageTitle = "Add-Category";
        return view('front/admins/party/category_add', ['pageTitle' => $pageTitle]);
    }

    public function editCategory($id)
    {
        $pageTitle = "";
        $party = Party::find($id);
        return view('front/admins/party/category_edit', ['pageTitle' => $pageTitle,'party'=>$party]);
    }
    public function updatetCategory(Request $request)
    {
        Party::find($request->id)->update([
            'description' => $request->category,
            'type' => 'category',

        ]);
        return response()->json(['success' => true]);
    }

    public function insertCategory(Request $request)
    {
        $categories = ['category1', 'category2', 'category3', 'category4', 'category5'];
        foreach ($categories as $category) {
            if ($request->has($category) && !empty($request->$category)) {
                Party::create([
                    'description' => $request->$category,
                    'type' => 'category',
                ]);
            }
        }
        return response()->json(['success' => true]);
    }
    public function destroy_category($id){
        $category = Party::find($id);
        $category->delete();
        PartyRelationship::where(function($query) use ($id) {
            $query->where('party_id', $id)
                ->where('party_type', 'category')
                ->where('entity_child', 'party');
        })->orWhere(function($query) use ($id) {
            $query->where('child_id', $id)
                ->where('child_type', 'category')
                ->where('entity_child', 'party');
        })->orWhere(function($query) use ($id) {
            $query->where('party_id', $id)
                ->where('party_type', 'category')
                ->where('entity_child', 'product');
        })->delete();
        return redirect()->route('category')->with('success', 'Bài viết đã được xoá thành công');
    }
    public function search_category(Request $request)
    {
        $count = 1;
        $output = '';
        $category = Party::where('description', 'Like', '%' . $request->search . '%')->where('type', 'category')
           ->get();
        foreach ($category as $c) {
            $output .= '<tr>
            <td>'.$count.'</td>
            <td>'.$c->description.'</td>

            <td>
                <a href="'.route('category_edit', $c->id).'" class="btn btn-outline-info"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                <br><br>
                <form id="delete-form" action="'.route('category.destroy', $c->id).'" method="POST" style="display: inline-block;">
                    '.csrf_field().'
                    '.method_field('DELETE').'
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletes'.$c->id.'">Xoá</button>
                    <!-- Modal -->
                    <div class="modal fade" id="deletes'.$c->id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Xoá Bài Viết</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn có muốn xoá bài viết này?'.$c->id.'
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    <button type="submit" class="btn btn-danger">Xoá</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </td>
        </tr>';
            $count++;
        }
        return response($output);
    }
}
