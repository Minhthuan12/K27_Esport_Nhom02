<?php

namespace App\Http\Controllers;

use App\Models\ThongSoTuyenThu;
use Illuminate\Http\Request;

class ThongSoTuyenThuController extends Controller
{
    public function getData()
    {
        $data = ThongSoTuyenThu::join('tuyen_thus', 'thong_so_tuyen_thus.id_tuyen_thu', '=', 'tuyen_thus.id')
            ->join('doi_tuyens', 'thong_so_tuyen_thus.id_doi_tuyen', '=', 'doi_tuyens.id')
            ->join('games', 'thong_so_tuyen_thus.id_game', '=', 'games.id')
            ->select(
                'thong_so_tuyen_thus.id',
                'tuyen_thus.nickname',
                'doi_tuyens.ten_doi_tuyen',
                'games.ten_game',
                'thong_so_tuyen_thus.so_tran_thang',
                'thong_so_tuyen_thus.so_tran_hoa',
                'thong_so_tuyen_thus.so_tran_thua',
                'thong_so_tuyen_thus.so_mvp',
                'thong_so_tuyen_thus.trang_thai'
            )
            ->orderBy('thong_so_tuyen_thus.id', 'desc')
            ->get();

        return response()->json([
            'status'  => 1,
            'message' => 'Lấy dữ liệu thống kê tuyển thủ thành công',
            'data'    => $data
        ]);
    }
}
