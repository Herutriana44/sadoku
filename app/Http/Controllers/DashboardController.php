<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\Review;
use App\Models\AdministrativeVerification;
use App\Models\FinalDecision;
use App\Models\ReviewAssignment;

class DashboardController extends Controller
{
    public function index()
    {
        // Ringkasan per status
        $totalSubmissions  = Submission::count();
        $diajukan          = Submission::where('status', 'diajukan')->count();
        $prosesTelaah      = Submission::where('status', 'proses_telaah')->count();
        $disetujui         = Submission::where('status', 'disetujui')->count();
        $tidakDisetujui    = Submission::where('status', 'tidak_disetujui')->count();
        $perluPerbaikan    = Submission::whereIn('status', ['perbaikan_administrasi', 'perbaikan_minor', 'perbaikan_mayor'])->count();

        // Statistik lain
        $totalReviews          = Review::count();
        $verifikasiPending     = AdministrativeVerification::where('is_lengkap', false)->count();
        $reviewAssignmentPending = ReviewAssignment::where('status_penugasan', 'pending')->count();
        $sertifikatDiterbitkan = FinalDecision::whereNotNull('no_sertifikat_etik')->count();

        // 10 pengajuan terbaru
        $recentSubmissions = Submission::with('user')
            ->latest()
            ->take(10)
            ->get();

        // Distribusi status untuk tabel ringkasan
        $statusDistribution = Submission::selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        return view('dashboard', compact(
            'totalSubmissions',
            'diajukan',
            'prosesTelaah',
            'disetujui',
            'tidakDisetujui',
            'perluPerbaikan',
            'totalReviews',
            'verifikasiPending',
            'reviewAssignmentPending',
            'sertifikatDiterbitkan',
            'recentSubmissions',
            'statusDistribution'
        ));
    }
}
