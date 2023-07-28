<?php
// File: app/Http/Controllers/Admin/BannerController.php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function storeImage(Request $request)
    {
        if ($request->hasFile('fileUpload')) {
            $originName = $request->file('fileUpload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('fileUpload')->getClientOriginalExtension();
            $fileName = $fileName . '.' . $extension;
            // Public Folder
            $request->file('fileUpload')->move(public_path('storage/img/banner/'), $fileName);
            $request->session()->put('fileName1', $fileName);

            return back()->with('success', 'Image uploaded Successfully!')
                ->with('images', $fileName);
        }
    }

    public function index()
    {
        $pageTitle = "Banner";
        $banners = Banner::orderBy('order')->get();
        return view('front.admins.banners.index', compact('banners', 'pageTitle'));
    }

    public function create()
    {
        $pageTitle = "Banner";
        return view('front.admins.banners.create', compact('pageTitle'));
    }

    public function store(Request $request)
    {
        Banner::create([
            'image_path' => '/storage/img/banner/' . $request->session()->get('fileName1'),
            'order' => $request->order,
            'active' => $request->active,
        ]);
        return response()->json(['success' => true]);
    }

    public function edit(Banner $banner)
    {
        $pageTitle = "Edit Banner";
        return view('front.admins.banners.edit', compact('banner', 'pageTitle'));
    }

    public function update(Request $request, Banner $banner)
    {


            // Cập nhật thông tin banner
            $banner->update([
                'order' => $request->order,
                'active' => $request->has('active'),
            ]);

        return redirect()->route('admin.banners.index')->with('success', 'Banner updated successfully.');
    }

    public function destroy(Banner $banner)
    {
        // Xoá hình ảnh của banner trong thư mục public/uploads/banners
        Storage::delete($banner->image_path);

        // Xoá banner khỏi cơ sở dữ liệu
        $banner->delete();

        return redirect()->route('admin.banners.index')->with('success', 'Banner deleted successfully.');
    }
}
