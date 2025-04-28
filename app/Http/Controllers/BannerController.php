<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        return view('console.banner');
    }

    public function getBanner()
    {
        return Banner::latest()->get();
    }

    public function getBannerById($id)
    {
        return Banner::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|max:1024',
            'image.*' => ['mimes:jpeg,jpg,png'],
            'title' => 'required|string|min:3|max:250',
            'status' => 'required',
        ]);

        if ($request->hasFile('image')) {
            // put image in the public storage
            $filePath = Storage::disk('public')->put('banners', request()->file('image'));
            $validated['image'] = $filePath;
        }

        // insert only requests that already validated in the StoreRequest
        $create = Banner::create($validated);

        return response()->json([
            'message' => 'Message Sent Successfully',
            'status' => 'success',
            'contacts' => $create
        ]);
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $validated = $request->validate([
            'image' => 'nullable|image|max:1024',
            'image.*' => ['mimes:jpeg,jpg,png'],
            'title' => 'required|string|min:3|max:250',
            'status' => 'required',
        ]);

        if ($request->hasFile('image')) {
            // delete image
            Storage::disk('public')->delete($banner->image);

            // put image in the public storage
            $filePath = Storage::disk('public')->put('banners', request()->file('image'), 'public');
            $validated['image'] = $filePath;
        }

        // insert only requests that already validated in the StoreRequest
        $update = $banner->update($validated);

        return response()->json([
            'message' => 'Message Sent Successfully',
            'status' => 'success',
            'contacts' => $update
        ]);
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        Storage::disk('public')->delete($banner->image);

        $delete = $banner->delete($id);

        if ($delete) {
            return response()->json([
                'message' => 'Banner Deleted Successfully',
                'status' => 'success',
            ]);
        }
    }
}
