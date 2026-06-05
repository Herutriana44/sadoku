@extends('layouts.app')

@section('title', 'Dashboard')
@section('header', 'Dashboard')
@section('subheader', 'Ringkasan status pengajuan etik penelitian')

@section('content')

{{-- Stat Cards --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 flex items-center gap-4">
        <div class="p-3 bg-blue-100 rounded-lg">
            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
        </div>
        <div>
            <p class="text-sm text-gray-500">Total Pengajuan</p>
            <p class="text-2xl font-bold text-gray-800">{{ $totalSubmissions }}</p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 flex items-center gap-4">
        <div class="p-3 bg-yellow-100 rounded-lg">
            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <div>
            <p class="text-sm text-gray-500">Menunggu Proses</p>
            <p class="text-2xl font-bold text-gray-800">{{ $diajukan }}</p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 flex items-center gap-4">
        <div class="p-3 bg-green-100 rounded-lg">
            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <div>
            <p class="text-sm text-gray-500">Disetujui</p>
            <p class="text-2xl font-bold text-gray-800">{{ $disetujui }}</p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 flex items-center gap-4">
        <div class="p-3 bg-purple-100 rounded-lg">
            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"/>
            </svg>
        </div>
        <div>
            <p class="text-sm text-gray-500">Sertifikat Etik</p>
            <p class="text-2xl font-bold text-gray-800">{{ $sertifikatDiterbitkan }}</p>
        </div>
    </div>

</div>

{{-- Row 2: More stats --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 flex items-center gap-4">
        <div class="p-3 bg-indigo-100 rounded-lg">
            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
            </svg>
        </div>
        <div>
            <p class="text-sm text-gray-500">Dalam Proses Telaah</p>
            <p class="text-2xl font-bold text-gray-800">{{ $prosesTelaah }}</p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 flex items-center gap-4">
        <div class="p-3 bg-orange-100 rounded-lg">
            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
            </svg>
        </div>
        <div>
            <p class="text-sm text-gray-500">Perlu Perbaikan</p>
            <p class="text-2xl font-bold text-gray-800">{{ $perluPerbaikan }}</p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 flex items-center gap-4">
        <div class="p-3 bg-teal-100 rounded-lg">
            <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
            </svg>
        </div>
        <div>
            <p class="text-sm text-gray-500">Total Review</p>
            <p class="text-2xl font-bold text-gray-800">{{ $totalReviews }}</p>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 flex items-center gap-4">
        <div class="p-3 bg-red-100 rounded-lg">
            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <div>
            <p class="text-sm text-gray-500">Tidak Disetujui</p>
            <p class="text-2xl font-bold text-gray-800">{{ $tidakDisetujui }}</p>
        </div>
    </div>

</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- Tabel Pengajuan Terbaru --}}
    <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-100">
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
            <h2 class="font-semibold text-gray-800">Pengajuan Terbaru</h2>
            <a href="{{ route('submissions.index') }}" class="text-sm text-blue-600 hover:underline">Lihat semua →</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Peneliti</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($recentSubmissions as $submission)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-3">
                            <a href="{{ route('submissions.show', $submission) }}"
                               class="text-blue-600 hover:underline font-medium line-clamp-1">
                                {{ $submission->judul_penelitian }}
                            </a>
                        </td>
                        <td class="px-6 py-3 text-gray-600">{{ $submission->user->name ?? '-' }}</td>
                        <td class="px-6 py-3">
                            @include('partials.status-badge', ['status' => $submission->status])
                        </td>
                        <td class="px-6 py-3 text-gray-500 whitespace-nowrap">
                            {{ $submission->created_at->format('d M Y') }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-gray-400">Belum ada pengajuan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Distribusi Status --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
        <div class="px-6 py-4 border-b border-gray-100">
            <h2 class="font-semibold text-gray-800">Distribusi Status</h2>
        </div>
        <div class="p-6 space-y-3">
            @php
            $statusList = [
                'diajukan'                => ['label' => 'Diajukan',              'color' => 'bg-blue-500'],
                'perbaikan_administrasi'  => ['label' => 'Perbaikan Administrasi','color' => 'bg-orange-400'],
                'proses_telaah'           => ['label' => 'Proses Telaah',         'color' => 'bg-indigo-500'],
                'perbaikan_minor'         => ['label' => 'Perbaikan Minor',       'color' => 'bg-yellow-400'],
                'perbaikan_mayor'         => ['label' => 'Perbaikan Mayor',       'color' => 'bg-orange-500'],
                'disetujui'               => ['label' => 'Disetujui',             'color' => 'bg-green-500'],
                'tidak_disetujui'         => ['label' => 'Tidak Disetujui',       'color' => 'bg-red-500'],
            ];
            @endphp

            @foreach($statusList as $key => $info)
            @php
                $count = $statusDistribution[$key] ?? 0;
                $pct   = $totalSubmissions > 0 ? round(($count / $totalSubmissions) * 100) : 0;
            @endphp
            <div>
                <div class="flex justify-between text-xs text-gray-600 mb-1">
                    <span>{{ $info['label'] }}</span>
                    <span class="font-medium">{{ $count }}</span>
                </div>
                <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                    <div class="{{ $info['color'] }} h-2 rounded-full transition-all" style="width: {{ $pct }}%"></div>
                </div>
            </div>
            @endforeach

            {{-- Aksi cepat --}}
            <div class="pt-4 border-t border-gray-100 space-y-2">
                <a href="{{ route('submissions.create') }}"
                   class="flex items-center justify-center gap-2 w-full py-2 px-4 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition-colors font-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Ajukan Penelitian Baru
                </a>
                @if($verifikasiPending > 0)
                <a href="{{ route('administrative-verifications.index') }}"
                   class="flex items-center justify-center gap-2 w-full py-2 px-4 bg-yellow-50 text-yellow-700 border border-yellow-200 text-sm rounded-lg hover:bg-yellow-100 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ $verifikasiPending }} Verifikasi Belum Lengkap
                </a>
                @endif
                @if($reviewAssignmentPending > 0)
                <a href="{{ route('review-assignments.index') }}"
                   class="flex items-center justify-center gap-2 w-full py-2 px-4 bg-indigo-50 text-indigo-700 border border-indigo-200 text-sm rounded-lg hover:bg-indigo-100 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857"/>
                    </svg>
                    {{ $reviewAssignmentPending }} Penugasan Pending
                </a>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection
