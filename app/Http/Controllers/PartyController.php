<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Image_related;
use App\Models\Party;
use App\Models\Post;
use Illuminate\Http\Request;

class PartyController extends Controller
{
    //------------------------------ Category_child -----------------------------
    public function indexCategory_Child()
    {
        $pageTitle = "Category_Child";
        $category_child = Party::where('type','category_child')->get();
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
    public function indexBrand()
    {
        $pageTitle = "Brand";
        $brand = Party::where('type','brand')->get();
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
    public function destroy_brand($id){
        $brand = Party::find($id);
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
    public function indexWattage()
    {
        $wattage = Party::where('type','wattage')->get();
        $pageTitle = "";
        return view('front/admins/party/wattage', ['pageTitle' => $pageTitle,'wattage' => $wattage]);
    }

    public function addWattage()
    {
        $pageTitle = "";
        return view('front/admins/party/wattage_add', ['pageTitle' => $pageTitle]);
    }

    public function editWattage($id)
    {
        $pageTitle = "";
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

    public function indexCategory()
    {
        $pageTitle = "Category";
        $category = Party::where('type','category')->get();
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
