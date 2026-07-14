<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DoiTuyen extends Model
{
    use SoftDeletes;

    protected $table = 'doi_tuyens';

    protected $fillable = [
        'id_nguoi_dung',
        'ten_doi_tuyen',
        'ten_viet_tat',
        'logo',
        'mo_ta',
        'trang_thai',
    ];
}