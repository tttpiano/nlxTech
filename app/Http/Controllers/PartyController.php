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
    public function indexCategory_child()
    {
        $pageTitle = "Category_child";
        return view('front/admins/party/category_child', ['pageTitle' => $pageTitle]);
    }

    public function addCategory_child()
    {
        $pageTitle = "ADD_Category_child";
        return view('front/admins/party/category_child_add', ['pageTitle' => $pageTitle]);
    }

    public function editCategory_child()
    {
        $pageTitle = "EDIT_Category_child";
        return view('front/admins/party/category_child_edit', ['pageTitle' => $pageTitle]);
    }


    //------------------------------ Brand -----------------------------
    public function indexBrand()
    {
        $pageTitle = "Brand";
        return view('front/admins/party/brand', ['pageTitle' => $pageTitle]);
    }

    public function addBrand()
    {
        $pageTitle = "";
        return view('front/admins/party/brand_add', ['pageTitle' => $pageTitle]);
    }

    public function editBrand()
    {
        $pageTitle = "";
        return view('front/admins/party/brand_edit', ['pageTitle' => $pageTitle]);
    }

    //------------------------------ Wattage -----------------------------
    public function indexWattage()
    {
        $pageTitle = "";
        return view('front/admins/party/wattage', ['pageTitle' => $pageTitle]);
    }

    public function addWattage()
    {
        $pageTitle = "";
        return view('front/admins/party/wattage_add', ['pageTitle' => $pageTitle]);
    }

    public function editWattage()
    {
        $pageTitle = "";
        return view('front/admins/party/wattage_edit', ['pageTitle' => $pageTitle]);
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
        $category = Party::where('description', 'Like', '%' . $request->search . '%')
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
