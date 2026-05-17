<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visis', function (Blueprint $table) {
            $table->id();
            $table->text('teks_visi');
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });

        Schema::create('misis', function (Blueprint $table) {
            $table->id();
            $table->text('teks_misi');
            $table->integer('urutan')->default(1);
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('misis');
        Schema::dropIfExists('visis');
    }
};
