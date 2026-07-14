<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GiaiDau;
use App\Models\TaiTroGiaiDau;

class TaiTroGiaiDauSeeder extends Seeder
{
    public function run(): void
    {
        $giaiDaus = GiaiDau::all();

        foreach ($giaiDaus as $gd) {
            // Xác định 3 nhà tài trợ khác nhau cho mỗi giải đấu (xoay vòng trong 24 nhà tài trợ)
            $sponsorA = (($gd->id * 2) % 24) + 1;
            $sponsorB = (($gd->id * 3) % 24) + 1;
            $sponsorC = (($gd->id * 5) % 24) + 1;

            // Đảm bảo các nhà tài trợ không trùng nhau trong cùng một giải đấu
            if ($sponsorB === $sponsorA) {
                $sponsorB = ($sponsorB % 24) + 1;
            }
            if ($sponsorC === $sponsorA || $sponsorC === $sponsorB) {
                $sponsorC = (($sponsorC + 1) % 24) + 1;
            }

            // Nhà tài trợ 1
            TaiTroGiaiDau::create([
                'id_nha_tai_tro' => $sponsorA,
                'id_giai_dau'    => $gd->id,
                'tong_tai_tro'   => 120000000, // 120 triệu
            ]);

            // Nhà tài trợ 2
            TaiTroGiaiDau::create([
                'id_nha_tai_tro' => $sponsorB,
                'id_giai_dau'    => $gd->id,
                'tong_tai_tro'   => 80000000, // 80 triệu
            ]);

            // Nhà tài trợ 3
            TaiTroGiaiDau::create([
                'id_nha_tai_tro' => $sponsorC,
                'id_giai_dau'    => $gd->id,
                'tong_tai_tro'   => 50000000, // 50 triệu
            ]);
        }
    }
}
