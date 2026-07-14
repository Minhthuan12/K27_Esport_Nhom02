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
        Schema::create('tai_tro_giai_daus', function (Blueprint $table) {
            $table->id();
            $table->integer('id_nha_tai_tro');
            $table->integer('id_giai_dau');
            $table->integer('tong_tai_tro');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tai_tro_giai_daus');
    }
};