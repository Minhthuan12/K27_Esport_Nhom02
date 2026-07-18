<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DoiTuyen;
use App\Models\Game;
use App\Models\ThongSoDoiTuyen;

class ThongSoDoiTuyenSeeder extends Seeder
{
    public function run(): void
    {
        $doiTuyens = DoiTuyen::all();
        $games     = Game::all();

        if ($doiTuyens->isEmpty() || $games->isEmpty()) {
            return;
        }

        $gameIds = $games->pluck('id')->toArray();

        // Thứ tự phân cấp thắng rõ ràng cho các đội tuyển hàng đầu
        $topWinMap = [
            'GAM Esports'      => 145,
            'T1 Esports'       => 132,
            'Gen.G Esports'    => 118,
            'Cerberus Esports' => 95,
            'Saigon Buffalo'   => 82,
            'Paper Rex'        => 76,
            'Fnatic'           => 70,
            'G2 Esports'       => 65,
            'Team Whales'      => 58,
            'Vikings Esports'  => 52,
        ];

        foreach ($doiTuyens as $dt) {
            $baseWins = isset($topWinMap[$dt->ten_doi_tuyen]) ? $topWinMap[$dt->ten_doi_tuyen] : (15 + ($dt->id * 3) % 30);
            
            $game1Id = $gameIds[($dt->id - 1) % count($gameIds)];
            $game2Id = $gameIds[($dt->id + 1) % count($gameIds)];
            $assignedGames = array_unique([$game1Id, $game2Id]);

            foreach ($assignedGames as $gIdx => $gId) {
                $wins   = max(5, floor($baseWins / count($assignedGames)) + ($dt->id % 5) - 2);
                $losses = 5 + (($dt->id * 2 + $gIdx * 3) % 20);
                $nhat   = ($wins > 40) ? (2 + ($dt->id % 4)) : ($dt->id % 2);
                $nhi    = ($dt->id * 3) % 3;
                $ba     = ($dt->id * 2) % 3;
                $thuong = $nhat + $nhi + $ba + 1;
                $createYear = 2020 + (($dt->id + $gIdx) % 7);
                $createMonth= str_pad(1 + (($dt->id * 2 + $gIdx) % 12), 2, '0', STR_PAD_LEFT);
                $createdAt  = "$createYear-$createMonth-10 10:00:00";

                ThongSoDoiTuyen::create([
                    'id_doi_tuyen'  => $dt->id,
                    'id_game'       => $gId,
                    'trang_thai'    => 1,
                    'so_tran_thang' => $wins,
                    'so_tran_thua'  => $losses,
                    'so_tran_hoa'   => 0,
                    'so_giai_nhat'  => $nhat,
                    'so_giai_nhi'   => $nhi,
                    'so_giai_ba'    => $ba,
                    'so_giai_thuong'=> $thuong,
                    'created_at'    => $createdAt,
                ]);
            }
        }
    }
}
