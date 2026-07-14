<?php

namespace App\Http\Controllers;

use App\Models\NguoiDung;
use Illuminate\Http\Request;

class NguoiDungController extends Controller
{
    public function getData()
    {
        $data = NguoiDung::join('chuc_vus', 'nguoi_dungs.id_chuc_vu', '=', 'chuc_vus.id')
            ->select(
                'nguoi_dungs.id',
                'nguoi_dungs.ho_va_ten',
                'nguoi_dungs.email',
                'nguoi_dungs.so_dien_thoai',
                'nguoi_dungs.dia_chi',
                'nguoi_dungs.anh_dai_dien',
                'nguoi_dungs.is_xac_thuc',
                'nguoi_dungs.trang_thai',
                'chuc_vus.ten_chuc_vu',
                'nguoi_dungs.id_chuc_vu'
            )
            ->orderBy('nguoi_dungs.id', 'desc')
            ->get();

        return response()->json([
            'status'  => 1,
            'message' => 'Lấy dữ liệu người dùng thành công',
            'data'    => $data
        ]);
    }
}
