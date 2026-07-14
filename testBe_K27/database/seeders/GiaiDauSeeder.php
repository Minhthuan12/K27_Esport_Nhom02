<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GiaiDau;

class GiaiDauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $giaiDaus = [
            // --- NĂM 2024 ---
            [
                'id_game'           => 1, // League of Legends
                'ten_giai_dau'      => 'VCS Mùa Xuân 2024',
                'logo'              => 'uploads/giai_daus/vcs_spring_2024.png',
                'mo_ta'             => 'Giải vô địch Liên Minh Huyền Thoại Việt Nam - Mùa Xuân 2024.',
                'ngay_bat_dau'      => '2024-01-20',
                'ngay_ket_thuc'     => '2024-03-20',
                'hinh_thuc_thi_dau' => 'Vòng tròn + Playoff',
                'dia_diem'          => 'GG Stadium TP.HCM',
                'so_luong_doi'      => 8,
                'trang_thai'        => 1,
            ],
            [
                'id_game'           => 3, // Counter-Strike 2
                'ten_giai_dau'      => 'CS2 Pro League Season 1 - 2024',
                'logo'              => 'uploads/giai_daus/cs2_pro_1_2024.png',
                'mo_ta'             => 'Giải đấu Counter-Strike 2 chuyên nghiệp Việt Nam lần 1 năm 2024.',
                'ngay_bat_dau'      => '2024-02-15',
                'ngay_ket_thuc'     => '2024-04-15',
                'hinh_thuc_thi_dau' => 'Swiss + Knockout',
                'dia_diem'          => 'Vikings Esport Arena Hà Nội',
                'so_luong_doi'      => 10,
                'trang_thai'        => 1,
            ],
            [
                'id_game'           => 2, // Dota 2
                'ten_giai_dau'      => 'Dota 2 Vietnam Cup 2024',
                'logo'              => 'uploads/giai_daus/dota2_cup_2024.png',
                'mo_ta'             => 'Giải Dota 2 Việt Nam Cup năm 2024.',
                'ngay_bat_dau'      => '2024-04-05',
                'ngay_ket_thuc'     => '2024-05-15',
                'hinh_thuc_thi_dau' => 'Double Elimination',
                'dia_diem'          => 'Cyzone Stadium Hà Nội',
                'so_luong_doi'      => 8,
                'trang_thai'        => 1,
            ],
            [
                'id_game'           => 4, // Valorant
                'ten_giai_dau'      => 'Valorant Challengers VN Split 1 - 2024',
                'logo'              => 'uploads/giai_daus/vct_split_1_2024.png',
                'mo_ta'             => 'Giải đấu Valorant chuyên nghiệp Việt Nam Split 1 - 2024.',
                'ngay_bat_dau'      => '2024-05-01',
                'ngay_ket_thuc'     => '2024-07-01',
                'hinh_thuc_thi_dau' => 'GSL + Playoff',
                'dia_diem'          => 'Online + Chung kết TP.HCM',
                'so_luong_doi'      => 8,
                'trang_thai'        => 1,
            ],
            [
                'id_game'           => 1, // League of Legends
                'ten_giai_dau'      => 'VCS Mùa Hè 2024',
                'logo'              => 'uploads/giai_daus/vcs_summer_2024.png',
                'mo_ta'             => 'Giải vô địch Liên Minh Huyền Thoại Việt Nam - Mùa Hè 2024.',
                'ngay_bat_dau'      => '2024-06-20',
                'ngay_ket_thuc'     => '2024-08-20',
                'hinh_thuc_thi_dau' => 'Vòng tròn + Playoff',
                'dia_diem'          => 'GG Stadium TP.HCM',
                'so_luong_doi'      => 8,
                'trang_thai'        => 1,
            ],
            [
                'id_game'           => 5, // PUBG: Battlegrounds
                'ten_giai_dau'      => 'PUBG Vietnam Championship 2024',
                'logo'              => 'uploads/giai_daus/pubg_vn_2024.png',
                'mo_ta'             => 'Giải vô địch PUBG quốc gia năm 2024.',
                'ngay_bat_dau'      => '2024-08-10',
                'ngay_ket_thuc'     => '2024-09-10',
                'hinh_thuc_thi_dau' => 'League + Finals',
                'dia_diem'          => 'Vikings Esport Arena TP.HCM',
                'so_luong_doi'      => 16,
                'trang_thai'        => 1,
            ],
            [
                'id_game'           => 3, // Counter-Strike 2
                'ten_giai_dau'      => 'CS2 Pro League Season 2 - 2024',
                'logo'              => 'uploads/giai_daus/cs2_pro_2_2024.png',
                'mo_ta'             => 'Giải đấu Counter-Strike 2 chuyên nghiệp Việt Nam lần 2 năm 2024.',
                'ngay_bat_dau'      => '2024-09-15',
                'ngay_ket_thuc'     => '2024-11-15',
                'hinh_thuc_thi_dau' => 'Swiss + Knockout',
                'dia_diem'          => 'Vikings Esport Arena Hà Nội',
                'so_luong_doi'      => 10,
                'trang_thai'        => 1,
            ],
            [
                'id_game'           => 4, // Valorant
                'ten_giai_dau'      => 'Valorant Challengers VN Split 2 - 2024',
                'logo'              => 'uploads/giai_daus/vct_split_2_2024.png',
                'mo_ta'             => 'Giải đấu Valorant chuyên nghiệp Việt Nam Split 2 - 2024.',
                'ngay_bat_dau'      => '2024-10-01',
                'ngay_ket_thuc'     => '2024-12-01',
                'hinh_thuc_thi_dau' => 'GSL + Playoff',
                'dia_diem'          => 'Online + Chung kết Đà Nẵng',
                'so_luong_doi'      => 8,
                'trang_thai'        => 1,
            ],

            // --- NĂM 2025 ---
            [
                'id_game'           => 1, // League of Legends
                'ten_giai_dau'      => 'VCS Mùa Xuân 2025',
                'logo'              => 'uploads/giai_daus/vcs_spring_2025.png',
                'mo_ta'             => 'Giải vô địch Liên Minh Huyền Thoại Việt Nam - Mùa Xuân 2025.',
                'ngay_bat_dau'      => '2025-01-15',
                'ngay_ket_thuc'     => '2025-03-15',
                'hinh_thuc_thi_dau' => 'Vòng tròn + Playoff',
                'dia_diem'          => 'GG Stadium TP.HCM',
                'so_luong_doi'      => 8,
                'trang_thai'        => 1,
            ],
            [
                'id_game'           => 3, // Counter-Strike 2
                'ten_giai_dau'      => 'CS2 Pro League Season 1 - 2025',
                'logo'              => 'uploads/giai_daus/cs2_pro_1_2025.png',
                'mo_ta'             => 'Giải đấu Counter-Strike 2 chuyên nghiệp Việt Nam lần 1 năm 2025.',
                'ngay_bat_dau'      => '2025-02-10',
                'ngay_ket_thuc'     => '2025-04-10',
                'hinh_thuc_thi_dau' => 'Swiss + Knockout',
                'dia_diem'          => 'Vikings Esport Arena Hà Nội',
                'so_luong_doi'      => 10,
                'trang_thai'        => 1,
            ],
            [
                'id_game'           => 2, // Dota 2
                'ten_giai_dau'      => 'Dota 2 Vietnam Championship 2025',
                'logo'              => 'uploads/giai_daus/dota2_championship_2025.png',
                'mo_ta'             => 'Giải vô địch Dota 2 quốc gia năm 2025.',
                'ngay_bat_dau'      => '2025-04-10',
                'ngay_ket_thuc'     => '2025-05-20',
                'hinh_thuc_thi_dau' => 'Double Elimination',
                'dia_diem'          => 'Cyzone Stadium Hà Nội',
                'so_luong_doi'      => 8,
                'trang_thai'        => 1,
            ],
            [
                'id_game'           => 4, // Valorant
                'ten_giai_dau'      => 'Valorant Challengers VN Split 1 - 2025',
                'logo'              => 'uploads/giai_daus/vct_split_1_2025.png',
                'mo_ta'             => 'Giải đấu Valorant chuyên nghiệp chính thức tại Việt Nam - Vòng 1.',
                'ngay_bat_dau'      => '2025-05-20',
                'ngay_ket_thuc'     => '2025-07-20',
                'hinh_thuc_thi_dau' => 'GSL + Playoff',
                'dia_diem'          => 'Online + Chung kết TP.HCM',
                'so_luong_doi'      => 8,
                'trang_thai'        => 1,
            ],
            [
                'id_game'           => 1, // League of Legends
                'ten_giai_dau'      => 'VCS Mùa Hè 2025',
                'logo'              => 'uploads/giai_daus/vcs_summer_2025.png',
                'mo_ta'             => 'Giải vô địch Liên Minh Huyền Thoại Việt Nam - Mùa Hè 2025.',
                'ngay_bat_dau'      => '2025-06-15',
                'ngay_ket_thuc'     => '2025-08-15',
                'hinh_thuc_thi_dau' => 'Vòng tròn + Playoff',
                'dia_diem'          => 'GG Stadium TP.HCM',
                'so_luong_doi'      => 8,
                'trang_thai'        => 1,
            ],
            [
                'id_game'           => 5, // PUBG: Battlegrounds
                'ten_giai_dau'      => 'PUBG Vietnam Series 2025',
                'logo'              => 'uploads/giai_daus/pubg_pvs_2025.png',
                'mo_ta'             => 'Giải đấu sinh tồn PUBG chuyên nghiệp quốc gia năm 2025.',
                'ngay_bat_dau'      => '2025-08-25',
                'ngay_ket_thuc'     => '2025-09-25',
                'hinh_thuc_thi_dau' => 'League + Finals',
                'dia_diem'          => 'Vikings Esport Arena TP.HCM',
                'so_luong_doi'      => 16,
                'trang_thai'        => 1,
            ],
            [
                'id_game'           => 3, // Counter-Strike 2
                'ten_giai_dau'      => 'CS2 Pro League Season 2 - 2025',
                'logo'              => 'uploads/giai_daus/cs2_pro_2_2025.png',
                'mo_ta'             => 'Giải đấu Counter-Strike 2 chuyên nghiệp Việt Nam lần 2 năm 2025.',
                'ngay_bat_dau'      => '2025-09-10',
                'ngay_ket_thuc'     => '2025-11-10',
                'hinh_thuc_thi_dau' => 'Swiss + Knockout',
                'dia_diem'          => 'Vikings Esport Arena Hà Nội',
                'so_luong_doi'      => 10,
                'trang_thai'        => 1,
            ],
            [
                'id_game'           => 4, // Valorant
                'ten_giai_dau'      => 'Valorant Challengers VN Split 2 - 2025',
                'logo'              => 'uploads/giai_daus/vct_split_2_2025.png',
                'mo_ta'             => 'Giải đấu Valorant chuyên nghiệp chính thức tại Việt Nam - Vòng 2.',
                'ngay_bat_dau'      => '2025-10-15',
                'ngay_ket_thuc'     => '2025-12-15',
                'hinh_thuc_thi_dau' => 'GSL + Playoff',
                'dia_diem'          => 'Online + Chung kết Đà Nẵng',
                'so_luong_doi'      => 8,
                'trang_thai'        => 1,
            ],
        ];

        foreach ($giaiDaus as $key => $gd) {
            $gd['logo'] = 'https://api.dicebear.com/7.x/initials/svg?seed=' . urlencode($gd['ten_giai_dau']);
            if ($key % 3 == 0) {
                $gd['trang_thai'] = 0;
            }
            GiaiDau::create($gd);
        }
    }
}
