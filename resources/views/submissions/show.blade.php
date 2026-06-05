@extends('layouts.app')

@section('title', 'Detail Pengajuan')
@section('header', 'Detail Pengajuan')
@section('subheader', $submission->judul_penelitian)

@section('content')

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- Info Utama --}}
    <div class="lg:col-span-2 space-y-6">

        {{-- Data Pengajuan --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800">Informasi Pengajuan</h2>
                @include('partials.status-badge', ['status' => $submission->status])
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <p class="text-xs text-gray-400 uppercase font-medium mb-1">Judul Penelitian</p>
                    <p class="text-gray-800 font-medium">{{ $submission->judul_penelitian }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase font-medium mb-1">Peneliti</p>
                    <p class="text-gray-700">{{ $submission->user->name ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase font-medium mb-1">Abstrak</p>
                    <p class="text-gray-700 text-sm leading-relaxed">{{ $submission->abstrak }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase font-medium mb-1">Berkas</p>
                    <p class="text-gray-600 text-sm font-mono bg-gray-50 rounded px-3 py-2">{{ $submission->berkas_path }}</p>
                </div>
                <div class="grid grid-cols-2 gap-4 pt-2">
                    <div>
                        <p class="text-xs text-gray-400 uppercase font-medium mb-1">Tanggal Ajuan</p>
                        <p class="text-gray-700 text-sm">{{ $submission->created_at->format('d M Y H:i') }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 uppercase font-medium mb-1">Terakhir Diperbarui</p>
                        <p class="text-gray-700 text-sm">{{ $submission->updated_at->format('d M Y H:i') }}</p>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-3 px-6 py-4 border-t border-gray-100 bg-gray-50 rounded-b-xl">
                <a href="{{ route('submissions.edit', $submission) }}"
                   class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Edit
                </a>
                <form action="{{ route('submissions.destroy', $submission) }}" method="POST"
                      onsubmit="return confirm('Hapus pengajuan ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-red-600 bg-red-50 border border-red-200 rounded-lg hover:bg-red-100 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Hapus
                    </button>
                </form>
                <a href="{{ route('submissions.index') }}" class="ml-auto text-sm text-gray-400 hover:text-gray-600">
                    ← Kembali
                </a>
            </div>
        </div>

        {{-- Revisi --}}
        @if($submission->revisions->count() > 0)
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="px-6 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800">Riwayat Revisi</h2>
            </div>
            <div class="divide-y divide-gray-100">
                @foreach($submission->revisions->sortByDesc('versi') as $rev)
                <div class="px-6 py-4">
                    <div class="flex items-center justify-between mb-1">
                        <span class="text-sm font-medium text-gray-700">Versi {{ $rev->versi }}</span>
                        <span class="text-xs px-2 py-0.5 rounded-full
                            {{ $rev->tipe_perbaikan === 'administrasi' ? 'bg-orange-100 text-orange-700' : ($rev->tipe_perbaikan === 'minor' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') }}">
                            {{ ucfirst($rev->tipe_perbaikan) }}
                        </span>
                    </div>
                    <p class="text-xs text-gray-400 font-mono">{{ $rev->berkas_revisi_path }}</p>
                    @if($rev->catatan_peneliti)
                    <p class="text-sm text-gray-600 mt-1">{{ $rev->catatan_peneliti }}</p>
                    @endif
                    <p class="text-xs text-gray-400 mt-1">{{ $rev->created_at->format('d M Y H:i') }}</p>
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>

    {{-- Panel Kanan --}}
    <div class="space-y-6">

        {{-- Verifikasi Administrasi --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="px-6 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800 text-sm">Verifikasi Administrasi</h2>
            </div>
            <div class="p-6">
                @if($submission->administrativeVerification)
                    @php $av = $submission->administrativeVerification; @endphp
                    <div class="flex items-center gap-3 mb-3">
                        @if($av->is_lengkap)
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-green-100 text-green-700 text-sm font-medium rounded-lg">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Lengkap
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-red-100 text-red-700 text-sm font-medium rounded-lg">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Tidak Lengkap
                            </span>
                        @endif
                    </div>
                    @if($av->catatan)
                    <p class="text-sm text-gray-600 bg-gray-50 rounded-lg p-3">{{ $av->catatan }}</p>
                    @endif
                    <p class="text-xs text-gray-400 mt-2">Oleh: {{ $av->sekretariat->name ?? '-' }}</p>
                @else
                    <p class="text-sm text-gray-400 text-center py-3">Belum diverifikasi</p>
                @endif
            </div>
        </div>

        {{-- Keputusan Akhir --}}
        @if($submission->finalDecision)
        @php $fd = $submission->finalDecision; @endphp
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="px-6 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800 text-sm">Keputusan Akhir</h2>
            </div>
            <div class="p-6">
                <div class="mb-3">
                    @php
                    $fdBadge = [
                        'disetujui' => 'bg-green-100 text-green-700',
                        'perbaikan_minor' => 'bg-yellow-100 text-yellow-700',
                        'perbaikan_mayor' => 'bg-orange-100 text-orange-700',
                        'tidak_disetujui' => 'bg-red-100 text-red-700',
                    ];
                    $fdLabel = [
                        'disetujui' => 'Disetujui',
                        'perbaikan_minor' => 'Perbaikan Minor',
                        'perbaikan_mayor' => 'Perbaikan Mayor',
                        'tidak_disetujui' => 'Tidak Disetujui',
                    ];
                    @endphp
                    <span class="inline-flex px-3 py-1.5 rounded-lg text-sm font-medium {{ $fdBadge[$fd->hasil_keputusan] ?? 'bg-gray-100 text-gray-600' }}">
                        {{ $fdLabel[$fd->hasil_keputusan] ?? $fd->hasil_keputusan }}
                    </span>
                </div>
                @if($fd->no_sertifikat_etik)
                <div class="bg-green-50 border border-green-200 rounded-lg p-3 mb-3">
                    <p class="text-xs text-green-600 font-medium uppercase mb-1">No. Sertifikat Etik</p>
                    <p class="text-green-800 font-mono text-sm">{{ $fd->no_sertifikat_etik }}</p>
                </div>
                @endif
                @if($fd->catatan)
                <p class="text-sm text-gray-600 bg-gray-50 rounded-lg p-3">{{ $fd->catatan }}</p>
                @endif
                <p class="text-xs text-gray-400 mt-2">Oleh: {{ $fd->ketua->name ?? '-' }}</p>
            </div>
        </div>
        @endif

        {{-- Review --}}
        @if($submission->reviews->count() > 0)
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="px-6 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800 text-sm">Hasil Review</h2>
            </div>
            <div class="divide-y divide-gray-100">
                @foreach($submission->reviews as $review)
                <div class="p-4">
                    <div class="flex items-center justify-between mb-1">
                        <span class="text-xs text-gray-500">{{ $review->reviewer->name ?? 'Full Board' }}</span>
                        <span class="text-xs px-2 py-0.5 rounded-full
                            {{ $review->rekomendasi_hasil === 'disetujui' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                            {{ ucfirst(str_replace('_', ' ', $review->rekomendasi_hasil)) }}
                        </span>
                    </div>
                    @if($review->catatan_review)
                    <p class="text-xs text-gray-600">{{ $review->catatan_review }}</p>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</div>

@endsection
