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
                'logo'          => 'https://logos-world.net/wp-content/uploads/2023/02/LoL-Symbol.png',
                'mo_ta'         => 'Trò chơi đấu trường trực tuyến nhiều người chơi phổ biến hàng đầu thế giới.',
                'trang_thai'    => 1,
                'created_at'    => '2020-01-10 09:00:00',
            ],
            [
                'id_the_loai'   => 1, // MOBA
                'ten_game'      => 'Dota 2',
                'nha_phat_hanh' => 'Valve Corporation',
                'logo'          => 'https://logos-world.net/wp-content/uploads/2020/12/Dota-2-Logo.png',
                'mo_ta'         => 'MOBA chiến thuật chiều sâu với hệ thống giải đấu The International tiền thưởng kỷ lục.',
                'trang_thai'    => 1,
                'created_at'    => '2020-03-15 10:00:00',
            ],
            [
                'id_the_loai'   => 2, // FPS
                'ten_game'      => 'Counter-Strike 2',
                'nha_phat_hanh' => 'Valve Corporation',
                'logo'          => 'https://ih1.redbubble.net/image.5273118024.5498/raf,360x360,075,t,fafafa:ca443f4786.jpg',
                'mo_ta'         => 'Tựa game bắn súng đối kháng chiến thuật huyền thoại số 1 hành tinh.',
                'trang_thai'    => 1,
                'created_at'    => '2021-01-20 14:00:00',
            ],
            [
                'id_the_loai'   => 7, // Hero Shooter / FPS
                'ten_game'      => 'Valorant',
                'nha_phat_hanh' => 'Riot Games',
                'logo'          => 'https://wallpaperaccess.com/full/4547519.jpg',
                'mo_ta'         => 'Game bắn súng góc nhìn thứ nhất kết hợp bộ kỹ năng đặc vụ kịch tính.',
                'trang_thai'    => 1,
                'created_at'    => '2021-05-12 11:30:00',
            ],
            [
                'id_the_loai'   => 3, // Battle Royale
                'ten_game'      => 'PUBG: Battlegrounds',
                'nha_phat_hanh' => 'Krafton',
                'logo'          => 'https://www.freepnglogos.com/uploads/pubg-png/pubg-png-playerunknown-battlegrounds-windows-central-0.png',
                'mo_ta'         => 'Tựa game sinh tồn đấu trường 100 người chơi kịch tính.',
                'trang_thai'    => 1,
                'created_at'    => '2022-02-18 16:00:00',
            ],
            [
                'id_the_loai'   => 4, // Sports
                'ten_game'      => 'EA SPORTS FC Online',
                'nha_phat_hanh' => 'Nexon / EA',
                'logo'          => 'https://play-lh.googleusercontent.com/yQHb1bk88ENXLZ2_ZO-st7cuG78pva5yRAge2CjhBPoBoEng1ouxyx30vK4s4Z7553Kohd9pPVm1GC2Phs8slA',
                'mo_ta'         => 'Game bóng đá mô phỏng thể thao hàng đầu Việt Nam.',
                'trang_thai'    => 1,
                'created_at'    => '2022-08-25 10:00:00',
            ],
            [
                'id_the_loai'   => 8, // Auto Chess
                'ten_game'      => 'Đấu Trường Chân Lý (TFT)',
                'nha_phat_hanh' => 'Riot Games',
                'logo'          => 'https://play-lh.googleusercontent.com/WmgoAMPA146-mBZXQmCco8m8XPvVVTwfkMtXwxqqiesiL6d-XxaC-jZHsCSZ93Tir977zMjMWJR0VAMIn7q9X5I',
                'mo_ta'         => 'Game cờ tự động chiến thuật theo lượt sử dụng tướng LMHT.',
                'trang_thai'    => 0,
                'created_at'    => '2023-03-10 15:00:00',
            ],
            [
                'id_the_loai'   => 5, // Fighting
                'ten_game'      => 'Tekken 8',
                'nha_phat_hanh' => 'Bandai Namco',
                'logo'          => 'https://image.api.playstation.com/vulcan/ap/rnd/202212/2101/CxnQHVI3gzboBTHqEEQVWZJ6.png',
                'mo_ta'         => 'Siêu phẩm đối kháng võ thuật góc nhìn 3D đỉnh cao.',
                'trang_thai'    => 0,
                'created_at'    => '2024-01-26 13:00:00',
            ],
        ];

        foreach ($games as $game) {
            Game::create($game);
        }
    }
}
