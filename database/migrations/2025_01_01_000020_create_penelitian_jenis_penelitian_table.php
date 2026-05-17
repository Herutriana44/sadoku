<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tabel pivot untuk relasi many-to-many antara penelitians dan jenis_penelitians.
     * Karena id_jenis_penelitian bisa dipilih lebih dari satu (multioption button).
     */
    public function up(): void
    {
        Schema::create('penelitian_jenis_penelitian', function (Blueprint $table) {
            $table->foreignId('penelitian_id')->constrained('penelitians')->cascadeOnDelete();
            $table->foreignId('jenis_penelitian_id')->constrained('jenis_penelitians')->cascadeOnDelete();
            $table->primary(['penelitian_id', 'jenis_penelitian_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penelitian_jenis_penelitian');
    }
};
