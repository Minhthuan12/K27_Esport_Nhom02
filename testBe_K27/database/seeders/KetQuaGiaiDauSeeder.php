<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GiaiDau;
use App\Models\KetQuaGiaiDau;

class KetQuaGiaiDauSeeder extends Seeder
{
    public function run(): void
    {
        $giaiDaus = GiaiDau::all();

        foreach ($giaiDaus as $gd) {
            // Seed kết quả top 4 cho mỗi giải đấu
            // Rank 1
            KetQuaGiaiDau::create([
                'id_giai_dau'    => $gd->id,
                'id_doi_tuyen'   => (($gd->id + 0) % 10) + 1, // Xoay vòng ID đội tuyển từ 1 đến 10
                'id_giai_thuong' => 1, // Quán quân
                'hang'           => 1,
                'diem_tong'      => 45,
                'trang_thai'     => 1,
            ]);

            // Rank 2
            KetQuaGiaiDau::create([
                'id_giai_dau'    => $gd->id,
                'id_doi_tuyen'   => (($gd->id + 1) % 10) + 1,
                'id_giai_thuong' => 2, // Á quân
                'hang'           => 2,
                'diem_tong'      => 38,
                'trang_thai'     => 1,
            ]);

            // Rank 3
            KetQuaGiaiDau::create([
                'id_giai_dau'    => $gd->id,
                'id_doi_tuyen'   => (($gd->id + 2) % 10) + 1,
                'id_giai_thuong' => 3, // Hạng ba
                'hang'           => 3,
                'diem_tong'      => 30,
                'trang_thai'     => 1,
            ]);

            // Rank 4
            KetQuaGiaiDau::create([
                'id_giai_dau'    => $gd->id,
                'id_doi_tuyen'   => (($gd->id + 3) % 10) + 1,
                'id_giai_thuong' => 4, // Hạng tư
                'hang'           => 4,
                'diem_tong'      => 22,
                'trang_thai'     => 1,
            ]);
        }
    }
}
