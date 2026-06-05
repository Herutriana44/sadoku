@extends('layouts.app')

@section('title', 'Keputusan Akhir')
@section('header', 'Keputusan Akhir')
@section('subheader', 'Daftar keputusan akhir dari Ketua KEPK')

@section('content')

<div class="bg-white rounded-xl shadow-sm border border-gray-100">
    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
        <span class="text-sm text-gray-500">{{ $finalDecisions->count() }} keputusan</span>
        <a href="{{ route('final-decisions.create') }}"
           class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition-colors font-medium">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Keputusan
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pengajuan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ketua</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Hasil</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No. Sertifikat</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($finalDecisions as $fd)
                @php
                $fdBadge = [
                    'disetujui'       => 'bg-green-100 text-green-700',
                    'perbaikan_minor' => 'bg-yellow-100 text-yellow-700',
                    'perbaikan_mayor' => 'bg-orange-100 text-orange-700',
                    'tidak_disetujui' => 'bg-red-100 text-red-700',
                ];
                $fdLabel = [
                    'disetujui'       => 'Disetujui',
                    'perbaikan_minor' => 'Perbaikan Minor',
                    'perbaikan_mayor' => 'Perbaikan Mayor',
                    'tidak_disetujui' => 'Tidak Disetujui',
                ];
                @endphp
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 text-gray-400 font-mono text-xs">{{ $fd->id }}</td>
                    <td class="px-6 py-4">
                        @if($fd->submission)
                        <a href="{{ route('submissions.show', $fd->submission) }}"
                           class="text-blue-600 hover:underline text-sm">
                            {{ Str::limit($fd->submission->judul_penelitian, 50) }}
                        </a>
                        @else
                        <span class="text-gray-400">—</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-gray-600">{{ $fd->ketua->name ?? '-' }}</td>
                    <td class="px-6 py-4">
                        <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-medium {{ $fdBadge[$fd->hasil_keputusan] ?? 'bg-gray-100 text-gray-600' }}">
                            {{ $fdLabel[$fd->hasil_keputusan] ?? $fd->hasil_keputusan }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        @if($fd->no_sertifikat_etik)
                        <span class="font-mono text-xs text-green-700 bg-green-50 px-2 py-1 rounded">
                            {{ $fd->no_sertifikat_etik }}
                        </span>
                        @else
                        <span class="text-gray-300">—</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-gray-500 text-xs whitespace-nowrap">{{ $fd->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('final-decisions.edit', $fd) }}"
                               class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-gray-600 bg-gray-100 rounded-md hover:bg-gray-200 transition-colors">
                                Edit
                            </a>
                            <form action="{{ route('final-decisions.destroy', $fd) }}" method="POST"
                                  onsubmit="return confirm('Hapus keputusan ini?')">
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
                    <td colspan="7" class="px-6 py-12 text-center text-gray-400">Belum ada keputusan akhir</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
