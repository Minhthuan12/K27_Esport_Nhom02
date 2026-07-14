<?php

namespace App\Http\Controllers;

use App\Models\KetQuaGiaiDau;
use Illuminate\Http\Request;

class KetQuaGiaiDauController extends Controller
{
    public function getData()
    {
        $data = KetQuaGiaiDau::join('giai_daus', 'ket_qua_giai_daus.id_giai_dau', '=', 'giai_daus.id')
            ->join('doi_tuyens', 'ket_qua_giai_daus.id_doi_tuyen', '=', 'doi_tuyens.id')
            ->join('giai_thuongs', 'ket_qua_giai_daus.id_giai_thuong', '=', 'giai_thuongs.id')
            ->select(
                'ket_qua_giai_daus.id',
                'giai_daus.ten_giai_dau',
                'doi_tuyens.ten_doi_tuyen',
                'giai_thuongs.ten_giai_thuong',
                'ket_qua_giai_daus.hang',
                'ket_qua_giai_daus.diem_tong',
                'ket_qua_giai_daus.trang_thai'
            )
            ->orderBy('ket_qua_giai_daus.id', 'desc')
            ->get();

        return response()->json([
            'status'  => 1,
            'message' => 'Lấy dữ liệu kết quả giải đấu thành công',
            'data'    => $data
        ]);
    }
}
