<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TuyenThu extends Model
{
    use SoftDeletes;

    protected $table = 'tuyen_thus';

    protected $fillable = [
        'id_doi_tuyen',
        'ho_va_ten',
        'nickname',
        'ngay_sinh',
        'gioi_tinh',
        'quoc_tich',
        'vi_tri_thi_dau',
        'email',
        'so_dien_thoai',
        'anh_dai_dien',
        'trang_thai',
    ];
}