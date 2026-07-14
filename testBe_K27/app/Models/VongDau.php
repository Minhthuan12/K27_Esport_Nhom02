<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VongDau extends Model
{
    use SoftDeletes;

    protected $table = 'vong_daus';

    protected $fillable = [
        'id_giai_dau',
        'ten_vong_dau',
        'so_doi_tham_gia',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'hinh_thuc_thi_dau',
        'dia_diem',
        'trang_thai',
    ];
}