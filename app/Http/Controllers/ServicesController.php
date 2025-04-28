<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicesController extends Controller
{
    public function index()
    {
        return view('console.services');
    }

    public function getService()
    {
        return Services::latest()->get();
    }

    public function getServiceById($id)
    {
        return Services::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|max:1024',
            'image.*' => ['mimes:jpeg,jpg,png'],
            'description' => 'required|string|min:3|max:250',
            'name' => 'required|unique:services',
        ]);

        if ($request->hasFile('image')) {
            // put image in the public storage
            $filePath = Storage::disk('public')->put('services', request()->file('image'));
            $validated['image'] = $filePath;
        }

        // insert only requests that already validated in the StoreRequest
        $create = Services::create($validated);

        return response()->json([
            'message' => 'Service created Successfully',
            'status' => 'success',
            'contacts' => $create
        ]);
    }

    public function update(Request $request, $id)
    {
        $service = Services::findOrFail($id);

        $validated = $request->validate([
            'image' => 'nullable|image|max:1024',
            'image.*' => ['mimes:jpeg,jpg,png'],
            'description' => 'required|string|min:3|max:250',
            'name' => 'required|unique:services,name,' . $request->id,
        ]);

        if ($request->hasFile('image')) {
            // delete image
            Storage::disk('public')->delete($service->image);

            // put image in the public storage
            $filePath = Storage::disk('public')->put('services', request()->file('image'), 'public');
            $validated['image'] = $filePath;
        }

        // insert only requests that already validated in the StoreRequest
        $update = $service->update($validated);

        return response()->json([
            'message' => 'Message Sent Successfully',
            'status' => 'success',
            'contacts' => $update
        ]);
    }

    public function destroy($id)
    {
        $service = Services::findOrFail($id);

        Storage::disk('public')->delete($service->image);

        $delete = $service->delete($id);

        if ($delete) {
            return response()->json([
                'message' => 'Service Deleted Successfully',
                'status' => 'success',
            ]);
        }
    }
}
