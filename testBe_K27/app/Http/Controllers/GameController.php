<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function getData()
    {
        $data = Game::join('the_loais', 'games.id_the_loai', '=', 'the_loais.id')
            ->select(
                'games.id',
                'games.ten_game',
                'games.logo',
                'games.nha_phat_hanh',
                'games.mo_ta',
                'games.trang_thai',
                'the_loais.ten_loai',
                'games.id_the_loai'
            )
            ->orderBy('games.id', 'desc')
            ->get();

        return response()->json([
            'status'  => 1,
            'message' => 'Lấy dữ liệu game thành công',
            'data'    => $data
        ]);
    }
}
