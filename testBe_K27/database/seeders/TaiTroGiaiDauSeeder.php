<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GiaiDau;
use App\Models\NhaTaiTro;
use App\Models\TaiTroGiaiDau;

class TaiTroGiaiDauSeeder extends Seeder
{
    public function run(): void
    {
        $giaiDaus   = GiaiDau::all();
        $nhaTaiTros = NhaTaiTro::all();

        if ($giaiDaus->isEmpty() || $nhaTaiTros->isEmpty()) {
            return;
        }

        $sponsorIds = $nhaTaiTros->pluck('id')->toArray();
        $budgetPool = [50000000, 80000000, 120000000, 200000000, 350000000, 500000000, 750000000, 1200000000];
        $totalSponsors = count($sponsorIds);

        foreach ($giaiDaus as $index => $gd) {
            // Chọn 3 nhà tài trợ xác định cho mỗi giải đấu (Không dùng rand)
            $sponsorA = $sponsorIds[($index * 3 + 0) % $totalSponsors];
            $sponsorB = $sponsorIds[($index * 3 + 1) % $totalSponsors];
            $sponsorC = $sponsorIds[($index * 3 + 2) % $totalSponsors];

            $sponsors = [
                ['id' => $sponsorA, 'amount' => $budgetPool[($index + 0) % count($budgetPool)]],
                ['id' => $sponsorB, 'amount' => $budgetPool[($index + 2) % count($budgetPool)]],
                ['id' => $sponsorC, 'amount' => $budgetPool[($index + 4) % count($budgetPool)]],
            ];

            foreach ($sponsors as $sp) {
                TaiTroGiaiDau::create([
                    'id_nha_tai_tro' => $sp['id'],
                    'id_giai_dau'    => $gd->id,
                    'tong_tai_tro'   => $sp['amount'],
                    'created_at'     => $gd->ngay_bat_dau . ' 09:00:00',
                ]);
            }
        }
    }
}
