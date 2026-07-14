<?php

namespace App\Http\Controllers;

use App\Models\TaiTroGiaiDau;
use Illuminate\Http\Request;

class TaiTroGiaiDauController extends Controller
{
    public function getData()
    {
        $data = TaiTroGiaiDau::join('nha_tai_tros', 'tai_tro_giai_daus.id_nha_tai_tro', '=', 'nha_tai_tros.id')
            ->join('giai_daus', 'tai_tro_giai_daus.id_giai_dau', '=', 'giai_daus.id')
            ->select(
                'tai_tro_giai_daus.id',
                'nha_tai_tros.ten_nha_tai_tro',
                'giai_daus.ten_giai_dau',
                'tai_tro_giai_daus.tong_tai_tro'
            )
            ->orderBy('tai_tro_giai_daus.id', 'desc')
            ->get();

        return response()->json([
            'status'  => 1,
            'message' => 'Lấy dữ liệu tài trợ giải đấu thành công',
            'data'    => $data
        ]);
    }
}
