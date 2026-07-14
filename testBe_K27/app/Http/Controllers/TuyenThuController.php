<?php

namespace App\Http\Controllers;

use App\Models\TuyenThu;
use Illuminate\Http\Request;

class TuyenThuController extends Controller
{
    public function getData()
    {
        $data = TuyenThu::join('doi_tuyens', 'tuyen_thus.id_doi_tuyen', '=', 'doi_tuyens.id')
            ->select(
                'tuyen_thus.id',
                'tuyen_thus.ho_va_ten',
                'tuyen_thus.nickname',
                'tuyen_thus.ngay_sinh',
                'tuyen_thus.gioi_tinh',
                'tuyen_thus.quoc_tich', 
                'tuyen_thus.vi_tri_thi_dau',
                'tuyen_thus.email',
                'tuyen_thus.so_dien_thoai',
                'tuyen_thus.anh_dai_dien',
                'tuyen_thus.id_doi_tuyen',
                'doi_tuyens.ten_doi_tuyen',
                'tuyen_thus.trang_thai'
            )
            ->orderBy('tuyen_thus.id', 'desc')
            ->get();

        return response()->json([
            'status'  => 1,
            'message' => 'Lấy dữ liệu tuyển thủ thành công',
            'data'    => $data
        ]);
    }
}
