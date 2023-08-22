<?php

namespace App\Http\Controllers;

use App\Helpers\CategoryHelper;
use App\Models\Banner;
use App\Models\Image;
use App\Models\Image_related;
use App\Models\Party;
use App\Models\PartyRelationship;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class ProductController extends Controller
{
     // trang gioi thieu
    public function introduce_header(){
        $pageTitle = "Giới Thiệu";
        return view('front.introduce', ['pageTitle' => $pageTitle]);
    }
    public function product_detail($url_seo)
    {

        $pageTitle = "";
        $product = Product::where('url_seo', Str::slug($url_seo))->firstOrFail();
        $imageRelated = Image_related::where('related_id', $product->id)
            ->where('entity', 'product')
            ->first();
        if ($product) {
            
            $product->increment('view_count'); // Tăng giá trị cột view_count lên 1
        }
        if ($imageRelated) {
            $image = Image::find($imageRelated->img_id);
            $product->image = $image; // Gắn hình ảnh vào thuộc tính image của sản phẩm
        }
        $party = PartyRelationship::where('child_id', $product->id)->where('entity_child', 'product')
            ->where('party_type', 'category_child')->get();
        foreach ($party as $item) {
            // Truy vấn để lấy chi tiết sản phẩm từ cơ sở dữ liệu bằng cột 'party_id'
            $partyDetail = PartyRelationship::where('party_id', $item->party_id)
                ->where('entity_child', 'product')
                ->get();
            $value = [];
            $img = [];
            foreach ($partyDetail as $detail) {
                // Lấy chi tiết sản phẩm thông qua cột 'child_id'
                $productDetail = Product::find($detail->child_id);
                $brand = PartyRelationship::where('party_type', 'brand')
                    ->where('child_id', $productDetail->id)
                    ->where('entity_child', 'product')->get();
                foreach ($brand as $item) {
                    $brandParty = Party::find($item->party_id);
                    $productDetail->brand = $brandParty;
                    $img[] = $productDetail->brand;
                }
                $wattageParty = PartyRelationship::where('party_type', 'wattage')
                    ->where('child_id', $productDetail->id)
                    ->where('entity_child', 'product')->first();
                if ($wattageParty) {
                    $wattage = Party::find($wattageParty->party_id);
                    $productDetail->wattage = $wattage;
                }

                foreach ($img as $imgRelate) {
                    $imgBrand = Image_related::where('entity', $imgRelate->description)
                    ->first();
                    if($imgBrand !== null){
                        $image2 = Image::find($imgBrand->img_id);
                        if($image2 !== null){
                             $productDetail->img = $image2;
                        }
                    }


                }

                $value[] = $productDetail;
                // dd($value);
                $imageRelatedship = Image_related::where('related_id', $detail->child_id)
                    ->where('entity', 'product')
                    ->first();

                if ($imageRelatedship) {
                    $image = Image::find($imageRelatedship->img_id);
                    $productDetail->image = $image; // Gắn hình ảnh vào thuộc tính image của sản phẩm
                }
            }
        }
        if ($product->price_status !== 'Show' || $product->price == 0) {
            $product->price = null;
        }

        if (!$product) {
            return response()->json(['message' => 'Không tìm thấy sản phẩm'], 404);
        }
        return view('front.product_detail', ['product' => $product, 'pageTitle' => $pageTitle, 'value' => $value]);
    }
    public function getFullDescription($id)
    {
        $product = Product::find($id);
        return response()->json(['full_description' => $product->description]);
    }
    public function ajaxPaginationProduct()
    {
        $perPage = 10; // Đặt số mục hiển thị trên mỗi trang theo mong muốn của bạn
        $page = request('page') ?: 1;

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
        ])->orderBy('id', 'desc')->paginate($perPage);
        $products->withPath(route('ajax.products')); // Đặt đường dẫn phân trang cho các yêu cầu AJAX

        // Tính toán số thứ tự (STT) cho mỗi mục dựa trên trang hiện tại và chỉ số
        $startNumber = ($page - 1) * $perPage + 1;
        $products->getCollection()->transform(function ($item, $index) use ($startNumber) {
            $item->stt = $startNumber + $index;
            return $item;
        });

        return view('front.admins.pagination.product', ['products' => $products])->render();
    }

    public function pagin_product()
    {
        $product = Product::with([
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
        ])->paginate(10);

        $pageTitle = "admin_product";
        return view('front.admins.pagination.product', ['pageTitle' => $pageTitle, 'product' => $product])->render();
    }

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
        ])->orderBy('id', 'desc')->paginate(10);

        $pageTitle = "admin_product";
        return view('front.admins.product', ['pageTitle' => $pageTitle, 'products' => $products]);
    }


    public function getProductsWithImages()
    {
        $pageTitle = "Năng Lượng Xanh";
        $products = Product::all();

        foreach ($products as $product) {
            $imageRelated = Image_related::where('related_id', $product->id)
                ->where('entity', 'product')
                ->first();

            if ($imageRelated) {
                $image = Image::find($imageRelated->img_id);
                $product->image = $image; // Gắn hình ảnh vào thuộc tính image của sản phẩm
            }
//            if ($product->price_status !== 'Show') {
//                $product->price = null;
//            }
            
        }
        //Product in slide
            $productInSlide = Product::where('price', 0)->orWhere('price_status','Hidden')->orderBy('id','Desc')->take(3)->get();
        foreach ($productInSlide as $productSlide) {

            $imageRelated = Image_related::where('related_id', $productSlide->id)
                ->where('entity', 'product')
                ->first();

            if ($imageRelated) {
                $image = Image::find($imageRelated->img_id);
                $productSlide->image = $image; // Gắn hình ảnh vào thuộc tính image của sản phẩm
            }

        }

        $productInSlide1 = Product::where('price', 0)->orWhere('price_status','Hidden')->orderBy('id','Desc')->skip(3)->take(3)->get();
        foreach ($productInSlide1 as $productSlide1) {

            $imageRelated = Image_related::where('related_id', $productSlide1->id)
                ->where('entity', 'product')
                ->first();

            if ($imageRelated) {
                $image = Image::find($imageRelated->img_id);
                $productSlide1->image = $image; // Gắn hình ảnh vào thuộc tính image của sản phẩm

            }

        }
        $productInSlide2 = Product::where('price', 0)->orWhere('price_status','Hidden')->orderBy('id','Desc')->skip(6)->take(3)->get();
        foreach ($productInSlide2 as $productSlide1) {

            $imageRelated = Image_related::where('related_id', $productSlide1->id)
                ->where('entity', 'product')
                ->first();

            if ($imageRelated) {
                $image = Image::find($imageRelated->img_id);
                $productSlide1->image = $image; // Gắn hình ảnh vào thuộc tính image của sản phẩm

            }

        }
        $productInSlide3 = Product::where('price', 0)->orWhere('price_status','Hidden')->orderBy('id','Desc')->skip(9)->take(3)->get();
        foreach ($productInSlide3 as $productSlide1) {

            $imageRelated = Image_related::where('related_id', $productSlide1->id)
                ->where('entity', 'product')
                ->first();

            if ($imageRelated) {
                $image = Image::find($imageRelated->img_id);
                $productSlide1->image = $image; // Gắn hình ảnh vào thuộc tính image của sản phẩm

            }

        }
        $productInSlide4 = Product::where('price', 0)->orWhere('price_status','Hidden')->orderBy('id','Desc')->skip(12)->take(3)->get();
        foreach ($productInSlide4 as $productSlide1) {

            $imageRelated = Image_related::where('related_id', $productSlide1->id)
                ->where('entity', 'product')
                ->first();

            if ($imageRelated) {
                $image = Image::find($imageRelated->img_id);
                $productSlide1->image = $image; // Gắn hình ảnh vào thuộc tính image của sản phẩm

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

        $getNestedProduct = CategoryHelper::getNestedCategories2('category');
        $slides = Banner::where('active', true)->orderBy('order')->get();
        // Định dạng lại created_at thành chuỗi ngày tháng năm (vd: '17/07/2023')
        $types = ['category', 'category_child', 'brand', 'wattage'];
        $partyData = Party::whereIn('type', $types)->get()->groupBy('type');

        return view('front.index',
            ['products' => $products,
                'pageTitle' => $pageTitle,
                'posts' => $posts,
                'slides' => $slides,
                'getNestedProduct' => $getNestedProduct,
                'productInSlide1' => $productInSlide1,
                'productInSlide' => $productInSlide,
                'productInSlide2' => $productInSlide2,
                'productInSlide3' => $productInSlide3,
                'productInSlide4' => $productInSlide4,
                'partyData' => $partyData,
            ]);
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
            'file_name' => $request->img,
            'level' => 1,
        ]);

        if ($img !== null) {
            $product = Product::create([
                'name' => $request->name,
                'description' => $request->description,
                'descrips' => $request->descrips,
                'price' => $request->price,
                'price_status' => $request->price_status,
                'url_seo' => Str::slug($request->url_seo)
            ]);
            Image_related::create([
                'img_id' => $img->id,
                'related_id' => $product->id,
                'entity' => "product",
            ]);
            // Các cặp key-value tương ứng với các trường bạn muốn kiểm tra
            $relationships = [
                [
                    'party_id' => $request->category,
                    'child_id' => $product->id,
                    'party_type' => 'category',
                    'child_type' => 'product',
                    'entity_child' => 'product'
                ],
                [
                    'party_id' => $request->category_child,
                    'child_id' => $product->id,
                    'party_type' => 'category_child',
                    'child_type' => 'product',
                    'entity_child' => 'product'
                ],

            ];
            if (!empty($request->brand)) {
                $relationships[] = [
                    'party_id' => $request->brand,
                    'child_id' => $product->id,
                    'party_type' => 'brand',
                    'child_type' => 'product',
                    'entity_child' => 'product'
                ];
            }

            if (!empty($request->wattage)) {
                $relationships[] = [
                    'party_id' => $request->wattage,
                    'child_id' => $product->id,
                    'party_type' => 'wattage',
                    'child_type' => 'product',
                    'entity_child' => 'product'
                ];
            }

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
            $fileName = str_replace(' ', '-', $fileName); // Thay thế khoảng trắng bằng dấu '-'
            $fileName = $fileName . '.' . $extension;
            // Public Folder
            $request->file('fileUpload')->move(public_path('images'), $fileName);
            $request->session()->put('fileName1', $fileName);

            return back()->with('success', 'Image uploaded Successfully!')
                ->with('images', $fileName);
        }
    }

    public function storeImage2(Request $request)
    {
        if ($request->hasFile('fileUpload')) {
            $originName = $request->file('fileUpload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('fileUpload')->getClientOriginalExtension();
            $fileName = str_replace(' ', '-', $fileName); // Thay thế khoảng trắng bằng dấu '-'
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
            'descrips' => $request->descrips,
            'price' => $request->price,
            'price_status' => $request->price_status,
            'url_seo' => Str::slug($request->url_seo),
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
                'party_type' => 'category_child',
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
            if ($request->brand !== null) {
                $brand = new PartyRelationship([
                    'party_id' => $request->brand,
                    'child_id' => $request->id,
                    'party_type' => 'brand',
                    'child_type' => 'product',
                    'entity_child' => 'product'
                ]);
                $brand->save();
            }
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
            if ($request->wattage !== null) {
                $wattage = new PartyRelationship([
                    'party_id' => $request->wattage,
                    'child_id' => $request->id,
                    'party_type' => 'wattage',
                    'child_type' => 'product',
                    'entity_child' => 'product'
                ]);
                $wattage->save();
            }
        }
        $img = Image::find($request->imgID);
        if ($img) {
            $img->update([
                'file_name' => $request->img,
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
            <td>' . \Illuminate\Support\Str::limit($product->name, 10) . '</td>
            <td>';

            if ($product->images->count() > 0) {
                $output .= '<img style="width: 100px;" src="' . asset('images/' . $product->images->first()->image->file_name) . '" alt="Image">';
            }

            $output .= '</td>
            <td></td>
            <td>' . $product->price . '</td>
            <td>' . $product->price_status . '</td>
            <td>' . \Illuminate\Support\Str::limit($product->url_seo, 15) . '</td>
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

    public function detal(Request $request)
    {
        $id = $request->id;
        $product = Product::find($id);

        $types = ['category', 'category_child', 'brand', 'wattage'];
        $partyData = Party::whereIn('type', $types)->get()->groupBy('type');

        $productPartyRelationships = PartyRelationship::where('child_id', $id)
            ->whereIn('party_type', $types)
            ->get();

        $linkedCategories = [];
        $relationshipIdsByType = [];

        foreach ($productPartyRelationships as $relationship) {
            $linkedCategories[] = $relationship->party_id;
            $relationshipIdsByType[$relationship->party_type][$relationship->party_id] = $relationship->id;
        }

        $output = '<style>';
        $output .= '.custom-table { border-collapse: collapse; width: 100%;box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;}';
        $output .= '.custom-table th { text-align: left; padding: 8px; width: 150px; background-color: #f2f2f2; box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;}';
        $output .= '.custom-table td { text-align: left; padding: 8px; }';
        $output .= '.custom-table tr:nth-child(2n) td { background-color: #f1f1f1; }'; // Even rows (td)
        $output .= '.custom-table tr:nth-child(2n) th { background-color: #f1f1f1; }'; // Even rows (th)
        $output .= '.custom-table tr:nth-child(2n+1) th { background-color: #fff; }';
        $output .= '';
        $output .= '</style>';


        $output .= '<table class="custom-table">';
        // First column
        $output .= '<tr><th>Name</th><td class="text-center">' . $product->name . '</td></tr>';
        $output .= '<tr><th>Image</th><td class="text-center">';
        if ($product->images->count() > 0) {
            $output .= '<img style="width: 100px;width:100px;height:100px;object-fit: cover;" src="' . asset('images/' . $product->images->first()->image->file_name) . '" alt="Image">';
        }
        $output .= '</td></tr>';
        $output .= '<tr><th>Description</th><td class="text-center"></td></tr>';
        $output .= '<tr><th>Price</th><td class="text-center">' . $product->price . '</td></tr>';
        $output .= '<tr><th>Price Status</th><td class="text-center"><span class="s_h">' . $product->price_status . '</span></td></tr>';
        $output .= '<tr><th>URL SEO</th><td class="text-center">' . $product->url_seo . '</td></tr>';

        // Second column
        $output .= '<tr><th>Category</th><td class="text-center">';
        foreach ($product->partyRelationship as $relationship) {
            if ($relationship->party_type === 'category') {
                $output .= $relationship->party->description . '<br>';
            }

        }
        if ($product->partyRelationship->where('party_type', 'category')->isEmpty()) {
$output .= '<strong style="color: red !important;">Trống</strong><br>';
        }
        $output .= '<tr><th>Category_child</th><td class="text-center">';
        foreach ($product->partyRelationship as $relationship) {
            if ($relationship->party_type === 'category_child') {
                $output .= $relationship->party->description . '<br>';
            }

        }
        if ($product->partyRelationship->where('party_type', 'category_child')->isEmpty()) {
            $output .= '<strong style="color: red !important;">Trống</strong><br>';
        }
        $output .= '<tr><th>Brand</th><td class="text-center">';
        foreach ($product->partyRelationship as $relationship) {
            if ($relationship->party_type === 'brand') {
                $output .= $relationship->party->description . '<br>';
            }

        }
        if ($product->partyRelationship->where('party_type', 'brand')->isEmpty()) {
            $output .= '<strong style="color: red !important;">Trống</strong><br>';
        }
        $output .= '<tr><th>Wattage</th><td class="text-center">';
        foreach ($product->partyRelationship as $relationship) {
            if ($relationship->party_type === 'wattage') {
                $output .= $relationship->party->description . '<br>';
            }

        }
        if ($product->partyRelationship->where('party_type', 'wattage')->isEmpty()) {
            $output .= '<strong style="color: red !important;">Trống</strong><br>';
        }
        $output .= '</td></tr>';


        // Add similar sections for category_child, brand, and wattage in the second column.
        // ...

        $output .= '</table>';
        $output .= '<div style="display: flex; justify-content: center ; margin-top: 20px">';
        $output .= ' <a href="' . route('product_edit', $id) . '" class="btn btn-info" style="margin-right: 20px"><i
                                            class="bx bx-edit-alt me-1"></i>Edit</a>';
        $output .= '
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
            ';
        $output .= '</div>';
        return response($output);

    }
}
