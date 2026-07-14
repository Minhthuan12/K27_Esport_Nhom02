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
        Schema::create('vong_daus', function (Blueprint $table) {
            $table->id();
            $table->integer('id_giai_dau');
            $table->string('ten_vong_dau');
            $table->date('ngay_bat_dau');
            $table->date('ngay_ket_thuc');
            $table->integer('so_doi_tham_gia');
            $table->string('hinh_thuc_thi_dau');
            $table->string('dia_diem');
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
        Schema::dropIfExists('vong_daus');
    }
};
