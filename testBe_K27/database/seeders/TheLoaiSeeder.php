<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TheLoai;

class TheLoaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $theLoais = [
            [
                'ten_loai'   => 'MOBA',
                'mo_ta'      => 'Thể loại đấu trường trực tuyến nhiều người chơi (Multiplayer Online Battle Arena).',
                'trang_thai' => 1,
                'created_at' => '2020-01-05 08:00:00',
            ],
            [
                'ten_loai'   => 'FPS',
                'mo_ta'      => 'Thể loại bắn súng góc nhìn thứ nhất (First-Person Shooter).',
                'trang_thai' => 1,
                'created_at' => '2020-02-12 09:30:00',
            ],
            [
                'ten_loai'   => 'Battle Royale',
                'mo_ta'      => 'Thể loại sinh tồn chiến đấu đến người/đội chơi cuối cùng.',
                'trang_thai' => 1,
                'created_at' => '2020-03-20 14:15:00',
            ],
            [
                'ten_loai'   => 'Sports',
                'mo_ta'      => 'Thể loại mô phỏng các môn thể thao truyền thống và hiện đại.',
                'trang_thai' => 1,
                'created_at' => '2021-01-10 10:00:00',
            ],
            [
                'ten_loai'   => 'Fighting',
                'mo_ta'      => 'Thể loại đối kháng trực tiếp 1v1 giữa các võ sĩ.',
                'trang_thai' => 1,
                'created_at' => '2021-05-18 11:45:00',
            ],
            [
                'ten_loai'   => 'Strategy / RTS',
                'mo_ta'      => 'Thể loại chiến thuật thời gian thực đòi hỏi tư duy chiến lược.',
                'trang_thai' => 1,
                'created_at' => '2022-01-15 16:20:00',
            ],
            [
                'ten_loai'   => 'Hero Shooter',
                'mo_ta'      => 'Thể loại bắn súng kết hợp kỹ năng của từng đặc vụ/tướng.',
                'trang_thai' => 1,
                'created_at' => '2022-06-22 13:10:00',
            ],
            [
                'ten_loai'   => 'Auto Chess',
                'mo_ta'      => 'Thể loại chiến thuật cờ tự động xoay bài theo lượt.',
                'trang_thai' => 1,
                'created_at' => '2023-02-14 08:45:00',
            ],
            [
                'ten_loai'   => 'Card Game',
                'mo_ta'      => 'Thể loại game thẻ bài chiến thuật hấp dẫn.',
                'trang_thai' => 1,
                'created_at' => '2023-08-05 15:30:00',
            ],
            [
                'ten_loai'   => 'Survival',
                'mo_ta'      => 'Thể loại game khám phá và sinh tồn thế giới mở.',
                'trang_thai' => 1,
                'created_at' => '2024-01-11 09:00:00',
            ],
            [
                'ten_loai'   => 'Racing',
                'mo_ta'      => 'Thể loại đua xe thể thao tốc độ cao.',
                'trang_thai' => 0,
                'created_at' => '2024-05-20 17:00:00',
            ],
            [
                'ten_loai'   => 'MMORPG',
                'mo_ta'      => 'Thể loại nhập vai trực tuyến nhiều người chơi.',
                'trang_thai' => 0,
                'created_at' => '2025-02-01 10:30:00',
            ],
        ];

        foreach ($theLoais as $tl) {
            TheLoai::create($tl);
        }
    }
}
