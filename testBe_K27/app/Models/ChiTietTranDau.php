<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChiTietTranDau extends Model
{
    use SoftDeletes;

    protected $table = 'chi_tiet_tran_daus';

    protected $fillable = [
        'id_giai_dau',
        'id_vong_dau',
        'id_tran_dau',
        'id_doi_tuyen',
        'diem_so_tran_dau',
        'trang_thai',
    ];
}