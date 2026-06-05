@extends('layouts.app')

@section('title', 'Pengajuan Penelitian')
@section('header', 'Pengajuan Penelitian')
@section('subheader', 'Daftar seluruh pengajuan etik penelitian')

@section('content')

<div class="bg-white rounded-xl shadow-sm border border-gray-100">
    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
        <span class="text-sm text-gray-500">{{ $submissions->count() }} pengajuan ditemukan</span>
        <a href="{{ route('submissions.create') }}"
           class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition-colors font-medium">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Ajukan Penelitian
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul Penelitian</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Peneliti</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Ajuan</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($submissions as $submission)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 text-gray-400 font-mono text-xs">{{ $submission->id }}</td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-800">{{ $submission->judul_penelitian }}</div>
                        <div class="text-xs text-gray-400 mt-0.5 line-clamp-1">{{ Str::limit($submission->abstrak, 80) }}</div>
                    </td>
                    <td class="px-6 py-4 text-gray-600">{{ $submission->user->name ?? '-' }}</td>
                    <td class="px-6 py-4">
                        @include('partials.status-badge', ['status' => $submission->status])
                    </td>
                    <td class="px-6 py-4 text-gray-500 whitespace-nowrap">
                        {{ $submission->created_at->format('d M Y') }}
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('submissions.show', $submission) }}"
                               class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-blue-600 bg-blue-50 rounded-md hover:bg-blue-100 transition-colors">
                                Detail
                            </a>
                            <a href="{{ route('submissions.edit', $submission) }}"
                               class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-gray-600 bg-gray-100 rounded-md hover:bg-gray-200 transition-colors">
                                Edit
                            </a>
                            <form action="{{ route('submissions.destroy', $submission) }}" method="POST"
                                  onsubmit="return confirm('Hapus pengajuan ini?')">
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
                    <td colspan="6" class="px-6 py-12 text-center">
                        <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <p class="text-gray-400">Belum ada pengajuan penelitian</p>
                        <a href="{{ route('submissions.create') }}" class="mt-2 inline-block text-sm text-blue-600 hover:underline">
                            Buat pengajuan pertama
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
