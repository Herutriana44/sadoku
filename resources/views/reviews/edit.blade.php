@extends('layouts.app')

@section('title', 'Edit Review')
@section('header', 'Edit Review')

@section('content')

<div class="max-w-2xl">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
        <div class="px-6 py-4 border-b border-gray-100">
            <h2 class="font-semibold text-gray-800">Edit Data Review</h2>
        </div>
        <form action="{{ route('reviews.update', $review) }}" method="POST" class="p-6 space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">
                    Rekomendasi <span class="text-red-500">*</span>
                </label>
                <select name="rekomendasi_hasil"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                    <option value="disetujui" {{ old('rekomendasi_hasil', $review->rekomendasi_hasil) === 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                    <option value="perbaikan_minor" {{ old('rekomendasi_hasil', $review->rekomendasi_hasil) === 'perbaikan_minor' ? 'selected' : '' }}>Perbaikan Minor</option>
                    <option value="perbaikan_mayor" {{ old('rekomendasi_hasil', $review->rekomendasi_hasil) === 'perbaikan_mayor' ? 'selected' : '' }}>Perbaikan Mayor</option>
                    <option value="tidak_disetujui" {{ old('rekomendasi_hasil', $review->rekomendasi_hasil) === 'tidak_disetujui' ? 'selected' : '' }}>Tidak Disetujui</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Catatan Review</label>
                <textarea name="catatan_review" rows="5"
                          class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 resize-y">{{ old('catatan_review', $review->catatan_review) }}</textarea>
            </div>

            <div class="flex items-center justify-end gap-3 pt-2 border-t border-gray-100">
                <a href="{{ route('reviews.index') }}"
                   class="px-4 py-2 text-sm font-medium text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                    Batal
                </a>
                <button type="submit"
                        class="px-6 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
