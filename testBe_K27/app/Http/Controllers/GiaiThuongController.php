<?php

namespace App\Http\Controllers;

use App\Models\GiaiThuong;
use Illuminate\Http\Request;

class GiaiThuongController extends Controller
{
    public function getData()
    {
        $data = GiaiThuong::select(
                'id',
                'ten_giai_thuong',
                'gia_tri',
                'is_ca_nhan',
                'trang_thai'
            )
            ->orderBy('id', 'desc')
            ->get();

        return response()->json([
            'status'  => 1,
            'message' => 'Lấy dữ liệu giải thưởng thành công',
            'data'    => $data
        ]);
    }
}
