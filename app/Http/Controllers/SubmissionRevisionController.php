<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SubmissionRevision;
use Illuminate\Http\Request;

class SubmissionRevisionController extends Controller
{
    public function index() { return SubmissionRevision::all(); }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'submission_id' => 'required|exists:submissions,id',
            'berkas_revisi_path' => 'required|string',
            'catatan_peneliti' => 'nullable|string',
            'tipe_perbaikan' => 'required|in:administrasi,minor,mayor',
            'versi' => 'required|integer',
        ]);
        return SubmissionRevision::create($validated);
    }

    public function show(SubmissionRevision $sr) { return $sr; }

    public function update(Request $request, SubmissionRevision $sr)
    {
        $validated = $request->validate([
            'berkas_revisi_path' => 'sometimes|required|string',
            'catatan_peneliti' => 'nullable|string',
            'tipe_perbaikan' => 'sometimes|required|in:administrasi,minor,mayor',
            'versi' => 'sometimes|required|integer',
        ]);
        $sr->update($validated);
        return $sr;
    }

    public function destroy(SubmissionRevision $sr)
    {
        $sr->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
