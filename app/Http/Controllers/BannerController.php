<?php
// File: app/Http/Controllers/Admin/BannerController.php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $pageTitle = "Banner";
        $banners = Banner::orderBy('order')->get();
        return view('front.admins.banners.index', compact('banners','pageTitle'));
    }
    public function create()
    {
        $pageTitle = "Banner";
        return view('front.admins.banners.create', compact('pageTitle'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'required|integer|min:0',
            'active' => 'boolean',
        ]);

        // Xử lý upload hình ảnh và lưu vào thư mục public/uploads/banners
        $imagePath = $request->file('image')->storePublicly('/storage/img/banner');

        Banner::create([
            'image_path' => '/storage/img/banner/' . $request->file('image')->getClientOriginalName(),
            'order' => $request->order,
            'active' => $request->has('active'),
        ]);

        return redirect()->route('admin.banners.index')->with('success', 'Banner created successfully.');
    }

    public function edit(Banner $banner)
    {
        $pageTitle = "Edit Banner";
        return view('front.admins.banners.edit', compact('banner','pageTitle'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'order' => 'required|integer|min:0',
            'active' => 'boolean',
        ]);

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
