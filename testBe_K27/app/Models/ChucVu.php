<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChucVu extends Model
{
    use SoftDeletes;

    protected $table = 'chuc_vus';

    protected $fillable = [
        'ten_chuc_vu',
        'mo_ta',
        'trang_thai',
    ];
}