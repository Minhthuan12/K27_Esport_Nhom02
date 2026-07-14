<?php

namespace App\Http\Controllers;

use App\Models\NhaTaiTro;
use Illuminate\Http\Request;

class NhaTaiTroController extends Controller
{
    public function getData()
    {
        $data = NhaTaiTro::select(
                'id',
                'ten_nha_tai_tro',
                'logo',
                'ten_nguoi_dai_dien',
                'so_dien_thoai_dai_dien',
                'email_dai_dien',
                'website',
                'mo_ta'
            )
            ->orderBy('id', 'desc')
            ->get();

        return response()->json([
            'status'  => 1,
            'message' => 'Lấy dữ liệu nhà tài trợ thành công',
            'data'    => $data
        ]);
    }
}
