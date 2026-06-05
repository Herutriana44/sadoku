@extends('layouts.app')

@section('title', 'Edit Pengajuan')
@section('header', 'Edit Pengajuan')
@section('subheader', $submission->judul_penelitian)

@section('content')

<div class="max-w-2xl">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
        <div class="px-6 py-4 border-b border-gray-100">
            <h2 class="font-semibold text-gray-800">Edit Data Pengajuan</h2>
        </div>
        <form action="{{ route('submissions.update', $submission) }}" method="POST" class="p-6 space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">
                    Judul Penelitian <span class="text-red-500">*</span>
                </label>
                <input type="text" name="judul_penelitian"
                       value="{{ old('judul_penelitian', $submission->judul_penelitian) }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent
                              @error('judul_penelitian') border-red-400 @enderror">
                @error('judul_penelitian')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">
                    Abstrak <span class="text-red-500">*</span>
                </label>
                <textarea name="abstrak" rows="6"
                          class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-y
                                 @error('abstrak') border-red-400 @enderror">{{ old('abstrak', $submission->abstrak) }}</textarea>
                @error('abstrak')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">
                    Path Berkas <span class="text-red-500">*</span>
                </label>
                <input type="text" name="berkas_path"
                       value="{{ old('berkas_path', $submission->berkas_path) }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent
                              @error('berkas_path') border-red-400 @enderror">
                @error('berkas_path')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1.5">Status</label>
                <select name="status"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white
                               @error('status') border-red-400 @enderror">
                    @php
                    $statuses = [
                        'diajukan'               => 'Diajukan',
                        'perbaikan_administrasi' => 'Perbaikan Administrasi',
                        'proses_telaah'          => 'Proses Telaah',
                        'perbaikan_minor'        => 'Perbaikan Minor',
                        'perbaikan_mayor'        => 'Perbaikan Mayor',
                        'disetujui'              => 'Disetujui',
                        'tidak_disetujui'        => 'Tidak Disetujui',
                    ];
                    @endphp
                    @foreach($statuses as $val => $label)
                    <option value="{{ $val }}" {{ old('status', $submission->status) === $val ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                    @endforeach
                </select>
                @error('status')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end gap-3 pt-2 border-t border-gray-100">
                <a href="{{ route('submissions.show', $submission) }}"
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
