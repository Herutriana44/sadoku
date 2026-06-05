@extends('layouts.app')

@section('title', 'Tambah Keputusan')
@section('header', 'Keputusan Akhir')
@section('subheader', 'Tambah keputusan akhir Ketua KEPK')

@section('content')

<div class="max-w-2xl">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
        <div class="px-6 py-4 border-b border-gray-100">
            <h2 class="font-semibold text-gray-800">Formulir Keputusan</h2>
        </div>
        <form action="{{ route('final-decisions.store') }}" method="POST" class="p-6 space-y-5">
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
                    Ketua KEPK <span class="text-red-500">*</span>
                </label>
                <select name="ketua_id"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white
                               @error('ketua_id') border-red-400 @enderror">
                    <option value="">— Pilih Ketua —</option>
                    @foreach($ketuas as $user)
                    <option value="{{ $user->id }}" {{ old('ketua_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                    @endforeach
                </select>
                @error('ketua_id')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">
                    Hasil Keputusan <span class="text-red-500">*</span>
                </label>
                <select name="hasil_keputusan" id="hasil_keputusan"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white
                               @error('hasil_keputusan') border-red-400 @enderror"
                        onchange="toggleSertifikat(this.value)">
                    <option value="">— Pilih Hasil —</option>
                    <option value="disetujui" {{ old('hasil_keputusan') === 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                    <option value="perbaikan_minor" {{ old('hasil_keputusan') === 'perbaikan_minor' ? 'selected' : '' }}>Perbaikan Minor</option>
                    <option value="perbaikan_mayor" {{ old('hasil_keputusan') === 'perbaikan_mayor' ? 'selected' : '' }}>Perbaikan Mayor</option>
                    <option value="tidak_disetujui" {{ old('hasil_keputusan') === 'tidak_disetujui' ? 'selected' : '' }}>Tidak Disetujui</option>
                </select>
                @error('hasil_keputusan')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div id="sertifikat_field" class="{{ old('hasil_keputusan') === 'disetujui' ? '' : 'hidden' }}">
                <label class="block text-sm font-medium text-gray-700 mb-1.5">No. Sertifikat Etik</label>
                <input type="text" name="no_sertifikat_etik" value="{{ old('no_sertifikat_etik') }}"
                       placeholder="Contoh: KEPK/ETH/2026/001"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                <p class="mt-1 text-xs text-gray-400">Diisi jika penelitian disetujui</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Catatan</label>
                <textarea name="catatan" rows="4" placeholder="Catatan keputusan (opsional)..."
                          class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 resize-y">{{ old('catatan') }}</textarea>
            </div>

            <div class="flex items-center justify-end gap-3 pt-2 border-t border-gray-100">
                <a href="{{ route('final-decisions.index') }}"
                   class="px-4 py-2 text-sm font-medium text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                    Batal
                </a>
                <button type="submit"
                        class="px-6 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors">
                    Simpan Keputusan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function toggleSertifikat(val) {
    const el = document.getElementById('sertifikat_field');
    el.classList.toggle('hidden', val !== 'disetujui');
}
</script>

@endsection
