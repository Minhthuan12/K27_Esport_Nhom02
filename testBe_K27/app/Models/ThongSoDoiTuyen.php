<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ThongSoDoiTuyen extends Model
{
    use SoftDeletes;

    protected $table = 'thong_so_doi_tuyens';

    protected $fillable = [
        'id_doi_tuyen',
        'id_game',
        'trang_thai',
        'so_tran_thua',
        'so_tran_thang',
        'so_tran_hoa',
        'so_giai_nhat',
        'so_giai_nhi',
        'so_giai_ba',
        'so_giai_thuong',
    ];
}