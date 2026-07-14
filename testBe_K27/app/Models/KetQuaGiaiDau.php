<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KetQuaGiaiDau extends Model
{
    use SoftDeletes;

    protected $table = 'ket_qua_giai_daus';

    protected $fillable = [
        'id_giai_dau',
        'id_doi_tuyen',
        'id_giai_thuong',
        'hang',
        'diem_tong',
        'trang_thai',
    ];
}