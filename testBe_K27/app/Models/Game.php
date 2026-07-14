<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use SoftDeletes;

    protected $table = 'games';

    protected $fillable = [
        'id_the_loai',
        'ten_game',
        'logo',
        'nha_phat_hanh',
        'mo_ta',
        'trang_thai',
    ];
}