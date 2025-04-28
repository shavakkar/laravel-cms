<?php

namespace App\Http\Controllers;

use App\Models\YearlyDisposal;
use Illuminate\Http\Request;

class YearlyDisposalController extends Controller
{
    public function index()
    {
        return view('console.disposalYear');
    }

    public function getDisposalYear()
    {

        return YearlyDisposal::latest()->get();
    }

    public function getDisposalYearById($id)
    {
        return YearlyDisposal::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'year' => 'required|unique:yearly_disposals,year,' . $request->id,
            'forward' => 'required|numeric',
            'received' => 'required|numeric',
            'resolved' => 'required|numeric',
            'pending' => 'required|numeric',
        ], [
            'year.required' => 'The Year field is required.',
            'year.unique' => 'The Year has already been taken.',
            'forward.required' => 'Carried Forward field is required',
            'received.required' => 'Received field is required',
            'resolved.required' => 'Resolved field is required',
            'pending.required' => 'Pending field is required',

            'forward.numeric' => 'Carried Forward field must be a number.',
            'received.numeric' => 'Received field must be a number.',
            'resolved.numeric' => 'Resolved field must be a number.',
            'pending.numeric' => 'Pending field must be a number.',
        ]);

        $create = YearlyDisposal::create($validated);

        return response()->json([
            'message' => 'Disposal created',
            'status' => 'success',
            'complainceupdates' => $create
        ]);
    }

    public function update(Request $request, string $id)
    {
        $disposal = YearlyDisposal::findOrFail($id);

        $validated = $request->validate([
            'year' => 'required|unique:yearly_disposals,year,' . $request->id,
            'forward' => 'required|numeric',
            'received' => 'required|numeric',
            'resolved' => 'required|numeric',
            'pending' => 'required|numeric',
        ], [
            'year.required' => 'The Year field is required.',
            'year.unique' => 'The Year has already been taken.',

            'forward.required' => 'Carried Forward field is required',
            'received.required' => 'Received field is required',
            'resolved.required' => 'Resolved field is required',
            'pending.required' => 'Pending field is required',

            'forward.numeric' => 'Carried Forward field must be a number.',
            'received.numeric' => 'Received field must be a number.',
            'resolved.numeric' => 'Resolved field must be a number.',
            'pending.numeric' => 'Pending field must be a number.',
        ]);

        $update = $disposal->update($validated);

        if ($update) {
            session()->flash('notif.success', 'Yearly Disposal updated successfully!');
            return redirect()->route('console.disposalYear');
        }

        return abort(500);
    }

    public function destroy($id)
    {
        $disposal = YearlyDisposal::findOrFail($id);

        $delete = $disposal->delete($id);

        if ($delete) {
            session()->flash('notif.success', 'Yearly Disposal deleted successfully!');
            return redirect()->route('console.disposalYear');
        }

        return abort(500);
    }
}
