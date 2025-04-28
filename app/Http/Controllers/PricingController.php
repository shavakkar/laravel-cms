<?php

namespace App\Http\Controllers;

use App\Models\Pricing;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        return view('console.pricing');
    }

    public function getPrice()
    {
        $price = Pricing::join('services', 'services.id', 'pricings.service_id')->select('pricings.*', 'name')->get();
        // $price = Pricing::latest()->get();

        return $price;
    }

    public function getPriceById($id)
    {
        $price = Pricing::findOrFail($id);
        return $price;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|unique:pricings,service_id',
            'monthly' => 'required',
            'quartly' => 'required',
            'halfyearly' => 'required',
            'yearly' => 'required',
            'status' => 'required',
        ]);

        // insert only requests that already validated in the StoreRequest
        $create = Pricing::create($validated);

        if ($create) {
            return response()->json([
                'message' => 'Pricing Created Successfully',
                'status' => 'success',
            ]);
        }
    }

    public function update(Request $request, string $id)
    {
        $price = Pricing::findOrFail($id);

        // return dd($service);

        $validated = $request->validate([
            'service_id' => 'required|unique:pricings,service_id,' . $request->id,
            'monthly' => 'required',
            'quartly' => 'required',
            'halfyearly' => 'required',
            'yearly' => 'required',
            'status' => 'required',
        ]);

        $update = $price->update($validated);

        if ($update) {
            return response()->json([
                'message' => 'Pricing Updated Successfully',
                'status' => 'success',
            ]);
        }
    }

    public function destroy($id)
    {
        $price = Pricing::findOrFail($id);

        $delete = $price->delete($id);

        if ($delete) {
            return response()->json([
                'message' => 'Pricing Deleted Successfully',
                'status' => 'success',
            ]);
        }
    }
}
