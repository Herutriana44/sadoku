<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('reviews.index', compact('reviews'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'submission_id' => 'required|exists:submissions,id',
            'reviewer_id' => 'nullable|exists:users,id',
            'catatan_review' => 'nullable|string',
            'rekomendasi_hasil' => 'required|in:disetujui,perbaikan_minor,perbaikan_mayor,tidak_disetujui',
        ]);
        return Review::create($validated);
    }

    public function show(Review $review) { return $review; }

    public function update(Request $request, Review $review)
    {
        $validated = $request->validate([
            'catatan_review' => 'nullable|string',
            'rekomendasi_hasil' => 'sometimes|required|in:disetujui,perbaikan_minor,perbaikan_mayor,tidak_disetujui',
        ]);
        $review->update($validated);
        return $review;
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
