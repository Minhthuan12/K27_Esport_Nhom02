<?php

namespace App\Http\Controllers;

use App\Models\VongDau;
use Illuminate\Http\Request;

class VongDauController extends Controller
{
    public function getData()
    {
        $data = VongDau::join('giai_daus', 'vong_daus.id_giai_dau', '=', 'giai_daus.id')
            ->select(
                'vong_daus.id',
                'vong_daus.ten_vong_dau',
                'giai_daus.ten_giai_dau',
                'vong_daus.ngay_bat_dau',
                'vong_daus.ngay_ket_thuc',
                'vong_daus.so_doi_tham_gia',
                'vong_daus.hinh_thuc_thi_dau',
                'vong_daus.dia_diem',
                'vong_daus.trang_thai'
            )
            ->orderBy('vong_daus.id', 'desc')
            ->get();

        return response()->json([
            'status'  => 1,
            'message' => 'Lấy dữ liệu vòng đấu thành công',
            'data'    => $data
        ]);
    }
}
