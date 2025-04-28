<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;

class ComplaintController extends Controller
{
    public function index()
    {
        return view('console.complaint');
    }

    public function getComplaint()
    {

        return Complaint::latest()->get();
    }

    public function getComplaintById($id)
    {
        return Complaint::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'from' => 'required|unique:complaints,from,' . $request->id,
            'monthpending' => 'required|numeric',
            'received' => 'required|numeric',
            'resolved' => 'required|numeric',
            'pending' => 'required|numeric',
            'pending3'  => 'required|numeric',
            'avg'  => 'required|numeric',
        ], [
            'from.required' => 'The Received From field is required.',
            'from.unique' => 'The Received From has already been taken.',
            'monthpending.required' => 'Month End Pending field is required.',
            'received.required' => 'Received field is required.',
            'resolved.required' => 'Resolved field is required.',
            'pending.required' => 'Total Pending field is required.',
            'pending3.required' => 'Pending Complaints > 3 Months is required.',
            'avg.required' => 'Average Resolution Time field is required.',

            'monthpending.numeric' => 'Carried Forward field must be a number.',
            'received.numeric' => 'Received field must be a number.',
            'resolved.numeric' => 'Resolved field must be a number.',
            'pending.numeric' => 'Pending field must be a number.',
            'pending3.numeric' => 'Pending field must be a number.',
            'avg.numeric' => 'Pending field must be a number.',
        ]);

        $create = Complaint::create($validated);

        return response()->json([
            'message' => 'Complaint created',
            'status' => 'success',
            'complainceupdates' => $create
        ]);
    }

    public function update(Request $request, string $id)
    {
        $complaint = Complaint::findOrFail($id);

        $validated = $request->validate([
            'from' => 'required|unique:complaints,from,' . $request->id,
            'monthpending' => 'required|numeric',
            'received' => 'required|numeric',
            'resolved' => 'required|numeric',
            'pending' => 'required|numeric',
            'pending3'  => 'required|numeric',
            'avg'  => 'required|numeric',
        ], [
            'from.required' => 'The Received From field is required.',
            'from.unique' => 'The Received From has already been taken.',
            'monthpending.required' => 'Month End Pending field is required.',
            'received.required' => 'Received field is required.',
            'resolved.required' => 'Resolved field is required.',
            'pending.required' => 'Total Pending field is required.',
            'pending3.required' => 'Pending Complaints > 3 Months is required.',
            'avg.required' => 'Average Resolution Time field is required.',

            'monthpending.numeric' => 'Carried Forward field must be a number.',
            'received.numeric' => 'Received field must be a number.',
            'resolved.numeric' => 'Resolved field must be a number.',
            'pending.numeric' => 'Pending field must be a number.',
            'pending3.numeric' => 'Pending field must be a number.',
            'avg.numeric' => 'Pending field must be a number.',
        ]);

        $update = $complaint->update($validated);

        if ($update) {
            session()->flash('notif.success', 'Complaints updated successfully!');
            return redirect()->route('console.complaints');
        }

        return abort(500);
    }

    public function destroy($id)
    {
        $complaint = Complaint::findOrFail($id);

        $delete = $complaint->delete($id);

        if ($delete) {
            session()->flash('notif.success', 'Complaint deleted successfully!');
            return redirect()->route('console.complaints');
        }

        return abort(500);
    }
}
