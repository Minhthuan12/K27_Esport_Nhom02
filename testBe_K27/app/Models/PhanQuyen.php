<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhanQuyen extends Model
{
    use SoftDeletes;

    protected $table = 'phan_quyens';

    protected $fillable = [
        'id_chuc_vu',
        'id_chuc_nang',
    ];
}
