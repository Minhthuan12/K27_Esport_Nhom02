<?php

namespace App\Http\Controllers;

use App\Models\TheLoai;
use Illuminate\Http\Request;

class TheLoaiController extends Controller
{
    public function getData()
    {
        $data = TheLoai::select(
                'id',
                'ten_loai',
                'mo_ta',
                'trang_thai'
            )
            ->orderBy('id', 'desc')
            ->get();

        return response()->json([
            'status'  => 1,
            'message' => 'Lấy dữ liệu thể loại thành công',
            'data'    => $data
        ]);
    }
}
