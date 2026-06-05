@extends('layouts.app')

@section('title', 'Tambah Penugasan')
@section('header', 'Penugasan Reviewer')
@section('subheader', 'Tambah penugasan reviewer atau plotting rapat')

@section('content')

<div class="max-w-2xl">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
        <div class="px-6 py-4 border-b border-gray-100">
            <h2 class="font-semibold text-gray-800">Formulir Penugasan</h2>
        </div>
        <form action="{{ route('review-assignments.store') }}" method="POST" class="p-6 space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">
                    Pengajuan <span class="text-red-500">*</span>
                </label>
                <select name="submission_id"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white
                               @error('submission_id') border-red-400 @enderror">
                    <option value="">— Pilih Pengajuan —</option>
                    @foreach($submissions as $sub)
                    <option value="{{ $sub->id }}" {{ old('submission_id') == $sub->id ? 'selected' : '' }}>
                        #{{ $sub->id }} — {{ Str::limit($sub->judul_penelitian, 60) }}
                    </option>
                    @endforeach
                </select>
                @error('submission_id')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Reviewer</label>
                <select name="reviewer_id"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                    <option value="">— Rapat Pleno / Komisi Penuh —</option>
                    @foreach($reviewers as $user)
                    <option value="{{ $user->id }}" {{ old('reviewer_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                    @endforeach
                </select>
                <p class="mt-1 text-xs text-gray-400">Kosongkan untuk format rapat pleno (Full Board)</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Tanggal Rapat</label>
                <input type="datetime-local" name="tanggal_rapat" value="{{ old('tanggal_rapat') }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                <p class="mt-1 text-xs text-gray-400">Diisi jika ada jadwal rapat Full Board</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">
                    Status Penugasan <span class="text-red-500">*</span>
                </label>
                <select name="status_penugasan"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white
                               @error('status_penugasan') border-red-400 @enderror">
                    <option value="pending" {{ old('status_penugasan', 'pending') === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="diterima" {{ old('status_penugasan') === 'diterima' ? 'selected' : '' }}>Diterima</option>
                    <option value="selesai" {{ old('status_penugasan') === 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
                @error('status_penugasan')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end gap-3 pt-2 border-t border-gray-100">
                <a href="{{ route('review-assignments.index') }}"
                   class="px-4 py-2 text-sm font-medium text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                    Batal
                </a>
                <button type="submit"
                        class="px-6 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
