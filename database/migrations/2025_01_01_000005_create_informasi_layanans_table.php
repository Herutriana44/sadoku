<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('informasi_layanans', function (Blueprint $table) {
            $table->id();
            $table->string('pathfile');
            $table->enum('guidline', ['guidline_etik_riset', 'form_permohonan_riset']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('informasi_layanans');
    }
};
