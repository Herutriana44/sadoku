@extends('layouts.app')

@section('title', 'Edit Verifikasi')
@section('header', 'Edit Verifikasi Administrasi')

@section('content')

<div class="max-w-2xl">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
        <div class="px-6 py-4 border-b border-gray-100">
            <h2 class="font-semibold text-gray-800">Edit Data Verifikasi</h2>
        </div>
        <form action="{{ route('administrative-verifications.update', $verification) }}" method="POST" class="p-6 space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Kelengkapan Berkas</label>
                <div class="flex items-center gap-6">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="is_lengkap" value="1"
                               {{ old('is_lengkap', $verification->is_lengkap ? '1' : '0') === '1' ? 'checked' : '' }}>
                        <span class="text-sm text-gray-700">Lengkap</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="is_lengkap" value="0"
                               {{ old('is_lengkap', $verification->is_lengkap ? '1' : '0') === '0' ? 'checked' : '' }}>
                        <span class="text-sm text-gray-700">Tidak Lengkap</span>
                    </label>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Catatan</label>
                <textarea name="catatan" rows="4"
                          class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 resize-y">{{ old('catatan', $verification->catatan) }}</textarea>
            </div>

            <div class="flex items-center justify-end gap-3 pt-2 border-t border-gray-100">
                <a href="{{ route('administrative-verifications.index') }}"
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
