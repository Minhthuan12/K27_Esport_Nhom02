<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $games = [
            [
                'id_the_loai'   => 1,
                'ten_game'      => 'League of Legends',
                'logo'          => null,
                'nha_phat_hanh' => 'Riot Games',
                'mo_ta'         => 'Trò chơi đấu trường trực tuyến nhiều người chơi nổi tiếng thế giới.',
                'trang_thai'    => 1,
            ],
            [
                'id_the_loai'   => 1,
                'ten_game'      => 'Dota 2',
                'logo'          => null,
                'nha_phat_hanh' => 'Valve Corporation',
                'mo_ta'         => 'MOBA với độ phức tạp cao và giải thưởng khổng lồ.',
                'trang_thai'    => 1,
            ],
            [
                'id_the_loai'   => 2,
                'ten_game'      => 'Counter-Strike 2',
                'logo'          => null,
                'nha_phat_hanh' => 'Valve Corporation',
                'mo_ta'         => 'Game bắn súng chiến thuật huyền thoại.',
                'trang_thai'    => 1,
            ],
            [
                'id_the_loai'   => 2,
                'ten_game'      => 'Valorant',
                'logo'          => null,
                'nha_phat_hanh' => 'Riot Games',
                'mo_ta'         => 'Game FPS kết hợp kỹ năng đặc biệt.',
                'trang_thai'    => 1,
            ],
            [
                'id_the_loai'   => 3,
                'ten_game'      => 'PUBG: Battlegrounds',
                'logo'          => null,
                'nha_phat_hanh' => 'Krafton',
                'mo_ta'         => 'Game Battle Royale sinh tồn nổi tiếng.',
                'trang_thai'    => 1,
            ],
        ];

        foreach ($games as $key => $game) {
            $game['logo'] = 'https://api.dicebear.com/7.x/identicon/svg?seed=' . urlencode($game['ten_game']);
            if ($key == 1 || $key == 3) {
                $game['trang_thai'] = 0;
            }
            Game::create($game);
        }
    }
}
