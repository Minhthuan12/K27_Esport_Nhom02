<?php

namespace App\Http\Controllers;

use App\Models\ChucVu;
use Illuminate\Http\Request;

class ChucVuController extends Controller
{
    public function getData()
    {
        $data = ChucVu::select(
                'id',
                'ten_chuc_vu',
                'mo_ta',
                'trang_thai'
            )
            ->orderBy('id', 'desc')
            ->get();

        return response()->json([
            'status'  => 1,
            'message' => 'Lấy dữ liệu chức vụ thành công',
            'data'    => $data
        ]);
    }
}
