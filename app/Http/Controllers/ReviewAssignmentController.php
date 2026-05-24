<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ReviewAssignment;
use Illuminate\Http\Request;

class ReviewAssignmentController extends Controller
{
    public function index() { return ReviewAssignment::all(); }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'submission_id' => 'required|exists:submissions,id',
            'reviewer_id' => 'nullable|exists:users,id',
            'tanggal_rapat' => 'nullable|date',
            'status_penugasan' => 'required|in:pending,diterima,selesai',
        ]);
        return ReviewAssignment::create($validated);
    }

    public function show(ReviewAssignment $ra) { return $ra; }

    public function update(Request $request, ReviewAssignment $ra)
    {
        $validated = $request->validate([
            'tanggal_rapat' => 'nullable|date',
            'status_penugasan' => 'sometimes|required|in:pending,diterima,selesai',
        ]);
        $ra->update($validated);
        return $ra;
    }

    public function destroy(ReviewAssignment $ra)
    {
        $ra->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
