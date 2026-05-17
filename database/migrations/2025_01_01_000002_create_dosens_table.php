<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dosens', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->foreignId('id_user')->constrained('users')->cascadeOnDelete();
            $table->string('nama_lengkap');
            $table->string('nidn')->nullable();
            $table->string('prodi');
            $table->string('fakultas');
            $table->string('universitas');
            $table->string('jabatan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};
