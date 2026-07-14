<?php

namespace App\Http\Controllers;

use App\Models\TranDauDoi;
use Illuminate\Http\Request;

class TranDauDoiController extends Controller
{
    public function getData()
    {
        $data = TranDauDoi::join('vong_daus', 'tran_dau_dois.id_vong_dau', '=', 'vong_daus.id')
            ->join('giai_daus', 'vong_daus.id_giai_dau', '=', 'giai_daus.id')
            ->select(
                'tran_dau_dois.id',
                'vong_daus.ten_vong_dau',
                'giai_daus.ten_giai_dau',
                'tran_dau_dois.so_luong_doi',
                'tran_dau_dois.thoi_gian_thi_dau',
                'tran_dau_dois.the_thuc',
                'tran_dau_dois.trang_thai'
            )
            ->orderBy('tran_dau_dois.id', 'desc')
            ->get();

        return response()->json([
            'status'  => 1,
            'message' => 'Lấy dữ liệu trận đấu thành công',
            'data'    => $data
        ]);
    }
}
