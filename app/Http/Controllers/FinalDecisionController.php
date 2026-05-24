<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\FinalDecision;
use Illuminate\Http\Request;

class FinalDecisionController extends Controller
{
    public function index() { return FinalDecision::all(); }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'submission_id' => 'required|exists:submissions,id',
            'ketua_id' => 'required|exists:users,id',
            'hasil_keputusan' => 'required|in:disetujui,perbaikan_minor,perbaikan_mayor,tidak_disetujui',
            'catatan' => 'nullable|string',
            'no_sertifikat_etik' => 'nullable|string',
        ]);
        return FinalDecision::create($validated);
    }

    public function show(FinalDecision $fd) { return $fd; }

    public function update(Request $request, FinalDecision $fd)
    {
        $validated = $request->validate([
            'hasil_keputusan' => 'sometimes|required|in:disetujui,perbaikan_minor,perbaikan_mayor,tidak_disetujui',
            'catatan' => 'nullable|string',
            'no_sertifikat_etik' => 'nullable|string',
        ]);
        $fd->update($validated);
        return $fd;
    }

    public function destroy(FinalDecision $fd)
    {
        $fd->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
