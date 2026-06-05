@extends('layouts.app')

@section('title', 'Penugasan Reviewer')
@section('header', 'Penugasan Reviewer')
@section('subheader', 'Daftar penugasan dan plotting rapat reviewer')

@section('content')

<div class="bg-white rounded-xl shadow-sm border border-gray-100">
    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
        <span class="text-sm text-gray-500">{{ $assignments->count() }} penugasan</span>
        <a href="{{ route('review-assignments.create') }}"
           class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition-colors font-medium">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Penugasan
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pengajuan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Reviewer</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal Rapat</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($assignments as $ra)
                @php
                $statusBadge = [
                    'pending'  => 'bg-yellow-100 text-yellow-700',
                    'diterima' => 'bg-blue-100 text-blue-700',
                    'selesai'  => 'bg-green-100 text-green-700',
                ];
                @endphp
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 text-gray-400 font-mono text-xs">{{ $ra->id }}</td>
                    <td class="px-6 py-4">
                        @if($ra->submission)
                        <a href="{{ route('submissions.show', $ra->submission) }}"
                           class="text-blue-600 hover:underline text-sm">
                            {{ Str::limit($ra->submission->judul_penelitian, 50) }}
                        </a>
                        @else
                        <span class="text-gray-400">—</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-gray-600">{{ $ra->reviewer->name ?? 'Rapat Pleno' }}</td>
                    <td class="px-6 py-4 text-gray-600 text-sm">
                        {{ $ra->tanggal_rapat ? \Carbon\Carbon::parse($ra->tanggal_rapat)->format('d M Y H:i') : '—' }}
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex px-2.5 py-1 rounded-full text-xs font-medium {{ $statusBadge[$ra->status_penugasan] ?? 'bg-gray-100 text-gray-600' }}">
                            {{ ucfirst($ra->status_penugasan) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('review-assignments.edit', $ra) }}"
                               class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-gray-600 bg-gray-100 rounded-md hover:bg-gray-200 transition-colors">
                                Edit
                            </a>
                            <form action="{{ route('review-assignments.destroy', $ra) }}" method="POST"
                                  onsubmit="return confirm('Hapus penugasan ini?')">
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
                    <td colspan="6" class="px-6 py-12 text-center text-gray-400">Belum ada penugasan reviewer</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
