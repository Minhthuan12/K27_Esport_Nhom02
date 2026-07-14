<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NhaTaiTro extends Model
{
    use SoftDeletes;

    protected $table = 'nha_tai_tros';

    protected $fillable = [
        'ten_nha_tai_tro',
        'logo',
        'ten_nguoi_dai_dien',
        'so_dien_thoai_dai_dien',
        'email_dai_dien',
        'website',
        'mo_ta',
    ];
}