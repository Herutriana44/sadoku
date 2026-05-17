<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penelitians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_users')->constrained('users')->cascadeOnDelete();
            $table->string('judul');
            $table->foreignId('id_subjek_penelitian')->constrained('subjek_penelitians');
            $table->boolean('multisenter')->default(false);
            $table->string('senter_utama')->nullable();
            $table->string('senter_penelitian_satelit')->nullable();
            $table->foreignId('id_jenis_penelitian')->constrained('jenis_penelitians');
            $table->boolean('komisi_etik_lain')->default(false);
            $table->foreignId('id_jenis_sponsor')->constrained('jenis_sponsors');
            $table->bigInteger('dana_penelitian')->nullable();
            $table->text('deskripsi_pendanaan')->nullable();
            $table->date('tanggal_mulai');
            $table->date('tanggal_berakhir');
            $table->string('tempat_penelitian');
            $table->string('pembimbing1')->nullable();
            $table->string('pembimbing2')->nullable();
            $table->text('ringkasan_penelitian')->nullable();
            $table->text('penelitian_terdahulu')->nullable();
            $table->string('jenis_desain_penelitian')->nullable();
            $table->text('informasi_penelitian')->nullable();
            $table->json('dokumen_pendukung')->nullable(); // list path file
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penelitians');
    }
};
