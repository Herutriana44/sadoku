<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SADOKU') — Sistem Administrasi Dokumen KEPK</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen font-sans">

    {{-- Navbar --}}
    <nav class="bg-blue-800 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center gap-3">
                    <span class="text-2xl font-bold tracking-wide">SADOKU</span>
                    <span class="hidden sm:block text-blue-200 text-sm">Sistem Administrasi Dokumen KEPK</span>
                </div>
                <div class="flex items-center gap-2 text-sm">
                    <span class="text-blue-200">Selamat datang</span>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex min-h-[calc(100vh-4rem)]">

        {{-- Sidebar --}}
        <aside class="w-64 bg-white shadow-md flex-shrink-0">
            <nav class="py-4">
                <div class="px-4 pb-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Menu Utama</div>

                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium transition-colors
                          {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-700 border-r-4 border-blue-700' : 'text-gray-700 hover:bg-gray-50' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Dashboard
                </a>

                <div class="px-4 pt-4 pb-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Pengajuan</div>

                <a href="{{ route('submissions.index') }}"
                   class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium transition-colors
                          {{ request()->routeIs('submissions.*') ? 'bg-blue-50 text-blue-700 border-r-4 border-blue-700' : 'text-gray-700 hover:bg-gray-50' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Pengajuan Penelitian
                </a>

                <a href="{{ route('submission-revisions.index') }}"
                   class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium transition-colors
                          {{ request()->routeIs('submission-revisions.*') ? 'bg-blue-50 text-blue-700 border-r-4 border-blue-700' : 'text-gray-700 hover:bg-gray-50' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Revisi Berkas
                </a>

                <div class="px-4 pt-4 pb-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Verifikasi & Review</div>

                <a href="{{ route('administrative-verifications.index') }}"
                   class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium transition-colors
                          {{ request()->routeIs('administrative-verifications.*') ? 'bg-blue-50 text-blue-700 border-r-4 border-blue-700' : 'text-gray-700 hover:bg-gray-50' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                    </svg>
                    Verifikasi Administrasi
                </a>

                <a href="{{ route('reviews.index') }}"
                   class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium transition-colors
                          {{ request()->routeIs('reviews.*') ? 'bg-blue-50 text-blue-700 border-r-4 border-blue-700' : 'text-gray-700 hover:bg-gray-50' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    Telaah / Review
                </a>

                <a href="{{ route('review-assignments.index') }}"
                   class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium transition-colors
                          {{ request()->routeIs('review-assignments.*') ? 'bg-blue-50 text-blue-700 border-r-4 border-blue-700' : 'text-gray-700 hover:bg-gray-50' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    Penugasan Reviewer
                </a>

                <div class="px-4 pt-4 pb-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Keputusan</div>

                <a href="{{ route('final-decisions.index') }}"
                   class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium transition-colors
                          {{ request()->routeIs('final-decisions.*') ? 'bg-blue-50 text-blue-700 border-r-4 border-blue-700' : 'text-gray-700 hover:bg-gray-50' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Keputusan Akhir
                </a>
            </nav>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 p-6 overflow-auto">
            {{-- Page Header --}}
            @hasSection('header')
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-800">@yield('header')</h1>
                @hasSection('subheader')
                <p class="text-gray-500 mt-1 text-sm">@yield('subheader')</p>
                @endif
            </div>
            @endif

            {{-- Flash Messages --}}
            @if(session('success'))
            <div class="mb-4 flex items-center gap-3 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg text-sm">
                <svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="mb-4 flex items-center gap-3 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg text-sm">
                <svg class="w-5 h-5 text-red-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                {{ session('error') }}
            </div>
            @endif

            @if($errors->any())
            <div class="mb-4 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg text-sm">
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @yield('content')
        </main>
    </div>

    {{-- Footer --}}
    <footer class="bg-white border-t border-gray-200 text-center py-3 text-xs text-gray-400">
        SADOKU &copy; {{ date('Y') }} — Komite Etik Penelitian Kesehatan
    </footer>

</body>
</html>
