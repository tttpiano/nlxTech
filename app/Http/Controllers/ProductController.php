<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Image;
use App\Models\Image_related;
use App\Models\Party;
use App\Models\PartyRelationship;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{

    public function getAllProductAdmin()
    {
        // Lấy tất cả sản phẩm cùng với các liên kết (img, category, categoryChild, brand, wattage)
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
        ])->get();

        $pageTitle = "admin_product";
        return view('front.admins.product', ['pageTitle' => $pageTitle, 'products' => $products]);
    }


    public function getProductsWithImages()
    {
        $pageTitle = "nlxTech";
        $products = Product::all();

        foreach ($products as $product) {
            $imageRelated = Image_related::where('related_id', $product->id)
                ->where('entity', 'product')
                ->first();

            if ($imageRelated) {
                $image = Image::find($imageRelated->img_id);
                $product->image = $image; // Gắn hình ảnh vào thuộc tính image của sản phẩm
            }
            if ($product->price_status !== 'show' || empty($product->price)) {
                $product->price = null;
            }
        }
        $posts = Post::where('status', 'show')->get(); // Lấy  các bài viết có status là "show"
        foreach ($posts as $post) {
            $imageRelated = Image_related::where('related_id', $post->id)
                ->where('entity', 'post')
                ->first();

            if ($imageRelated) {
                $image = Image::find($imageRelated->img_id);
                $post->image = $image;
            }


            // Định dạng lại created_at thành chuỗi ngày tháng năm (vd: '17/07/2023')
        }
        $slides = Banner::where('active', true)->orderBy('order')->get();
        // Định dạng lại created_at thành chuỗi ngày tháng năm (vd: '17/07/2023')
        return view('front.index', ['products' => $products, 'pageTitle' => $pageTitle, 'posts' => $posts, 'slides' => $slides]);
    }

    public function productAdd()
    {
        $pageTitle = "Add Product";
        $types = ['category', 'category_child', 'brand', 'wattage'];
        $partyData = Party::whereIn('type', $types)->get()->groupBy('type');


        if (isset($partyData['category'])) {

            $groupCounts = [];
            foreach ($partyData as $type => $group) {
                $groupCounts[$type] = $group->count();
            }
            return view('front.admins.product_add', compact('partyData', 'pageTitle', 'groupCounts'));
        } else {

            return view('front.admins.product_add', compact('partyData', 'pageTitle'));
        }


    }

    public function productEdit($id)
    {
        $pageTitle = "Edit Product";
        $product = Product::find($id);

        $types = ['category', 'category_child', 'brand', 'wattage'];
        $partyData = Party::whereIn('type', $types)->get()->groupBy('type');

        $productPartyRelationships = PartyRelationship::where('child_id', $id)
            ->whereIn('party_type', $types)
            ->get();

        $imageInfo = null;
        $imageRelated = $product->relatedImages()->where('entity', 'product')->first();
        if ($imageRelated) {
            $imageInfo = [
                'id' => $imageRelated->image->id,
                'file_name' => $imageRelated->image->file_name,
                // Add any other image properties you want to use in the view
            ];
        }

        $linkedCategories = [];
        $relationshipIdsByType = [];

        foreach ($productPartyRelationships as $relationship) {
            $linkedCategories[] = $relationship->party_id;
            $relationshipIdsByType[$relationship->party_type][$relationship->party_id] = $relationship->id;
        }

        if (isset($partyData['category'])) {
            $groupCounts = [];
            foreach ($partyData as $type => $group) {
                $groupCounts[$type] = $group->count();
            }
            return view('front.admins.product_edit', compact('partyData', 'product', 'pageTitle', 'groupCounts', 'linkedCategories', 'imageInfo', 'relationshipIdsByType'));
        } else {
            return view('front.admins.product_edit', compact('partyData', 'product', 'pageTitle', 'linkedCategories', 'imageInfo', 'relationshipIdsByType'));
        }
    }


    public function insert(Request $request)
    {
        // Check if the product with the same name and price already exists
        $existingProduct = Product::where('name', $request->name)
            ->where('price', $request->price)
            ->first();

        if ($existingProduct) {
            return response()->json(['success' => false, 'message' => 'Đã tồn tại ' . $existingProduct->name . ' trên dữ liệu']);
        }
        $img = Image::create([
            'file_name' => $request->session()->get('fileName1'),
            'level' => 1,
        ]);

        if ($img !== null) {
            $product = Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'price_status' => $request->price_status,
                'url_seo' => $request->url_seo,
            ]);
            Image_related::create([
                'img_id' => $img->id,
                'related_id' => $product->id,
                'entity' => "product",
            ]);
            // Các cặp key-value tương ứng với các trường bạn muốn kiểm tra
            $relationships = [
                [
                    'party_id' => $request->category_child,
                    'child_id' => $product->id,
                    'party_type' => 'category_child',
                    'child_type' => 'product',
                    'entity_child' => 'product'
                ],
                [
                    'party_id' => $request->category,
                    'child_id' => $product->id,
                    'party_type' => 'category',
                    'child_type' => 'product',
                    'entity_child' => 'product'
                ],
                [
                    'party_id' => $request->brand,
                    'child_id' => $product->id,
                    'party_type' => 'brand',
                    'child_type' => 'product',
                    'entity_child' => 'product'
                ],
                [
                    'party_id' => $request->wattage,
                    'child_id' => $product->id,
                    'party_type' => 'wattage',
                    'child_type' => 'product',
                    'entity_child' => 'product'
                ],
            ];

            // Lặp qua các cặp key-value và kiểm tra 'child_id' đã tồn tại hay chưa
            foreach ($relationships as $relationship) {
                $existingRecord = PartyRelationship::where($relationship)->first();

                // Nếu 'child_id' chưa tồn tại, thêm vào
                if (!$existingRecord) {
                    PartyRelationship::create($relationship);
                }
            }

            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function storeImage(Request $request)
    {
        if ($request->hasFile('fileUpload')) {
            $originName = $request->file('fileUpload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('fileUpload')->getClientOriginalExtension();
            $fileName = $fileName . '.' . $extension;
            // Public Folder
            $request->file('fileUpload')->move(public_path('images'), $fileName);
            $request->session()->put('fileName1', $fileName);

            return back()->with('success', 'Image uploaded Successfully!')
                ->with('images', $fileName);
        }
    }


    public function update(Request $request)
    {
        $product = Product::find($request->id);
        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Không tìm thấy sản phẩm']);
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'price_status' => $request->price_status,
            'url_seo' => $request->url_seo,
        ]);

        $category = PartyRelationship::find($request->categoryPartyRelationshipId);
        if ($category) {
            $category->update([
                'party_id' => $request->category,
                'child_id' => $request->id,
                'party_type' => 'category',
                'child_type' => 'product',
                'entity_child' => 'product'
            ]);
        } else {
            $category = new PartyRelationship([
                'party_id' => $request->category,
                'child_id' => $request->id,
                'party_type' => 'category',
                'child_type' => 'product',
                'entity_child' => 'product'
            ]);
            $category->save();
        }


        $category_child = PartyRelationship::find($request->categoryChildPartyRelationshipId);
        if ($category_child) {
            $category_child->update([
                'party_id' => $request->category_child,
                'child_id' => $request->id,
                'party_type' => 'category_child',
                'child_type' => 'product',
                'entity_child' => 'product'
            ]);
        } else {
            $category_child = new PartyRelationship([
                'party_id' => $request->category_child,
                'child_id' => $request->id,
                'party_type' => 'brand',
                'child_type' => 'product',
                'entity_child' => 'product'
            ]);
            $category_child->save();
        }

        $brand = PartyRelationship::find($request->brandPartyRelationshipId);
        if ($brand) {
            $brand->update([
                'party_id' => $request->brand,
                'child_id' => $request->id,
                'party_type' => 'brand',
                'child_type' => 'product',
                'entity_child' => 'product'
            ]);
        } else {
            $brand = new PartyRelationship([
                'party_id' => $request->brand,
                'child_id' => $request->id,
                'party_type' => 'brand',
                'child_type' => 'product',
                'entity_child' => 'product'
            ]);
            $brand->save();
        }

        $wattage = PartyRelationship::find($request->wattagePartyRelationshipId);
        if ($wattage) {
            $wattage->update([
                'party_id' => $request->wattage,
                'child_id' => $request->id,
                'party_type' => 'wattage',
                'child_type' => 'product',
                'entity_child' => 'product'
            ]);
        } else {
            $wattage = new PartyRelationship([
                'party_id' => $request->wattage,
                'child_id' => $request->id,
                'party_type' => 'brand',
                'child_type' => 'product',
                'entity_child' => 'product'
            ]);
            $wattage->save();
        }
        $img = Image::find($request->imgID);
        if ($img) {
            $img->update([
                'file_name' => $request->session()->get('fileName1'),
                'level' => 1,
            ]);
        }
        return response()->json(['success' => true]);
    }

    public function destroy($id, Request $request)
    {
        $product = Product::find($id);

        // Xóa hình ảnh liên quan từ bảng img_related
        $imageRelated = Image_related::where('related_id', $product->id)
            ->where('entity', 'product')
            ->first();

        if ($imageRelated) {
            $image = Image::find($imageRelated->img_id);
            if ($image) {
                $image->delete();
            }
            $imageRelated->delete();
        }
        $productPartyRelationships = PartyRelationship::where('child_id', $id)
            ->whereIn('party_type', ['category', 'category_child', 'brand', 'wattage'])
            ->get();

        foreach ($productPartyRelationships as $relationship) {
            $relationship->delete();
        }

        $product->delete();
        return redirect()->route('admin_product')->with('success', 'Xoá thành công');
    }

    public function search(Request $request)
    {
        $count = 1;
        $output = '';
        $searchTerm = $request->search;
        $products = Product::where('name', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('price_status', 'LIKE', '%' . $searchTerm . '%')
            ->orWhereHas('partyRelationship.party', function ($query) use ($searchTerm) {
                $query->where('description', 'LIKE', '%' . $searchTerm . '%');
            })
            ->get();
        foreach ($products as $product) {
            $output .= '<tr>
            <td>' . $count++ . '</td>
            <td>' . $product->name . '</td>
            <td>';

            if ($product->images->count() > 0) {
                $output .= '<img style="width: 100px;" src="' . asset('images/' . $product->images->first()->image->file_name) . '" alt="Image">';
            }

            $output .= '</td>
            <td>' . $product->description . '</td>
            <td>' . $product->price . '</td>
            <td>' . $product->price_status . '</td>
            <td>' . $product->url_seo . '</td>
            <td>';
            $category = $product->partyRelationship->where('party_type', 'category');
            foreach ($category as $categorys) {
                $output .= $categorys->party->description . '<br>';
            }

            if ($category->isEmpty()) {
                $output .= '<strong style="color: red !important;">Trống</strong><br>';
            }

            $output .= '</td>
            <td>';
            $categoryChilds = $product->partyRelationship->where('party_type', 'category_child');
            foreach ($categoryChilds as $categoryChild) {
                $output .= $categoryChild->party->description . '<br>';
            }

            if ($categoryChilds->isEmpty()) {
                $output .= '<strong style="color: red !important;">Trống</strong><br>';
            }

            $output .= '</td>
            <td>';


            $brands = $product->partyRelationship->where('party_type', 'brand');
            foreach ($brands as $brand) {
                $output .= $brand->party->description . '<br>';
            }

            if ($brands->isEmpty()) {
                $output .= '<strong style="color: red !important;">Trống</strong><br>';
            }

            $output .= '</td>
            <td>';

            $wattages = $product->partyRelationship->where('party_type', 'wattage');
            foreach ($wattages as $wattage) {
                $output .= $wattage->party->description . '<br>';
            }

            if ($wattages->isEmpty()) {
                $output .= '<strong style="color: red !important;">Trống</strong><br>';
            }

            $output .= '</td>
            <td>
                <a href="' . route('product_edit', $product->id) . '" class="btn btn-outline-info"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                <br><br>
                <form id="delete-form" action="' . route('product.destroy', $product->id) . '" method="POST" style="display: inline-block;">
                    ' . csrf_field() . '
                    ' . method_field('DELETE') . '
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete' . $product->id . '">Xoá</button>
                    <!-- Modal -->
                    <div class="modal fade" id="delete' . $product->id . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Xoá Bài Viết</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn có muốn xoá <strong><b>' . $product->name . '</b></strong> này?
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
        }
        return response($output);
    }
}
