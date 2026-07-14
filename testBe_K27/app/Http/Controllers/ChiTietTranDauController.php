<?php

namespace App\Http\Controllers;

use App\Models\ChiTietTranDau;
use Illuminate\Http\Request;

class ChiTietTranDauController extends Controller
{
    public function getData()
    {
        $data = ChiTietTranDau::join('giai_daus', 'chi_tiet_tran_daus.id_giai_dau', '=', 'giai_daus.id')
            ->join('vong_daus', 'chi_tiet_tran_daus.id_vong_dau', '=', 'vong_daus.id')
            ->join('tran_dau_dois', 'chi_tiet_tran_daus.id_tran_dau', '=', 'tran_dau_dois.id')
            ->join('doi_tuyens', 'chi_tiet_tran_daus.id_doi_tuyen', '=', 'doi_tuyens.id')
            ->select(
                'chi_tiet_tran_daus.id',
                'giai_daus.ten_giai_dau',
                'vong_daus.ten_vong_dau',
                'tran_dau_dois.thoi_gian_thi_dau',
                'doi_tuyens.ten_doi_tuyen',
                'chi_tiet_tran_daus.diem_so_tran_dau',
                'chi_tiet_tran_daus.trang_thai',
                'chi_tiet_tran_daus.id_giai_dau',
                'chi_tiet_tran_daus.id_vong_dau',
                'chi_tiet_tran_daus.id_tran_dau',
                'chi_tiet_tran_daus.id_doi_tuyen'
            )
            ->orderBy('chi_tiet_tran_daus.id', 'desc')
            ->get();

        return response()->json([
            'status'  => 1,
            'message' => 'Lấy dữ liệu chi tiết trận đấu thành công',
            'data'    => $data
        ]);
    }
}
