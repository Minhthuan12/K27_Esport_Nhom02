<?php

namespace App\Http\Controllers;

use App\Models\TinTuc;
use App\Models\GiaiDau;
use App\Models\TranDauDoi;
use App\Models\ThongSoDoiTuyen;
use App\Models\ChiTietTranDau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function getHomeData()
    {
        // 1. Tin tức mới nhất (4 bài mới nhất)
        $tin_tuc = TinTuc::leftJoin('games', 'tin_tucs.id_game', '=', 'games.id')
            ->leftJoin('giai_daus', 'tin_tucs.id_giai_dau', '=', 'giai_daus.id')
            ->select(
                'tin_tucs.id',
                'tin_tucs.tieu_de',
                'tin_tucs.noi_dung',
                'tin_tucs.created_at',
                'games.ten_game',
                'giai_daus.ten_giai_dau'
            )
            ->where('tin_tucs.trang_thai', 1)
            ->orderBy('tin_tucs.id', 'desc')
            ->take(4)
            ->get();

        // 2. Giải đấu đang & sắp diễn ra
        $giai_dau = GiaiDau::join('games', 'giai_daus.id_game', '=', 'games.id')
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
            ->take(6)
            ->get();

        // 3. Trận đấu sắp tới kèm Tên 2 Đội thi đấu thực tế từ DB
        $tran_dau = TranDauDoi::join('vong_daus', 'tran_dau_dois.id_vong_dau', '=', 'vong_daus.id')
            ->join('giai_daus', 'vong_daus.id_giai_dau', '=', 'giai_daus.id')
            ->select(
                'tran_dau_dois.id',
                'vong_daus.ten_vong_dau',
                'giai_daus.ten_giai_dau',
                'tran_dau_dois.thoi_gian_thi_dau',
                'tran_dau_dois.the_thuc',
                'tran_dau_dois.trang_thai'
            )
            ->orderBy('tran_dau_dois.id', 'desc')
            ->take(5)
            ->get();

        foreach ($tran_dau as $match) {
            $teams = ChiTietTranDau::join('doi_tuyens', 'chi_tiet_tran_daus.id_doi_tuyen', '=', 'doi_tuyens.id')
                ->where('chi_tiet_tran_daus.id_tran_dau', $match->id)
                ->pluck('doi_tuyens.ten_doi_tuyen')
                ->toArray();

            $match->team_1 = $teams[0] ?? 'Rocker Team';
            $match->team_2 = $teams[1] ?? 'Dragon Clan';
        }

        // 4. Bảng xếp hạng Đội tuyển tích lũy điểm số từ DB
        $bxh = ThongSoDoiTuyen::join('doi_tuyens', 'thong_so_doi_tuyens.id_doi_tuyen', '=', 'doi_tuyens.id')
            ->join('games', 'thong_so_doi_tuyens.id_game', '=', 'games.id')
            ->select(
                'doi_tuyens.ten_doi_tuyen',
                'games.ten_game',
                'thong_so_doi_tuyens.so_tran_thang',
                'thong_so_doi_tuyens.so_tran_hoa',
                'thong_so_doi_tuyens.so_tran_thua',
                'thong_so_doi_tuyens.so_giai_nhat',
                DB::raw('(thong_so_doi_tuyens.so_tran_thang * 30 + thong_so_doi_tuyens.so_giai_nhat * 50) as diem_so')
            )
            ->orderBy('diem_so', 'desc')
            ->take(5)
            ->get();

        return response()->json([
            'status'   => 1,
            'message'  => 'Lấy dữ liệu trang chủ thành công',
            'tin_tuc'  => $tin_tuc,
            'giai_dau' => $giai_dau,
            'tran_dau' => $tran_dau,
            'bxh'      => $bxh
        ], 200);
    }
}
