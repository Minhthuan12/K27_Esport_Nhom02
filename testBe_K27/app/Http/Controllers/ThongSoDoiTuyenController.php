<?php

namespace App\Http\Controllers;

use App\Models\ThongSoDoiTuyen;
use Illuminate\Http\Request;

class ThongSoDoiTuyenController extends Controller
{
    public function getData()
    {
        $data = ThongSoDoiTuyen::join('doi_tuyens', 'thong_so_doi_tuyens.id_doi_tuyen', '=', 'doi_tuyens.id')
            ->join('games', 'thong_so_doi_tuyens.id_game', '=', 'games.id')
            ->select(
                'thong_so_doi_tuyens.id',
                'doi_tuyens.ten_doi_tuyen',
                'games.ten_game',
                'thong_so_doi_tuyens.so_tran_thang',
                'thong_so_doi_tuyens.so_tran_hoa',
                'thong_so_doi_tuyens.so_tran_thua',
                'thong_so_doi_tuyens.so_giai_nhat',
                'thong_so_doi_tuyens.so_giai_nhi',
                'thong_so_doi_tuyens.so_giai_ba',
                'thong_so_doi_tuyens.trang_thai'
            )
            ->orderBy('thong_so_doi_tuyens.id', 'desc')
            ->get();

        return response()->json([
            'status'  => 1,
            'message' => 'Lấy dữ liệu thống kê đội tuyển thành công',
            'data'    => $data
        ]);
    }
}
