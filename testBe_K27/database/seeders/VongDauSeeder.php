<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GiaiDau;
use App\Models\VongDau;

class VongDauSeeder extends Seeder
{
    public function run(): void
    {
        $giaiDaus = GiaiDau::all();

        foreach ($giaiDaus as $gd) {
            $startDate = strtotime($gd->ngay_bat_dau);
            $endDate   = strtotime($gd->ngay_ket_thuc);
            $midDate   = $startDate + floor(($endDate - $startDate) / 2);

            // Vòng 1: Vòng bảng (nửa đầu giải)
            VongDau::create([
                'id_giai_dau'       => $gd->id,
                'ten_vong_dau'      => 'Vòng bảng',
                'ngay_bat_dau'      => date('Y-m-d', $startDate),
                'ngay_ket_thuc'     => date('Y-m-d', $midDate),
                'so_doi_tham_gia'   => $gd->so_luong_doi,
                'hinh_thuc_thi_dau' => 'Vòng tròn',
                'dia_diem'          => $gd->dia_diem,
                'trang_thai'        => 1,
                'created_at'        => date('Y-m-d H:i:s', $startDate),
            ]);

            // Vòng 2: Chung kết / Playoff (nửa sau giải)
            VongDau::create([
                'id_giai_dau'       => $gd->id,
                'ten_vong_dau'      => 'Chung kết',
                'ngay_bat_dau'      => date('Y-m-d', $midDate + 86400),
                'ngay_ket_thuc'     => date('Y-m-d', $endDate),
                'so_doi_tham_gia'   => 4,
                'hinh_thuc_thi_dau' => 'Knockout',
                'dia_diem'          => $gd->dia_diem,
                'trang_thai'        => 1,
                'created_at'        => date('Y-m-d H:i:s', $midDate),
            ]);
        }
    }
}
