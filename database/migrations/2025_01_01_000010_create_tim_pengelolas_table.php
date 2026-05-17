<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tim_pengelolas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('gelar')->nullable();
            $table->string('jabatan');
            $table->string('nip_nidn')->nullable();
            $table->string('foto')->nullable();
            $table->integer('urutan_tampil')->default(0);
            $table->boolean('is_tampilkan')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tim_pengelolas');
    }
};
