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
                'mo_ta'      => 'Thể loại đấu trường trực tuyến nhiều người chơi.',
                'trang_thai' => 1,
            ],
            [
                'ten_loai'   => 'FPS',
                'mo_ta'      => 'Thể loại bắn súng góc nhìn thứ nhất.',
                'trang_thai' => 1,
            ],
            [
                'ten_loai'   => 'Battle Royale',
                'mo_ta'      => 'Thể loại sinh tồn với nhiều người chơi.',
                'trang_thai' => 1,
            ],
            [
                'ten_loai'   => 'Sports',
                'mo_ta'      => 'Thể loại mô phỏng các môn thể thao.',
                'trang_thai' => 1,
            ],
            [
                'ten_loai'   => 'Fighting',
                'mo_ta'      => 'Thể loại đối kháng.',
                'trang_thai' => 1,
            ],
            [
                'ten_loai'   => 'Card Game',
                'mo_ta'      => 'Thể loại game thẻ bài chiến thuật.',
                'trang_thai' => 0,
            ],
            [
                'ten_loai'   => 'Auto Chess',
                'mo_ta'      => 'Thể loại chiến thuật tự động theo lượt.',
                'trang_thai' => 0,
            ],
            [
                'ten_loai'   => 'Hero Shooter',
                'mo_ta'      => 'Thể loại bắn súng kết hợp kỹ năng của từng nhân vật.',
                'trang_thai' => 0,
            ],
        ];

        foreach ($theLoais as $tl) {
            TheLoai::create($tl);
        }
    }
}
