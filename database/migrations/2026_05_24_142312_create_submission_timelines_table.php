<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('submission_timelines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('submission_id')->constrained();
            $table->enum('tahap', ['verifikasi_administrasi', 'telaah_exempted', 'telaah_expedited', 'telaah_full_board']);
            $table->timestamp('tanggal_mulai');
            $table->timestamp('deadline');
            $table->timestamp('tanggal_selesai')->nullable();
            $table->enum('status_sla', ['on_track', 'overdue', 'completed']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submission_timelines');
    }
};
