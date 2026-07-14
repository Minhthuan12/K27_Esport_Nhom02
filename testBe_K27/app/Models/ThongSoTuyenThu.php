<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ThongSoTuyenThu extends Model
{
    use SoftDeletes;

    protected $table = 'thong_so_tuyen_thus';

    protected $fillable = [
        'id_doi_tuyen',
        'id_game',
        'id_tuyen_thu',
        'trang_thai',
        'so_tran_thua',
        'so_tran_thang',
        'so_tran_hoa',
        'so_mvp',
    ];
}