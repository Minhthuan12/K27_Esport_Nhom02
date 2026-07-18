<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VongDau;
use App\Models\TranDauDoi;

class TranDauDoiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vongDaus = VongDau::all();

        foreach ($vongDaus as $index => $vd) {
            $isFinal = ($vd->ten_vong_dau === 'Chung kết');
            $format  = $isFinal ? 'Best of 5' : 'Best of 3';

            // Trận 1: Khởi tranh 15:00:00
            TranDauDoi::create([
                'id_vong_dau'       => $vd->id,
                'so_luong_doi'      => 2,
                'thoi_gian_thi_dau' => $vd->ngay_bat_dau . ' 15:00:00',
                'the_thuc'          => $format,
                'trang_thai'        => 1,
                'created_at'        => $vd->ngay_bat_dau . ' 14:00:00',
            ]);

            // Trận 2: Khởi tranh 18:00:00
            TranDauDoi::create([
                'id_vong_dau'       => $vd->id,
                'so_luong_doi'      => 2,
                'thoi_gian_thi_dau' => $vd->ngay_bat_dau . ' 18:00:00',
                'the_thuc'          => $format,
                'trang_thai'        => 1,
                'created_at'        => $vd->ngay_bat_dau . ' 17:00:00',
            ]);

            // Trận 3: Khởi tranh 20:30:00
            TranDauDoi::create([
                'id_vong_dau'       => $vd->id,
                'so_luong_doi'      => 2,
                'thoi_gian_thi_dau' => $vd->ngay_bat_dau . ' 20:30:00',
                'the_thuc'          => $format,
                'trang_thai'        => 1,
                'created_at'        => $vd->ngay_bat_dau . ' 19:30:00',
            ]);
        }
    }
}
