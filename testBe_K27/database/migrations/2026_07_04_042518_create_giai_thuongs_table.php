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
        Schema::create('giai_thuongs', function (Blueprint $table) {
            $table->id();
            $table->string('ten_giai_thuong');
            $table->integer('gia_tri');
            $table->boolean('is_ca_nhan')->default(false);
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
        Schema::dropIfExists('giai_thuongs');
    }
};
