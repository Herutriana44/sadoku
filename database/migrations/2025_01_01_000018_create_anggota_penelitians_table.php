<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('anggota_penelitians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_permohonan')->constrained('penelitians')->cascadeOnDelete();
            $table->string('nama_anggota');
            $table->string('institusi')->nullable();
            $table->string('peran')->nullable();
            $table->foreignId('id_user')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anggota_penelitians');
    }
};
