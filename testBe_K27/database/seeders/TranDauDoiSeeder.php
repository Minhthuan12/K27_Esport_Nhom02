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

        foreach ($vongDaus as $vd) {
            // Trận đấu 1 của vòng đấu
            TranDauDoi::create([
                'id_vong_dau'       => $vd->id,
                'so_luong_doi'      => 2,
                'thoi_gian_thi_dau' => $vd->ngay_bat_dau . ' 15:00:00',
                'the_thuc'          => ($vd->ten_vong_dau === 'Chung kết') ? 'Best of 5' : 'Best of 3',
                'trang_thai'        => 1,
            ]);

            // Trận đấu 2 của vòng đấu
            TranDauDoi::create([
                'id_vong_dau'       => $vd->id,
                'so_luong_doi'      => 2,
                'thoi_gian_thi_dau' => $vd->ngay_bat_dau . ' 18:00:00',
                'the_thuc'          => ($vd->ten_vong_dau === 'Chung kết') ? 'Best of 5' : 'Best of 3',
                'trang_thai'        => 0,
            ]);
        }
    }
}
