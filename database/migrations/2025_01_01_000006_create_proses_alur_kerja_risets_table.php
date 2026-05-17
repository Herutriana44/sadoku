<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('proses_alur_kerja_risets', function (Blueprint $table) {
            $table->id();
            $table->text('persyaratan');
            $table->timestamps();
        });

        Schema::create('proses_alur_kerja_risets_lampiran', function (Blueprint $table) {
            $table->id();
            $table->string('gambar');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proses_alur_kerja_risets_lampiran');
        Schema::dropIfExists('proses_alur_kerja_risets');
    }
};
