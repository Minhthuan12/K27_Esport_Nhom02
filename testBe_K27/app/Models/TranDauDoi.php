<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TranDauDoi extends Model
{
    use SoftDeletes;

    protected $table = 'tran_dau_dois';

    protected $fillable = [
        'id_vong_dau',
        'so_luong_doi',
        'thoi_gian_thi_dau',
        'the_thuc',
        'trang_thai',
    ];
}
