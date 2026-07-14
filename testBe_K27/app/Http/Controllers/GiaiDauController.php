<?php

namespace App\Http\Controllers;

use App\Models\GiaiDau;
use Illuminate\Http\Request;

class GiaiDauController extends Controller
{
    public function getData()
    {
        $data = GiaiDau::join('games', 'giai_daus.id_game', '=', 'games.id')
            ->select(
                'giai_daus.id',
                'giai_daus.ten_giai_dau',
                'giai_daus.logo',
                'giai_daus.mo_ta',
                'giai_daus.ngay_bat_dau',
                'giai_daus.ngay_ket_thuc',
                'giai_daus.hinh_thuc_thi_dau',
                'giai_daus.dia_diem',
                'giai_daus.so_luong_doi',
                'games.ten_game',
                'giai_daus.trang_thai'
            )
            ->orderBy('giai_daus.id', 'desc')
            ->get();

        return response()->json([
            'status'  => 1,
            'message' => 'Lấy dữ liệu giải đấu thành công',
            'data'    => $data
        ]);
    }
}
