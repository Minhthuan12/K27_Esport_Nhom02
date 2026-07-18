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
        Schema::create('nha_tai_tros', function (Blueprint $table) {
            $table->id();
            $table->string('ten_nha_tai_tro');
            $table->longText('logo')->nullable();
            $table->string('ten_nguoi_dai_dien');
            $table->string('so_dien_thoai_dai_dien');
            $table->string('email_dai_dien')->nullable();
            $table->string('website')->nullable();
            $table->text('mo_ta')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nha_tai_tros');
    }
};