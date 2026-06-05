@extends('layouts.app')

@section('title', 'Tambah Verifikasi')
@section('header', 'Verifikasi Administrasi')
@section('subheader', 'Tambah data verifikasi kelengkapan berkas')

@section('content')

<div class="max-w-2xl">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
        <div class="px-6 py-4 border-b border-gray-100">
            <h2 class="font-semibold text-gray-800">Formulir Verifikasi</h2>
        </div>
        <form action="{{ route('administrative-verifications.store') }}" method="POST" class="p-6 space-y-5">
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
                <label class="block text-sm font-medium text-gray-700 mb-1.5">
                    Sekretariat <span class="text-red-500">*</span>
                </label>
                <select name="sekretariat_id"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white
                               @error('sekretariat_id') border-red-400 @enderror">
                    <option value="">— Pilih Sekretariat —</option>
                    @foreach($sekretariats as $user)
                    <option value="{{ $user->id }}" {{ old('sekretariat_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                    @endforeach
                </select>
                @error('sekretariat_id')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Kelengkapan Berkas</label>
                <div class="flex items-center gap-6">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="is_lengkap" value="1" {{ old('is_lengkap', '1') === '1' ? 'checked' : '' }}
                               class="text-blue-600">
                        <span class="text-sm text-gray-700">Lengkap</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="is_lengkap" value="0" {{ old('is_lengkap') === '0' ? 'checked' : '' }}
                               class="text-blue-600">
                        <span class="text-sm text-gray-700">Tidak Lengkap</span>
                    </label>
                </div>
                @error('is_lengkap')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Catatan</label>
                <textarea name="catatan" rows="4" placeholder="Catatan verifikasi (opsional)..."
                          class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 resize-y">{{ old('catatan') }}</textarea>
                @error('catatan')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end gap-3 pt-2 border-t border-gray-100">
                <a href="{{ route('administrative-verifications.index') }}"
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
