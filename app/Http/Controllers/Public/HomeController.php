<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Banner;

class HomeController extends Controller
{
    public function index()
    {
        // $banners = Banner::where('status', 'active')->get();
        $images = Banner::where('status', 'active')->pluck('image');
        $imageUrls = $images->map(function ($image) {
            return asset('storage/' . $image);
        });
        return view('public.indexCopy', compact('imageUrls'));
    }
    // public function index()
    // {
    //     return view('public.index');
    // }
}
