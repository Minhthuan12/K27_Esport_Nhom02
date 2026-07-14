<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GiaiDau extends Model
{
    use SoftDeletes;

    protected $table = 'giai_daus';

    protected $fillable = [
        'id_game',
        'ten_giai_dau',
        'logo',
        'mo_ta',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'dia_diem',
        'hinh_thuc_thi_dau',
        'so_luong_doi',
        'trang_thai',
    ];
}