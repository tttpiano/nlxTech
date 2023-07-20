<?php

namespace App\Http\Controllers;


use App\Models\Image;
use App\Models\Image_related;
use App\Models\Post;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function getAllBlogs()
    {
        $pageTitle = "Tin Tức";
        $posts = Post::where('status', 'show')->get(); // Lấy  các bài viết có status là "show"
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
    public function index()
    {
        $pageTitle = "Tin Tức";
        $posts = Post::all();
        // Kiểm tra và xử lý trạng thái bài viết
        return view('front.admins.post', compact('posts', 'pageTitle'));
    }

    public function postEdit($id)
    {
        $pageTitle = "Sua Tin Tức";
        $post = Post::find($id);
        // Kiểm tra và xử lý trạng thái bài viết
        return view('front.admins.post_edit', compact('pageTitle', 'post'));
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
                'url_seo' => $request->url_Seo
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
            'url_seo' => $request->url_Seo1
        ]);
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
        $post = Post::where('title', 'Like', '%' . $request->search . '%')
            ->orWhere('meta_keyword', 'Like', '%' . $request->search . '%')->get();
        foreach ($post as $p) {
            $output .= '<tr>
            <td>'.$count.'</td>
            <td>'.$p->author.'</td>
            <td>'.\Illuminate\Support\Str::limit($p->title, 10).'</td>
            <td>'.\Illuminate\Support\Str::limit($p->description, 10).'</td>
            <td>'.\Illuminate\Support\Str::limit($p->content ,10).'</td>
            <td>'.\Illuminate\Support\Str::limit($p->meta_desc, 10).'</td>
            <td>'.\Illuminate\Support\Str::limit($p->meta_keyword, 10).'</td>
            <td>'.\Illuminate\Support\Str::limit($p->url_seo,10).'</td>
            <td>'.$p->status.'</td>
            <td>
                <a href="'.route('post_edit', $p->id).'" class="btn btn-outline-info"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                <br><br>
                <form id="delete-form" action="'.route('posts.destroy', $p->id).'" method="POST" style="display: inline-block;">
                    '.csrf_field().'
                    '.method_field('DELETE').'
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete'.$p->id.'">Xoá</button>
                    <!-- Modal -->
                    <div class="modal fade" id="delete'.$p->id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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



}
