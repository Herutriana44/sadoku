<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tarif_laik_etik_riset_inovasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori');
            $table->decimal('nominal_tarif', 15, 2);
            $table->text('deskripsi')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tarif_laik_etik_riset_inovasis');
    }
};
