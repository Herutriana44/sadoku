@extends('layouts.app')

@section('title', 'Edit Keputusan')
@section('header', 'Edit Keputusan Akhir')

@section('content')

<div class="max-w-2xl">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
        <div class="px-6 py-4 border-b border-gray-100">
            <h2 class="font-semibold text-gray-800">Edit Data Keputusan</h2>
        </div>
        <form action="{{ route('final-decisions.update', $finalDecision) }}" method="POST" class="p-6 space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Hasil Keputusan</label>
                <select name="hasil_keputusan" id="hasil_keputusan"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white"
                        onchange="toggleSertifikat(this.value)">
                    @php $current = old('hasil_keputusan', $finalDecision->hasil_keputusan); @endphp
                    <option value="disetujui" {{ $current === 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                    <option value="perbaikan_minor" {{ $current === 'perbaikan_minor' ? 'selected' : '' }}>Perbaikan Minor</option>
                    <option value="perbaikan_mayor" {{ $current === 'perbaikan_mayor' ? 'selected' : '' }}>Perbaikan Mayor</option>
                    <option value="tidak_disetujui" {{ $current === 'tidak_disetujui' ? 'selected' : '' }}>Tidak Disetujui</option>
                </select>
            </div>

            <div id="sertifikat_field" class="{{ $current === 'disetujui' ? '' : 'hidden' }}">
                <label class="block text-sm font-medium text-gray-700 mb-1.5">No. Sertifikat Etik</label>
                <input type="text" name="no_sertifikat_etik"
                       value="{{ old('no_sertifikat_etik', $finalDecision->no_sertifikat_etik) }}"
                       placeholder="Contoh: KEPK/ETH/2026/001"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Catatan</label>
                <textarea name="catatan" rows="4"
                          class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 resize-y">{{ old('catatan', $finalDecision->catatan) }}</textarea>
            </div>

            <div class="flex items-center justify-end gap-3 pt-2 border-t border-gray-100">
                <a href="{{ route('final-decisions.index') }}"
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

<script>
function toggleSertifikat(val) {
    document.getElementById('sertifikat_field').classList.toggle('hidden', val !== 'disetujui');
}
</script>

@endsection
