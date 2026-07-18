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
                'id_the_loai'   => 1, // MOBA
                'ten_game'      => 'League of Legends',
                'nha_phat_hanh' => 'Riot Games',
                'mo_ta'         => 'Trò chơi đấu trường trực tuyến nhiều người chơi phổ biến hàng đầu thế giới.',
                'trang_thai'    => 1,
                'created_at'    => '2020-01-10 09:00:00',
            ],
            [
                'id_the_loai'   => 1, // MOBA
                'ten_game'      => 'Dota 2',
                'nha_phat_hanh' => 'Valve Corporation',
                'mo_ta'         => 'MOBA chiến thuật chiều sâu với hệ thống giải đấu The International tiền thưởng kỷ lục.',
                'trang_thai'    => 1,
                'created_at'    => '2020-03-15 10:00:00',
            ],
            [
                'id_the_loai'   => 2, // FPS
                'ten_game'      => 'Counter-Strike 2',
                'nha_phat_hanh' => 'Valve Corporation',
                'mo_ta'         => 'Tựa game bắn súng đối kháng chiến thuật huyền thoại số 1 hành tinh.',
                'trang_thai'    => 1,
                'created_at'    => '2021-01-20 14:00:00',
            ],
            [
                'id_the_loai'   => 7, // Hero Shooter / FPS
                'ten_game'      => 'Valorant',
                'nha_phat_hanh' => 'Riot Games',
                'mo_ta'         => 'Game bắn súng góc nhìn thứ nhất kết hợp bộ kỹ năng đặc vụ kịch tính.',
                'trang_thai'    => 1,
                'created_at'    => '2021-05-12 11:30:00',
            ],
            [
                'id_the_loai'   => 3, // Battle Royale
                'ten_game'      => 'PUBG: Battlegrounds',
                'nha_phat_hanh' => 'Krafton',
                'mo_ta'         => 'Tựa game sinh tồn đấu trường 100 người chơi kịch tính.',
                'trang_thai'    => 1,
                'created_at'    => '2022-02-18 16:00:00',
            ],
            [
                'id_the_loai'   => 4, // Sports
                'ten_game'      => 'EA SPORTS FC Online',
                'nha_phat_hanh' => 'Nexon / EA',
                'mo_ta'         => 'Game bóng đá mô phỏng thể thao hàng đầu Việt Nam.',
                'trang_thai'    => 1,
                'created_at'    => '2022-08-25 10:00:00',
            ],
            [
                'id_the_loai'   => 8, // Auto Chess
                'ten_game'      => 'Đấu Trường Chân Lý (TFT)',
                'nha_phat_hanh' => 'Riot Games',
                'mo_ta'         => 'Game cờ tự động chiến thuật theo lượt sử dụng tướng LMHT.',
                'trang_thai'    => 0,
                'created_at'    => '2023-03-10 15:00:00',
            ],
            [
                'id_the_loai'   => 5, // Fighting
                'ten_game'      => 'Tekken 8',
                'nha_phat_hanh' => 'Bandai Namco',
                'mo_ta'         => 'Siêu phẩm đối kháng võ thuật góc nhìn 3D đỉnh cao.',
                'trang_thai'    => 0,
                'created_at'    => '2024-01-26 13:00:00',
            ],
        ];

        foreach ($games as $game) {
            $game['logo'] = 'https://api.dicebear.com/7.x/identicon/svg?seed=' . urlencode($game['ten_game']);
            Game::create($game);
        }
    }
}
