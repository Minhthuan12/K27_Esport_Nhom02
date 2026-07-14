<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChucNang extends Model
{
    use SoftDeletes;

    protected $table = 'chuc_nangs';

    protected $fillable = [
        'ten_chuc_nang',
        'mo_ta',
        'trang_thai',
    ];
}