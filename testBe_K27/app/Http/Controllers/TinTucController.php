<?php

namespace App\Http\Controllers;

use App\Models\TinTuc;
use Illuminate\Http\Request;

class TinTucController extends Controller
{
    public function getData()
    {
        $data = TinTuc::leftJoin('games', 'tin_tucs.id_game', '=', 'games.id')
            ->leftJoin('giai_daus', 'tin_tucs.id_giai_dau', '=', 'giai_daus.id')
            ->select(
                'tin_tucs.id',
                'tin_tucs.tieu_de',
                'tin_tucs.noi_dung',
                'tin_tucs.trang_thai',
                'games.ten_game',
                'giai_daus.ten_giai_dau',
                'tin_tucs.id_game',
                'tin_tucs.id_giai_dau'
            )
            ->orderBy('tin_tucs.id', 'desc')
            ->get();

        return response()->json([
            'status'  => 1,
            'message' => 'Lấy dữ liệu tin tức thành công',
            'data'    => $data
        ]);
    }
}
