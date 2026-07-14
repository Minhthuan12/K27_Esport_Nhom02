<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GiaiThuong extends Model
{
    use SoftDeletes;

    protected $table = 'giai_thuongs';

    protected $fillable = [
        'ten_giai_thuong',
        'gia_tri',
        'is_ca_nhan',
        'trang_thai',
    ];
}