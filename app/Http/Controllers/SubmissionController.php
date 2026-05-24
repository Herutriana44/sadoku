<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function index()
    {
        $submissions = Submission::all();
        return view('submissions.index', compact('submissions'));
    }

    public function create()
    {
        return view('submissions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'judul_penelitian' => 'required|string|max:255',
            'abstrak' => 'required|string',
            'berkas_path' => 'required|string',
            'status' => 'required|in:diajukan,perbaikan_administrasi,proses_telaah,perbaikan_minor,perbaikan_mayor,disetujui,tidak_disetujui',
        ]);

        Submission::create($validated);
        return redirect()->route('submissions.index');
    }

    public function show(Submission $submission)
    {
        return $submission;
    }

    public function update(Request $request, Submission $submission)
    {
        $validated = $request->validate([
            'judul_penelitian' => 'sometimes|required|string|max:255',
            'abstrak' => 'sometimes|required|string',
            'berkas_path' => 'sometimes|required|string',
            'status' => 'sometimes|required|in:diajukan,perbaikan_administrasi,proses_telaah,perbaikan_minor,perbaikan_mayor,disetujui,tidak_disetujui',
        ]);

        $submission->update($validated);
        return $submission;
    }

    public function destroy(Submission $submission)
    {
        $submission->delete();
        return response()->json(['message' => 'Submission deleted']);
    }
}
