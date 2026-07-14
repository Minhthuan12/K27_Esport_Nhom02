<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhanQuyenController extends Controller
{
    public function getData()
    {
        $data = DB::table('phan_quyens')
            ->join('chuc_vus', 'phan_quyens.id_chuc_vu', '=', 'chuc_vus.id')
            ->join('chuc_nangs', 'phan_quyens.id_chuc_nang', '=', 'chuc_nangs.id')
            ->select(
                'phan_quyens.id',
                'chuc_vus.ten_chuc_vu',
                'chuc_nangs.ten_chuc_nang',
                'phan_quyens.id_chuc_vu',
                'phan_quyens.id_chuc_nang'
            )
            ->orderBy('phan_quyens.id', 'desc')
            ->get();

        return response()->json([
            'status'  => 1,
            'message' => 'Lấy dữ liệu phân quyền thành công',
            'data'    => $data
        ]);
    }
}
