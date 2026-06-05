@extends('layouts.app')

@section('title', 'Verifikasi Administrasi')
@section('header', 'Verifikasi Administrasi')
@section('subheader', 'Daftar hasil verifikasi kelengkapan berkas')

@section('content')

<div class="bg-white rounded-xl shadow-sm border border-gray-100">
    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
        <span class="text-sm text-gray-500">{{ $verifications->count() }} data verifikasi</span>
        <a href="{{ route('administrative-verifications.create') }}"
           class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition-colors font-medium">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Verifikasi
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pengajuan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sekretariat</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kelengkapan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Catatan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($verifications as $av)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 text-gray-400 font-mono text-xs">{{ $av->id }}</td>
                    <td class="px-6 py-4">
                        @if($av->submission)
                        <a href="{{ route('submissions.show', $av->submission) }}"
                           class="text-blue-600 hover:underline text-sm font-medium">
                            {{ Str::limit($av->submission->judul_penelitian, 50) }}
                        </a>
                        @else
                        <span class="text-gray-400">—</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-gray-600">{{ $av->sekretariat->name ?? '-' }}</td>
                    <td class="px-6 py-4">
                        @if($av->is_lengkap)
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-full">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Lengkap
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-red-100 text-red-700 text-xs font-medium rounded-full">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Tidak Lengkap
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-gray-600 text-sm">{{ Str::limit($av->catatan ?? '-', 60) }}</td>
                    <td class="px-6 py-4 text-gray-500 text-xs whitespace-nowrap">{{ $av->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('administrative-verifications.edit', $av) }}"
                               class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-gray-600 bg-gray-100 rounded-md hover:bg-gray-200 transition-colors">
                                Edit
                            </a>
                            <form action="{{ route('administrative-verifications.destroy', $av) }}" method="POST"
                                  onsubmit="return confirm('Hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-red-600 bg-red-50 rounded-md hover:bg-red-100 transition-colors">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-12 text-center text-gray-400">Belum ada data verifikasi</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
