<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TinTuc extends Model
{
    use SoftDeletes;

    protected $table = 'tin_tucs';

    protected $fillable = [
        'id_game',
        'id_giai_dau',
        'tieu_de',
        'noi_dung',
        'trang_thai',
    ];
}