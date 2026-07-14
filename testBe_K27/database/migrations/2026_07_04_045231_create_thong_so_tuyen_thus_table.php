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
        Schema::create('thong_so_tuyen_thus', function (Blueprint $table) {
            $table->id();
            $table->integer('id_doi_tuyen');
            $table->integer('id_game');
            $table->integer('id_tuyen_thu');
            $table->integer('trang_thai')->default(1)->comment('0: Không hoạt động, 1: Hoạt động');
            $table->integer('so_tran_thua')->default(0);
            $table->integer('so_tran_thang')->default(0);
            $table->integer('so_tran_hoa')->default(0);
            $table->integer('so_mvp')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thong_so_tuyen_thus');
    }
};