@extends('layouts.app')

@section('title', 'Edit Penugasan')
@section('header', 'Edit Penugasan Reviewer')

@section('content')

<div class="max-w-2xl">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
        <div class="px-6 py-4 border-b border-gray-100">
            <h2 class="font-semibold text-gray-800">Edit Data Penugasan</h2>
        </div>
        <form action="{{ route('review-assignments.update', $assignment) }}" method="POST" class="p-6 space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Tanggal Rapat</label>
                <input type="datetime-local" name="tanggal_rapat"
                       value="{{ old('tanggal_rapat', $assignment->tanggal_rapat ? \Carbon\Carbon::parse($assignment->tanggal_rapat)->format('Y-m-d\TH:i') : '') }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Status Penugasan</label>
                <select name="status_penugasan"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                    @php $current = old('status_penugasan', $assignment->status_penugasan); @endphp
                    <option value="pending" {{ $current === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="diterima" {{ $current === 'diterima' ? 'selected' : '' }}>Diterima</option>
                    <option value="selesai" {{ $current === 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>

            <div class="flex items-center justify-end gap-3 pt-2 border-t border-gray-100">
                <a href="{{ route('review-assignments.index') }}"
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
