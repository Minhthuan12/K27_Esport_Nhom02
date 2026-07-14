<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaiTroGiaiDau extends Model
{
    use SoftDeletes;

    protected $table = 'tai_tro_giai_daus';

    protected $fillable = [
        'id_nha_tai_tro',
        'id_giai_dau',
        'tong_tai_tro',
    ];
}