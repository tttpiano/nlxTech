<?php

namespace App\Http\Controllers;


use App\Models\Image;
use App\Models\Image_related;
use App\Models\Party;
use App\Models\PartyRelationship;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function ajaxPaginationBlog()
    {
        $pageTitle = "Tin Tức";
        $posts = Post::where('status', 'show')->paginate(4);
        $posts->withPath(route('ajax.blogs'));
        $latestPost = Post::orderBy('created_at', 'desc')->take(3)->get();

        foreach ($posts as $post) {
            $imageRelated = Image_related::where('related_id', $post->id)
                ->where('entity', 'post')
                ->first();

            if ($imageRelated) {
                $image = Image::find($imageRelated->img_id);
                $post->image = $image;
            }

            $post->formattedCreatedAt = Carbon::parse($post->created_at)->format('d/m/Y');
            // Định dạng lại created_at thành chuỗi ngày tháng năm (vd: '17/07/2023')
        }
        foreach ($latestPost as $l) {
            $imageRelated = Image_related::where('related_id', $l->id)
                ->where('entity', 'post')
                ->first();
            if ($imageRelated) {
                $image = Image::find($imageRelated->img_id);
                $l->image = $image;
            }

            // Định dạng lại created_at thành chuỗi ngày tháng năm (vd: '17/07/2023')
            $l->formattedCreatedAt = Carbon::parse($l->created_at)->format('d/m/Y');
        }

        return view('front.pagination.blog', ['posts' => $posts, 'pageTitle' => $pageTitle, 'latestPost' => $latestPost])->render();
    }

    public function pagin_blog()
    {
        $pageTitle = "Tin Tức";
        $posts = Post::where('status', 'show')->paginate(4);
        $latestPost = Post::orderBy('created_at', 'desc')->take(3)->get();

        foreach ($posts as $post) {
            $imageRelated = Image_related::where('related_id', $post->id)
                ->where('entity', 'post')
                ->first();

            if ($imageRelated) {
                $image = Image::find($imageRelated->img_id);
                $post->image = $image;
            }

            $post->formattedCreatedAt = Carbon::parse($post->created_at)->format('d/m/Y');
            // Định dạng lại created_at thành chuỗi ngày tháng năm (vd: '17/07/2023')
        }
        foreach ($latestPost as $l) {
            $imageRelated = Image_related::where('related_id', $l->id)
                ->where('entity', 'post')
                ->first();
            if ($imageRelated) {
                $image = Image::find($imageRelated->img_id);
                $l->image = $image;
            }

            // Định dạng lại created_at thành chuỗi ngày tháng năm (vd: '17/07/2023')
            $l->formattedCreatedAt = Carbon::parse($l->created_at)->format('d/m/Y');
        }

        return view('front.pagination.blog', ['posts' => $posts, 'pageTitle' => $pageTitle, 'latestPost' => $latestPost])->render();

    }

    public function getAllBlogs()
    {
        $pageTitle = "Tin Tức";
        $posts = Post::where('status', 'show')->paginate(4);
        $latestPost = Post::orderBy('created_at', 'desc')->take(3)->get();

        foreach ($posts as $post) {
            $imageRelated = Image_related::where('related_id', $post->id)
                ->where('entity', 'post')
                ->first();

            if ($imageRelated) {
                $image = Image::find($imageRelated->img_id);
                $post->image = $image;
            }

            $post->formattedCreatedAt = Carbon::parse($post->created_at)->format('d/m/Y');
            // Định dạng lại created_at thành chuỗi ngày tháng năm (vd: '17/07/2023')
        }
        foreach ($latestPost as $l) {
            $imageRelated = Image_related::where('related_id', $l->id)
                ->where('entity', 'post')
                ->first();
            if ($imageRelated) {
                $image = Image::find($imageRelated->img_id);
                $l->image = $image;
            }

            // Định dạng lại created_at thành chuỗi ngày tháng năm (vd: '17/07/2023')
            $l->formattedCreatedAt = Carbon::parse($l->created_at)->format('d/m/Y');
        }

        return view('front.blog', ['posts' => $posts, 'pageTitle' => $pageTitle, 'latestPost' => $latestPost]);
    }

    public function show($url_seo)
    {
        // Truy vấn bài viết dựa trên url_seo
        $post = Post::where('url_seo', Str::slug($url_seo))->firstOrFail();
        $pageTitle = $post->title;
        $post->formattedCreatedAt = Carbon::parse($post->created_at)->format('d/m/Y');
        // Định dạng lại created_at thành chuỗi ngày tháng năm (vd: '17/07/2023')
        // Truy vấn tin liên quan
        $relatedPosts = Post::where('id', '!=', $post->id)
            ->where('status', 'show')
            ->inRandomOrder()
            ->take(3)
            ->get();

        foreach ($relatedPosts as $relatedPost) {
            $imageRelated = Image_related::where('related_id', $relatedPost->id)
                ->where('entity', 'post')
                ->first();

            if ($imageRelated) {
                $image = Image::find($imageRelated->img_id);
                $relatedPost->image = $image;
            }

            $relatedPost->formattedCreatedAt = Carbon::parse($relatedPost->created_at)->format('d/m/Y');
            // Định dạng lại created_at thành chuỗi ngày tháng năm (vd: '17/07/2023')
        }

        // Trả về view hiển thị chi tiết bài viết với biến $post, $pageTitle, và $relatedPosts
        return view('front.blog_detail', compact('post', 'pageTitle', 'relatedPosts'));
    }



