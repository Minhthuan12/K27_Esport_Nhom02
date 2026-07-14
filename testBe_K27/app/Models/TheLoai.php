<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TheLoai extends Model
{
    use SoftDeletes;

    protected $table = 'the_loais';

    protected $fillable = [
        'ten_loai',
        'mo_ta',
        'trang_thai',
    ];
}