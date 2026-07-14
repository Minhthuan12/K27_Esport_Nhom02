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
        Schema::create('tuyen_thus', function (Blueprint $table) {
            $table->id();
            $table->integer('id_doi_tuyen');
            $table->string('ho_va_ten');
            $table->string('nickname');
            $table->date('ngay_sinh');
            $table->string('gioi_tinh');
            $table->string('quoc_tich');
            $table->string('vi_tri_thi_dau');
            $table->string('email')->nullable();
            $table->string('so_dien_thoai')->nullable();
            $table->string('anh_dai_dien')->nullable();
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
        Schema::dropIfExists('tuyen_thus');
    }
};