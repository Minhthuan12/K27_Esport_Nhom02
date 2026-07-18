<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TuyenThu;
use App\Models\Game;
use App\Models\ThongSoTuyenThu;

class ThongSoTuyenThuSeeder extends Seeder
{
    public function run(): void
    {
        $tuyenThus = TuyenThu::all();
        $games     = Game::all();

        if ($tuyenThus->isEmpty() || $games->isEmpty()) {
            return;
        }

        $gameIds    = $games->pluck('id')->toArray();
        $totalGames = count($gameIds);

        foreach ($tuyenThus as $key => $tt) {
            // Xác định game thi đấu deterministically dựa trên ID tuyển thủ (không dùng rand)
            $primaryGameIdx   = ($tt->id - 1) % $totalGames;
            $secondaryGameIdx = ($tt->id + 1) % $totalGames;

            $assignedGameIds  = array_unique([$gameIds[$primaryGameIdx], $gameIds[$secondaryGameIdx]]);

            foreach ($assignedGameIds as $gIdx => $gId) {
                $wins   = 15 + (($tt->id * 3 + $gIdx * 7) % 35);
                $losses = 5  + (($tt->id * 2 + $gIdx * 5) % 15);
                $mvps   = 1  + (($tt->id + $gIdx * 3) % 12);

                $year   = 2020 + (($tt->id + $gIdx) % 7);
                $month  = str_pad(1 + (($tt->id * 2 + $gIdx) % 12), 2, '0', STR_PAD_LEFT);
                $date   = "$year-$month-15 10:00:00";

                ThongSoTuyenThu::create([
                    'id_doi_tuyen'  => $tt->id_doi_tuyen,
                    'id_game'       => $gId,
                    'id_tuyen_thu'  => $tt->id,
                    'trang_thai'    => 1,
                    'so_tran_thua'  => $losses,
                    'so_tran_thang' => $wins,
                    'so_tran_hoa'   => 0,
                    'so_mvp'        => $mvps,
                    'created_at'    => $date,
                ]);
            }
        }
    }
}
