<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index()
    {
        return view('console.settings');
    }

    public function getSettings()
    {
        return Settings::first();
    }

    public function update(Request $request)
    {
        $settings = Settings::first();

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric|digits:10',
            'address' => 'required',
            'logo' => 'nullable|image|max:1024',
            'favicon' => 'nullable|image|max:1024',
            'marquee' => 'required',
            'metadesc' => 'required',
            'metakey' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $filePath = Storage::disk('public')->put('settings', request()->file('logo'));
            $validated['logo'] = $filePath;
        }

        if ($request->hasFile('favicon')) {
            $filePath = Storage::disk('public')->put('settings', request()->file('favicon'));
            $validated['favicon'] = $filePath;
        }

        $update = $settings->update($validated);

        return response()->json([
            'message' => 'Setting Updated',
            'status' => 'success',
            'complainceupdates' => $update
        ]);
    }
}
