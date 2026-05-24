<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AdministrativeVerification;
use Illuminate\Http\Request;

class AdministrativeVerificationController extends Controller
{
    public function index()
    {
        $verifications = AdministrativeVerification::all();
        return view('administrative-verifications.index', compact('verifications'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'submission_id' => 'required|exists:submissions,id',
            'sekretariat_id' => 'required|exists:users,id',
            'is_lengkap' => 'required|boolean',
            'catatan' => 'nullable|string',
        ]);
        return AdministrativeVerification::create($validated);
    }

    public function show(AdministrativeVerification $av) { return $av; }

    public function update(Request $request, AdministrativeVerification $av)
    {
        $validated = $request->validate([
            'is_lengkap' => 'sometimes|required|boolean',
            'catatan' => 'nullable|string',
        ]);
        $av->update($validated);
        return $av;
    }

    public function destroy(AdministrativeVerification $av)
    {
        $av->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
