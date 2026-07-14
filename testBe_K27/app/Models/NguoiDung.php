<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NguoiDung extends Model
{
    use SoftDeletes;

    protected $table = 'nguoi_dungs';

    protected $fillable = [
        'ho_va_ten',
        'email',
        'mat_khau',
        'so_dien_thoai',
        'dia_chi',
        'anh_dai_dien',
        'is_xac_thuc',
        'trang_thai',
        'id_chuc_vu',
    ];
}
