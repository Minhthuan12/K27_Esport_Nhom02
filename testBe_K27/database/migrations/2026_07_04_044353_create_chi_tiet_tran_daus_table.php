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
        Schema::create('chi_tiet_tran_daus', function (Blueprint $table) {
            $table->id();
            $table->integer('id_giai_dau');
            $table->integer('id_vong_dau');
            $table->integer('id_tran_dau');
            $table->integer('id_doi_tuyen');
            $table->integer('diem_so_tran_dau');
            $table->integer('trang_thai')->default(1)->comment('0: Không hoạt động, 1: Hoạt động');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_tran_daus');
    }
};