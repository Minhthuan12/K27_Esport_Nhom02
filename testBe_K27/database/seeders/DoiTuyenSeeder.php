<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DoiTuyen;

class DoiTuyenSeeder extends Seeder
{
    public function run(): void
    {
        $doiTuyens = [
            [
                'id_nguoi_dung' => 9,
                'ten_doi_tuyen' => 'Cerberus Esports',
                'ten_viet_tat'  => 'CES',
                'logo'          => 'uploads/doi_tuyens/ces.png',
                'mo_ta'         => 'Đội tuyển chuyên nghiệp nổi tiếng với lối chơi tấn công mạnh mẽ.',
                'trang_thai'    => 1,
            ],
            [
                'id_nguoi_dung' => 10,
                'ten_doi_tuyen' => 'Saigon Buffalo',
                'ten_viet_tat'  => 'SGB',
                'logo'          => 'uploads/doi_tuyens/sgb.png',
                'mo_ta'         => 'Đội tuyển "Bầy Trâu" từng nhiều lần đại diện Việt Nam thi đấu quốc tế.',
                'trang_thai'    => 1,
            ],
            [
                'id_nguoi_dung' => 11,
                'ten_doi_tuyen' => 'Vikings Esports',
                'ten_viet_tat'  => 'VKE',
                'logo'          => 'uploads/doi_tuyens/vke.png',
                'mo_ta'         => 'Đội tuyển của Vikings với sự dẫn dắt từ các huyền thoại kỳ cựu.',
                'trang_thai'    => 1,
            ],
            [
                'id_nguoi_dung' => 12,
                'ten_doi_tuyen' => 'MGN Blue Esports',
                'ten_viet_tat'  => 'MBE',
                'logo'          => 'uploads/doi_tuyens/mbe.png',
                'mo_ta'         => 'Đội tuyển trẻ có phong cách thi đấu đầy khát khao và đột phá.',
                'trang_thai'    => 1,
            ],
            [
                'id_nguoi_dung' => 13,
                'ten_doi_tuyen' => 'GAM Esports',
                'ten_viet_tat'  => 'GAM',
                'logo'          => 'uploads/doi_tuyens/gam.png',
                'mo_ta'         => 'Đội tuyển Esport giàu thành tích bậc nhất lịch sử Liên Minh Huyền Thoại Việt Nam.',
                'trang_thai'    => 1,
            ],
            [
                'id_nguoi_dung' => 14,
                'ten_doi_tuyen' => 'Team Whales',
                'ten_viet_tat'  => 'TW',
                'logo'          => 'uploads/doi_tuyens/tw.png',
                'mo_ta'         => 'Đội tuyển "Bầy Cá Voi" thế lực mới mạnh mẽ tại VCS.',
                'trang_thai'    => 1,
            ],
            [
                'id_nguoi_dung' => 5,
                'ten_doi_tuyen' => 'Team Flash',
                'ten_viet_tat'  => 'FL',
                'logo'          => 'uploads/doi_tuyens/fl.png',
                'mo_ta'         => 'Tổ chức Esports danh tiếng Đông Nam Á có chi nhánh tại Việt Nam.',
                'trang_thai'    => 1,
            ],
            [
                'id_nguoi_dung' => 8,
                'ten_doi_tuyen' => 'Rainbow Warriors',
                'ten_viet_tat'  => 'RW',
                'logo'          => 'uploads/doi_tuyens/rw.png',
                'mo_ta'         => 'Đội tuyển mới nổi với lối chơi đoàn kết, cống hiến.',
                'trang_thai'    => 1,
            ],
            [
                'id_nguoi_dung' => 19,
                'ten_doi_tuyen' => 'Luxury Esports',
                'ten_viet_tat'  => 'LX',
                'logo'          => 'uploads/doi_tuyens/lx.png',
                'mo_ta'         => 'Đội tuyển có tinh thần chiến đấu quả cảm, kiên cường.',
                'trang_thai'    => 1,
            ],
            [
                'id_nguoi_dung' => 20,
                'ten_doi_tuyen' => 'Team Secret',
                'ten_viet_tat'  => 'TS',
                'logo'          => 'uploads/doi_tuyens/ts.png',
                'mo_ta'         => 'Ẩn Mật Giáo - đội tuyển có lượng fan đông đảo cùng lối chơi cống hiến.',
                'trang_thai'    => 1,
            ],
        ];

        foreach ($doiTuyens as $key => $dt) {
            $dt['logo'] = 'https://api.dicebear.com/7.x/initials/svg?seed=' . urlencode($dt['ten_doi_tuyen']);
            if ($key % 3 == 0) {
                $dt['trang_thai'] = 0;
            }
            DoiTuyen::create($dt);
        }
    }
}
