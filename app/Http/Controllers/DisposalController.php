<?php

namespace App\Http\Controllers;

use App\Models\Disposal;
use Illuminate\Http\Request;

class DisposalController extends Controller
{
    public function index()
    {
        return view('console.disposal');
    }

    public function getDisposal()
    {

        return Disposal::latest()->get();
    }

    public function getDisposalById($id)
    {
        return Disposal::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'month' => 'required|unique:disposals,month,' . $request->id,
            'complaints' => 'required|numeric',
            'received' => 'required|numeric',
            'resolved' => 'required|numeric',
            'pending' => 'required|numeric',
        ], [
            'month.required' => 'The Month-Year field is required.',
            'month.unique' => 'The Month-Year has already been taken.',
            'complaints.required' => 'Carried Forward field is required',
            'received.required' => 'Received field is required',
            'resolved.required' => 'Resolved field is required',
            'pending.required' => 'Pending field is required',

            'complaints.numeric' => 'Carried Forward field must be a number.',
            'received.numeric' => 'Received field must be a number.',
            'resolved.numeric' => 'Resolved field must be a number.',
            'pending.numeric' => 'Pending field must be a number.',
        ]);

        $create = Disposal::create($validated);

        return response()->json([
            'message' => 'Disposal created',
            'status' => 'success',
            'complainceupdates' => $create
        ]);
    }

    public function update(Request $request, string $id)
    {
        $disposal = Disposal::findOrFail($id);

        $validated = $request->validate([
            'month' => 'required|unique:disposals,month,' . $request->id,
            'complaints' => 'required',
            'received' => 'required',
            'resolved' => 'required',
            'pending' => 'required',
        ], [
            'month.required' => 'The Month-Year field is required.',
            'month.unique' => 'The Month-Year has already been taken.',
            'complaints.required' => 'Carried Forward field is required',
            'received.required' => 'Received field is required',
            'resolved.required' => 'Resolved field is required',
            'pending.required' => 'Pending field is required',
            'complaints.numeric' => 'Carried Forward field must be a number.',
            'received.numeric' => 'Received field must be a number.',
            'resolved.numeric' => 'Resolved field must be a number.',
            'pending.numeric' => 'Pending field must be a number.',
        ]);

        $update = $disposal->update($validated);

        if ($update) {
            session()->flash('notif.success', 'Disposal updated successfully!');
            return redirect()->route('console.disposal');
        }

        return abort(500);
    }

    public function destroy($id)
    {
        $disposal = Disposal::findOrFail($id);

        $delete = $disposal->delete($id);

        if ($delete) {
            session()->flash('notif.success', 'Disposal deleted successfully!');
            return redirect()->route('console.disposal');
        }

        return abort(500);
    }
}