//    admin
    // Phương thức hiển thị danh sách bài viết
    public function ajaxPaginationPostAdmin()
    {
        $perPage = 5; // Đặt số mục hiển thị trên mỗi trang theo mong muốn của bạn
        $page = request('page') ?: 1;

        $posts = Post::paginate($perPage);
        $posts->withPath(route('ajax.posts')); // Đặt đường dẫn phân trang cho các yêu cầu AJAX

        // Tính toán số thứ tự (STT) cho mỗi mục dựa trên trang hiện tại và chỉ số
        $startNumber = ($page - 1) * $perPage + 1;
        $posts->getCollection()->transform(function ($item, $index) use ($startNumber) {
            $item->stt = $startNumber + $index;
            return $item;
        });

        return view('front.admins.pagination.post', ['posts' => $posts])->render();
    }

    public function pagin_postAdmin()
    {
        $pageTitle = "Post";
        $post = Post::paginate(5);
        return view('front/admins/pagination/post', ['pageTitle' => $pageTitle, 'post' => $post])->render();
    }

    public function index()
    {
        $pageTitle = "Tin Tức";
        // Kiểm tra và xử lý trạng thái bài viết
        $posts = Post::with([
            'images',
        ])->paginate(5);
        return view('front.admins.post', compact('posts', 'pageTitle'));
    }

    public function postEdit($id)
    {
        $pageTitle = "Sửa Tin Tức";
        $post = Post::find($id);
        // Kiểm tra và xử lý trạng thái bài viết

        $imageInfo = null;
        $imageRelated = $post->relatedImages()->where('entity', 'post')->first();
        if ($imageRelated) {
            $imageInfo = [
                'id' => $imageRelated->image->id,
                'file_name' => $imageRelated->image->file_name,
                // Add any other image properties you want to use in the view
            ];
        }
        return view('front.admins.post_edit', compact('pageTitle', 'post', 'imageInfo'));
    }

    public function postAdd()
    {
        $pageTitle = "Tin Tức";
        // Kiểm tra và xử lý trạng thái bài viết
        return view('front.admins.post_add', compact('pageTitle'));
    }

    public function insert(Request $request)
    {
        $img = Image::create([
            'file_name' => $request->session()->get('fileName1'),
            'level' => 1,
        ]);

        if ($img !== null) {
            $post = Post::create([
                'author' => $request->author,
                'title' => $request->title,
                'description' => $request->description,
                'content' => $request->content1,
                'meta_desc' => $request->meta_desc,
                'meta_keyword' => $request->meta_keyword,
                'status' => $request->status,
                'url_seo' => Str::slug($request->url_Seo)
            ]);
            Image_related::create([
                'img_id' => $img->id,
                'related_id' => $post->id,
                'entity' => "post",
            ]);
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }

    }

    public function update(Request $request)
    {

        Post::find($request->id)->update([
            'author' => $request->author1,
            'title' => $request->title1,
            'description' => $request->description1,
            'content' => $request->content2,
            'meta_desc' => $request->meta_desc1,
            'meta_keyword' => $request->meta_keyword1,
            'status' => $request->status1,
            'url_seo' => Str::slug($request->url_Seo1)
        ]);
        $img = Image::find($request->imgID);
        if ($img) {
            $img->update([
                'file_name' => $request->img,
                'level' => 1,
            ]);
        }

        return response()->json(['success' => true]);
    }


    public function destroy($id)
    {
        $post = Post::find($id);

        // Xóa hình ảnh liên quan từ bảng img_related
        $imageRelated = Image_related::where('related_id', $post->id)
            ->where('entity', 'post')
            ->first();

        if ($imageRelated) {
            $image = Image::find($imageRelated->img_id);
            if ($image) {
                $image->delete();
            }
            $imageRelated->delete();
        }

        // Xóa bài viết
        $post->delete();
        return redirect()->route('admin_post')->with('success', 'Bài viết đã được xoá thành công');
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('images'), $fileName);

            $url = asset('images/' . $fileName);

            // Tạo HTML để hiển thị ảnh đã tải lên
            $html = '<img src="' . $url . '" alt="' . $originName . '">';

            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url, 'html' => $html]);
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
            // //Store in Storage Folder
            // $request->image->storeAs('images', $imageName);
            // // Store in S3
            // $request->image->storeAs('images', $imageName, 's3');

            //Store IMage in DB
            $request->session()->put('fileName1', $fileName);

            return back()->with('success', 'Image uploaded Successfully!')
                ->with('images', $fileName);
        }
    }


    public function search(Request $request)
    {
        $count = 1;
        $output = '';
        $posts = Post::where('title', 'like', '%' . $request->search . '%')
            ->orWhere('meta_keyword', 'like', '%' . $request->search . '%')
            ->with('images') // Eager load the 'images' relationship
            ->get();

        foreach ($posts as $post) {
            $output .= '<tr>
            <td>' . $count . '</td>
            <td>';

            if ($post->images->count() > 0) {
                $output .= '<img style="width: 100px;" src="' . asset('images/' . $post->images->first()->image->file_name) . '" alt="Image">';
            }

            $output .= '</td>
            <td>' . $post->author . '</td>
            <td>' . \Illuminate\Support\Str::limit($post->title, 10) . '</td>
            <td>' . \Illuminate\Support\Str::limit($post->description, 10) . '</td>
            <td>' . \Illuminate\Support\Str::limit($post->content, 10) . '</td>
            <td>' . \Illuminate\Support\Str::limit($post->meta_desc, 10) . '</td>
            <td>' . \Illuminate\Support\Str::limit($post->meta_keyword, 10) . '</td>
            <td>' . \Illuminate\Support\Str::limit($post->url_seo, 10) . '</td>
            <td>' . $post->status . '</td>
            <td>
                <a href="' . route('post_edit', $post->id) . '" class="btn btn-outline-info"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                <br><br>
                <form id="delete-form" action="' . route('posts.destroy', $post->id) . '" method="POST" style="display: inline-block;">
                    ' . csrf_field() . '
                    ' . method_field('DELETE') . '
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete' . $post->id . '">Xoá</button>
                    <!-- Modal -->
                    <div class="modal fade" id="delete' . $post->id . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Xoá Bài Viết</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn có muốn xoá bài viết này?
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
    public function detal(Request $request)
    {
        $id = $request->id;
        $post = Post::find($id);





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
        $output .= '<tr><th>Title</th><td class="text-center">' . $post->title . '</td></tr>';
        $output .= '<tr><th>Image</th><td class="text-center">';
        if ($post->images->count() > 0) {
            $output .= '<img style="width: 100px;width:100px;height:100px;object-fit: cover;" src="' . asset('images/' . $post->images->first()->image->file_name) . '" alt="Image">';
        }
        $output .= '</td></tr>';
        $output .= '<tr><th>Description</th><td class="text-center">' . $post->description . '</td></tr>';
        $output .= '<tr><th>Content</th><td class="text-center">' .  \Illuminate\Support\Str::limit($post->content, 30) . '</td></tr>';
        $output .= '<tr><th>Meta Desc</th><td class="text-center">' . $post->meta_desc . '</td></tr>';
        $output .= '<tr><th>Meta Keyword</th><td class="text-center">' . $post->meta_keyword . '</td></tr>';
        $output .= '<tr><th>Status</th><td class="text-center"><span class="s_h">' . $post->status . '</span></td></tr>';


        $output .= '</td></tr>';


        // Add similar sections for category_child, brand, and wattage in the second column.
        // ...

        $output .= '</table>';
        $output .= '<div style="display: flex; justify-content: center ; margin-top: 20px">';
        $output .= ' <a href="'. route('post_edit', $id) .'" class="btn btn-info" style="margin-right: 20px"><i
                                            class="bx bx-edit-alt me-1"></i>Edit</a>';
        $output .= '
                <form id="delete-form" action="' . route('posts.destroy', $post->id) . '" method="POST" style="display: inline-block;">
                    ' . csrf_field() . '
                    ' . method_field('DELETE') . '

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete' . $post->id . '">Xoá</button>
                    <!-- Modal -->
                    <div class="modal fade" id="delete' . $post->id . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Xoá Bài Viết</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn có muốn xoá <strong><b>' . $post->name . '</b></strong> này?
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
