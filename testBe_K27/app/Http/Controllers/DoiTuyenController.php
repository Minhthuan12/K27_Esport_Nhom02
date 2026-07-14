<?php

namespace App\Http\Controllers;

use App\Models\DoiTuyen;
use Illuminate\Http\Request;

class DoiTuyenController extends Controller
{
    public function getData()
    {
        $data = DoiTuyen::join('nguoi_dungs', 'doi_tuyens.id_nguoi_dung', '=', 'nguoi_dungs.id')
            ->select(
                'doi_tuyens.id',
                'doi_tuyens.ten_doi_tuyen',
                'doi_tuyens.ten_viet_tat',
                'doi_tuyens.logo',
                'doi_tuyens.mo_ta',
                'doi_tuyens.id_nguoi_dung',
                'nguoi_dungs.ho_va_ten',
                'doi_tuyens.trang_thai'
            )
            ->orderBy('doi_tuyens.id', 'desc')
            ->get();

        return response()->json([
            'status'  => 1,
            'message' => 'Lấy dữ liệu đội tuyển thành công',
            'data'    => $data
        ]);
    }
}
