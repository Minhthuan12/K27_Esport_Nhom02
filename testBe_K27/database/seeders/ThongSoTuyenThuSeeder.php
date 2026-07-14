<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TuyenThu;
use App\Models\ThongSoTuyenThu;
use App\Models\Game;

class ThongSoTuyenThuSeeder extends Seeder
{
    public function run(): void
    {
        $tuyenThus = TuyenThu::all();
        $games     = Game::all();

        if ($games->isEmpty()) return;

        foreach ($tuyenThus as $key => $tt) {
            // Lấy ngẫu nhiên 1-2 game, random($n) luôn trả về Collection khi truyền số nguyên
            $soGame        = min(2, $games->count());
            $selectedGames = $games->random($soGame);

            // Đảm bảo luôn là Collection (trường hợp chỉ có 1 game trong DB)
            if (!($selectedGames instanceof \Illuminate\Support\Collection)) {
                $selectedGames = collect([$selectedGames]);
            }

            foreach ($selectedGames as $gIdx => $game) {
                ThongSoTuyenThu::create([
                    'id_doi_tuyen'  => $tt->id_doi_tuyen,
                    'id_game'       => $game->id,
                    'id_tuyen_thu'  => $tt->id,
                    'trang_thai'    => (($key + $gIdx) % 4 == 0) ? 0 : 1,
                    'so_tran_thua'  => 5  + ($tt->id % 5)  + ($game->id % 3),
                    'so_tran_thang' => 10 + ($tt->id % 10) + ($game->id % 5),
                    'so_tran_hoa'   => $tt->id % 3,
                    'so_mvp'        => 1  + ($tt->id % 8),
                ]);
            }
        }
    }
}
