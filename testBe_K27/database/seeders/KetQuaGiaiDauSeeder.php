<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GiaiDau;
use App\Models\DoiTuyen;
use App\Models\KetQuaGiaiDau;

class KetQuaGiaiDauSeeder extends Seeder
{
    public function run(): void
    {
        $giaiDaus = GiaiDau::all();
        $doiTuyens = DoiTuyen::all();

        if ($giaiDaus->isEmpty() || $doiTuyens->isEmpty()) {
            return;
        }

        $teamIds   = $doiTuyens->pluck('id')->toArray();
        $totalTeams= count($teamIds);

        foreach ($giaiDaus as $gIdx => $gd) {
            // Seed thứ hạng Top 8 cho mỗi giải đấu
            for ($rank = 1; $rank <= 8; $rank++) {
                $teamIndex = ($gIdx * 3 + $rank - 1) % $totalTeams;
                $teamId    = $teamIds[$teamIndex];

                // Gán giải thưởng tương ứng (1: Quán quân, 2: Á quân, 3: Hạng ba, 4: Hạng tư)
                $prizeId   = min($rank, 4);
                $totalPoints = 50 - ($rank * 5);

                KetQuaGiaiDau::create([
                    'id_giai_dau'    => $gd->id,
                    'id_doi_tuyen'   => $teamId,
                    'id_giai_thuong' => $prizeId,
                    'hang'           => $rank,
                    'diem_tong'      => $totalPoints,
                    'trang_thai'     => 1,
                    'created_at'     => $gd->ngay_ket_thuc . ' 22:00:00',
                ]);
            }
        }
    }
}
