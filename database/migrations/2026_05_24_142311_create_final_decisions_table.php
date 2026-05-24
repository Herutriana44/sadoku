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
        Schema::create('final_decisions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('submission_id')->constrained();
            $table->foreignId('ketua_id')->constrained('users', 'id');
            $table->enum('hasil_keputusan', ['disetujui', 'perbaikan_minor', 'perbaikan_mayor', 'tidak_disetujui']);
            $table->text('catatan')->nullable();
            $table->string('no_sertifikat_etik')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('final_decisions');
    }
};
