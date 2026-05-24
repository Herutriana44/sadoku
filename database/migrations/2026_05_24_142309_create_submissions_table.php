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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('judul_penelitian');
            $table->text('abstrak');
            $table->string('berkas_path');
            $table->enum('status', ['diajukan', 'perbaikan_administrasi', 'proses_telaah', 'perbaikan_minor', 'perbaikan_mayor', 'disetujui', 'tidak_disetujui']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
