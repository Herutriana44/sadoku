@extends('layouts.app')

@section('title', 'Revisi Berkas')
@section('header', 'Revisi Berkas')
@section('subheader', 'Riwayat perbaikan berkas pengajuan penelitian')

@section('content')

<div class="bg-white rounded-xl shadow-sm border border-gray-100">
    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
        <span class="text-sm text-gray-500">{{ $revisions->count() }} revisi</span>
        <a href="{{ route('submission-revisions.create') }}"
           class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition-colors font-medium">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Revisi
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pengajuan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Versi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tipe Perbaikan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Berkas</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Catatan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($revisions as $rev)
                @php
                $tipeBadge = [
                    'administrasi' => 'bg-orange-100 text-orange-700',
                    'minor'        => 'bg-yellow-100 text-yellow-700',
                    'mayor'        => 'bg-red-100 text-red-700',
                ];
                @endphp
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 text-gray-400 font-mono text-xs">{{ $rev->id }}</td>
                    <td class="px-6 py-4">
                        @if($rev->submission)
                        <a href="{{ route('submissions.show', $rev->submission) }}"
                           class="text-blue-600 hover:underline text-sm">
                            {{ Str::limit($rev->submission->judul_penelitian, 45) }}
                        </a>
                        @else
                        <span class="text-gray-400">—</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="inline-flex items-center justify-center w-8 h-8 bg-gray-100 text-gray-700 text-xs font-bold rounded-full">
                            v{{ $rev->versi }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-medium {{ $tipeBadge[$rev->tipe_perbaikan] ?? 'bg-gray-100 text-gray-600' }}">
                            {{ ucfirst($rev->tipe_perbaikan) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-xs font-mono text-gray-500">{{ Str::limit($rev->berkas_revisi_path, 40) }}</td>
                    <td class="px-6 py-4 text-gray-600 text-sm">{{ Str::limit($rev->catatan_peneliti ?? '—', 50) }}</td>
                    <td class="px-6 py-4 text-gray-500 text-xs whitespace-nowrap">{{ $rev->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4 text-right">
                        <form action="{{ route('submission-revisions.destroy', $rev) }}" method="POST"
                              onsubmit="return confirm('Hapus revisi ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-red-600 bg-red-50 rounded-md hover:bg-red-100 transition-colors">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="px-6 py-12 text-center text-gray-400">Belum ada riwayat revisi</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
