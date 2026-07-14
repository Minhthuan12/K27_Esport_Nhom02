<?php

namespace App\Http\Controllers;

use App\Models\ChucNang;
use Illuminate\Http\Request;

class ChucNangController extends Controller
{
    public function getData()
    {
        $data = ChucNang::select(
                'id',
                'ten_chuc_nang',
                'mo_ta',
                'trang_thai'
            )
            ->orderBy('id', 'desc')
            ->get();

        return response()->json([
            'status'  => 1,
            'message' => 'Lấy dữ liệu chức năng thành công',
            'data'    => $data
        ]);
    }
}
