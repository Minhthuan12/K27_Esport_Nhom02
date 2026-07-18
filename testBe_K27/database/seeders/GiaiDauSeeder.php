<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GiaiDau;
use App\Models\Game;

class GiaiDauSeeder extends Seeder
{
    public function run(): void
    {
        $games = Game::all();
        $gameIds = $games->pluck('id')->toArray();
        if (empty($gameIds)) {
            $gameIds = [1, 2, 3, 4, 5];
        }

        $tournaments = [
            // --- 2020 (2 Giải) ---
            ['id_game' => $gameIds[0 % count($gameIds)], 'ten_giai_dau' => 'VCS Mùa Xuân 2020', 'mo_ta' => 'Giải vô địch Liên Minh Huyền Thoại Việt Nam - Mùa Xuân 2020.', 'ngay_bat_dau' => '2020-01-15', 'ngay_ket_thuc' => '2020-03-20', 'hinh_thuc_thi_dau' => 'Online', 'dia_diem' => 'GG Stadium TP.HCM', 'so_luong_doi' => 8, 'trang_thai' => 1],
            ['id_game' => $gameIds[3 % count($gameIds)], 'ten_giai_dau' => 'VCT Mùa Đông 2020', 'mo_ta' => 'Giải đấu Valorant Championship Tour - Mùa Đông 2020.', 'ngay_bat_dau' => '2020-10-15', 'ngay_ket_thuc' => '2020-12-20', 'hinh_thuc_thi_dau' => 'Online', 'dia_diem' => 'Online', 'so_luong_doi' => 8, 'trang_thai' => 1],

            // --- 2021 (3 Giải) ---
            ['id_game' => $gameIds[2 % count($gameIds)], 'ten_giai_dau' => 'CS2 Spring Cup 2021', 'mo_ta' => 'Giải đấu CS2 Spring Cup chuyên nghiệp năm 2021.', 'ngay_bat_dau' => '2021-02-10', 'ngay_ket_thuc' => '2021-04-15', 'hinh_thuc_thi_dau' => 'Offline', 'dia_diem' => 'Vikings Esport Arena Hà Nội', 'so_luong_doi' => 10, 'trang_thai' => 1],
            ['id_game' => $gameIds[1 % count($gameIds)], 'ten_giai_dau' => 'Dota 2 Summer Open 2021', 'mo_ta' => 'Giải đấu Dota 2 Việt Nam Summer Open năm 2021.', 'ngay_bat_dau' => '2021-06-05', 'ngay_ket_thuc' => '2021-08-10', 'hinh_thuc_thi_dau' => 'Online', 'dia_diem' => 'Cyzone Stadium Hà Nội', 'so_luong_doi' => 8, 'trang_thai' => 1],
            ['id_game' => $gameIds[1 % count($gameIds)], 'ten_giai_dau' => 'Dota 2 Winter Arena 2021', 'mo_ta' => 'Giải đấu Dota 2 Việt Nam Winter Arena - Mùa Đông 2021.', 'ngay_bat_dau' => '2021-10-15', 'ngay_ket_thuc' => '2021-12-20', 'hinh_thuc_thi_dau' => 'Offline', 'dia_diem' => 'Cyzone Stadium Hà Nội', 'so_luong_doi' => 8, 'trang_thai' => 1],

            // --- 2022 (5 Giải) ---
            ['id_game' => $gameIds[4 % count($gameIds)], 'ten_giai_dau' => 'PUBG Vietnam Spring 2022', 'mo_ta' => 'Giải đấu PUBG sinh tồn chuyên nghiệp quốc gia - Mùa Xuân 2022.', 'ngay_bat_dau' => '2022-01-10', 'ngay_ket_thuc' => '2022-03-15', 'hinh_thuc_thi_dau' => 'Offline', 'dia_diem' => 'Vikings Esport Arena TP.HCM', 'so_luong_doi' => 16, 'trang_thai' => 1],
            ['id_game' => $gameIds[0 % count($gameIds)], 'ten_giai_dau' => 'VCS Mùa Hè 2022', 'mo_ta' => 'Giải vô địch Liên Minh Huyền Thoại Việt Nam - Mùa Hè 2022.', 'ngay_bat_dau' => '2022-05-20', 'ngay_ket_thuc' => '2022-07-30', 'hinh_thuc_thi_dau' => 'Offline', 'dia_diem' => 'GG Stadium TP.HCM', 'so_luong_doi' => 8, 'trang_thai' => 1],
            ['id_game' => $gameIds[3 % count($gameIds)], 'ten_giai_dau' => 'VCT Challengers Stage 2 2022', 'mo_ta' => 'Giải đấu Valorant Challengers Việt Nam Stage 2 2022.', 'ngay_bat_dau' => '2022-08-01', 'ngay_ket_thuc' => '2022-09-15', 'hinh_thuc_thi_dau' => 'Online', 'dia_diem' => 'Online', 'so_luong_doi' => 8, 'trang_thai' => 1],
            ['id_game' => $gameIds[0 % count($gameIds)], 'ten_giai_dau' => 'VCS Mùa Đông 2022', 'mo_ta' => 'Giải vô địch Liên Minh Huyền Thoại Việt Nam - Mùa Đông 2022.', 'ngay_bat_dau' => '2022-10-05', 'ngay_ket_thuc' => '2022-12-10', 'hinh_thuc_thi_dau' => 'Offline', 'dia_diem' => 'GG Stadium TP.HCM', 'so_luong_doi' => 8, 'trang_thai' => 1],
            ['id_game' => $gameIds[2 % count($gameIds)], 'ten_giai_dau' => 'CS2 Winter Invitational 2022', 'mo_ta' => 'Giải đấu CS2 mời các đội tuyển hàng đầu Mùa Đông 2022.', 'ngay_bat_dau' => '2022-11-15', 'ngay_ket_thuc' => '2022-12-25', 'hinh_thuc_thi_dau' => 'Online', 'dia_diem' => 'Online', 'so_luong_doi' => 10, 'trang_thai' => 1],

            // --- 2023 (6 Giải) ---
            ['id_game' => $gameIds[3 % count($gameIds)], 'ten_giai_dau' => 'VCT Split 1 2023', 'mo_ta' => 'Giải đấu Valorant Challengers Vietnam Split 1 - Mùa Xuân 2023.', 'ngay_bat_dau' => '2023-01-12', 'ngay_ket_thuc' => '2023-03-15', 'hinh_thuc_thi_dau' => 'Online', 'dia_diem' => 'Online', 'so_luong_doi' => 8, 'trang_thai' => 1],
            ['id_game' => $gameIds[0 % count($gameIds)], 'ten_giai_dau' => 'VCS Mùa Xuân 2023', 'mo_ta' => 'Giải vô địch Liên Minh Huyền Thoại Việt Nam - Mùa Xuân 2023.', 'ngay_bat_dau' => '2023-02-15', 'ngay_ket_thuc' => '2023-04-20', 'hinh_thuc_thi_dau' => 'Offline', 'dia_diem' => 'GG Stadium TP.HCM', 'so_luong_doi' => 8, 'trang_thai' => 1],
            ['id_game' => $gameIds[4 % count($gameIds)], 'ten_giai_dau' => 'PUBG Summer Series 2023', 'mo_ta' => 'Giải đấu PUBG mùa hè kịch tính 2023.', 'ngay_bat_dau' => '2023-05-10', 'ngay_ket_thuc' => '2023-07-05', 'hinh_thuc_thi_dau' => 'Offline', 'dia_diem' => 'Vikings Arena', 'so_luong_doi' => 16, 'trang_thai' => 1],
            ['id_game' => $gameIds[0 % count($gameIds)], 'ten_giai_dau' => 'VCS Mùa Hè 2023', 'mo_ta' => 'Giải vô địch Liên Minh Huyền Thoại Việt Nam - Mùa Hè 2023.', 'ngay_bat_dau' => '2023-07-15', 'ngay_ket_thuc' => '2023-09-20', 'hinh_thuc_thi_dau' => 'Offline', 'dia_diem' => 'GG Stadium TP.HCM', 'so_luong_doi' => 8, 'trang_thai' => 1],
            ['id_game' => $gameIds[2 % count($gameIds)], 'ten_giai_dau' => 'CS2 Championship 2023', 'mo_ta' => 'Giải vô địch CS2 toàn quốc năm 2023.', 'ngay_bat_dau' => '2023-09-01', 'ngay_ket_thuc' => '2023-10-25', 'hinh_thuc_thi_dau' => 'Offline', 'dia_diem' => 'Vikings Esport Arena Hà Nội', 'so_luong_doi' => 10, 'trang_thai' => 1],
            ['id_game' => $gameIds[1 % count($gameIds)], 'ten_giai_dau' => 'Dota 2 Winter Clash 2023', 'mo_ta' => 'Giải đấu Dota 2 Việt Nam Winter Clash - Mùa Đông 2023.', 'ngay_bat_dau' => '2023-10-10', 'ngay_ket_thuc' => '2023-12-15', 'hinh_thuc_thi_dau' => 'Online', 'dia_diem' => 'Cyzone Stadium Hà Nội', 'so_luong_doi' => 8, 'trang_thai' => 1],

            // --- 2024 (5 Giải) ---
            ['id_game' => $gameIds[0 % count($gameIds)], 'ten_giai_dau' => 'VCS Mùa Xuân 2024', 'mo_ta' => 'Giải vô địch Liên Minh Huyền Thoại Việt Nam - Mùa Xuân 2024.', 'ngay_bat_dau' => '2024-01-15', 'ngay_ket_thuc' => '2024-03-20', 'hinh_thuc_thi_dau' => 'Offline', 'dia_diem' => 'GG Stadium TP.HCM', 'so_luong_doi' => 8, 'trang_thai' => 1],
            ['id_game' => $gameIds[3 % count($gameIds)], 'ten_giai_dau' => 'VCT Challengers Split 1 2024', 'mo_ta' => 'Giải đấu Valorant Challengers Việt Nam 2024.', 'ngay_bat_dau' => '2024-04-10', 'ngay_ket_thuc' => '2024-06-15', 'hinh_thuc_thi_dau' => 'Online', 'dia_diem' => 'Online', 'so_luong_doi' => 8, 'trang_thai' => 1],
            ['id_game' => $gameIds[0 % count($gameIds)], 'ten_giai_dau' => 'VCS Mùa Hè 2024', 'mo_ta' => 'Giải vô địch Liên Minh Huyền Thoại Việt Nam - Mùa Hè 2024.', 'ngay_bat_dau' => '2024-06-20', 'ngay_ket_thuc' => '2024-08-30', 'hinh_thuc_thi_dau' => 'Offline', 'dia_diem' => 'GG Stadium TP.HCM', 'so_luong_doi' => 8, 'trang_thai' => 1],
            ['id_game' => $gameIds[2 % count($gameIds)], 'ten_giai_dau' => 'CS2 Winter League 2024', 'mo_ta' => 'Giải đấu CS2 Winter League chuyên nghiệp - Mùa Đông 2024.', 'ngay_bat_dau' => '2024-10-15', 'ngay_ket_thuc' => '2024-12-20', 'hinh_thuc_thi_dau' => 'Offline', 'dia_diem' => 'Vikings Esport Arena Hà Nội', 'so_luong_doi' => 10, 'trang_thai' => 1],
            ['id_game' => $gameIds[4 % count($gameIds)], 'ten_giai_dau' => 'PUBG Winter Master 2024', 'mo_ta' => 'Giải đấu PUBG sinh tồn Mùa Đông 2024.', 'ngay_bat_dau' => '2024-11-01', 'ngay_ket_thuc' => '2024-12-25', 'hinh_thuc_thi_dau' => 'Online', 'dia_diem' => 'Online', 'so_luong_doi' => 16, 'trang_thai' => 0],

            // --- 2025 (4 Giải) ---
            ['id_game' => $gameIds[3 % count($gameIds)], 'ten_giai_dau' => 'VCT Split 1 2025', 'mo_ta' => 'Giải đấu Valorant Challengers Vietnam Split 1 - Mùa Xuân 2025.', 'ngay_bat_dau' => '2025-01-15', 'ngay_ket_thuc' => '2025-03-20', 'hinh_thuc_thi_dau' => 'Online', 'dia_diem' => 'Online', 'so_luong_doi' => 8, 'trang_thai' => 1],
            ['id_game' => $gameIds[0 % count($gameIds)], 'ten_giai_dau' => 'LCP Mùa Xuân 2025', 'mo_ta' => 'Giải đấu League of Legends Championship Pacific - Mùa Xuân 2025.', 'ngay_bat_dau' => '2025-02-10', 'ngay_ket_thuc' => '2025-04-30', 'hinh_thuc_thi_dau' => 'Offline', 'dia_diem' => 'Taipei Esport Arena', 'so_luong_doi' => 8, 'trang_thai' => 1],
            ['id_game' => $gameIds[5 % count($gameIds)], 'ten_giai_dau' => 'FC Online Vietnam Cup 2025', 'mo_ta' => 'Giải đấu bóng đá điện tử FC Online Việt Nam năm 2025.', 'ngay_bat_dau' => '2025-06-01', 'ngay_ket_thuc' => '2025-08-10', 'hinh_thuc_thi_dau' => 'Offline', 'dia_diem' => 'Hoàng Mai Stadium Hà Nội', 'so_luong_doi' => 12, 'trang_thai' => 1],
            ['id_game' => $gameIds[4 % count($gameIds)], 'ten_giai_dau' => 'PUBG Winter Cup 2025', 'mo_ta' => 'Giải đấu PUBG sinh tồn chuyên nghiệp quốc gia - Mùa Đông 2025.', 'ngay_bat_dau' => '2025-10-15', 'ngay_ket_thuc' => '2025-12-20', 'hinh_thuc_thi_dau' => 'Offline', 'dia_diem' => 'Vikings Esport Arena TP.HCM', 'so_luong_doi' => 16, 'trang_thai' => 1],

            // --- 2026 (3 Giải) ---
            ['id_game' => $gameIds[0 % count($gameIds)], 'ten_giai_dau' => 'VCS Mùa Xuân 2026', 'mo_ta' => 'Giải vô địch Liên Minh Huyền Thoại Việt Nam - Mùa Xuân 2026.', 'ngay_bat_dau' => '2026-01-15', 'ngay_ket_thuc' => '2026-03-20', 'hinh_thuc_thi_dau' => 'Offline', 'dia_diem' => 'GG Stadium TP.HCM', 'so_luong_doi' => 8, 'trang_thai' => 1],
            ['id_game' => $gameIds[3 % count($gameIds)], 'ten_giai_dau' => 'VCT Pacific Stage 1 2026', 'mo_ta' => 'Giải đấu Valorant VCT Pacific Stage 1 năm 2026.', 'ngay_bat_dau' => '2026-04-05', 'ngay_ket_thuc' => '2026-06-10', 'hinh_thuc_thi_dau' => 'Offline', 'dia_diem' => 'Seoul Esports Stadium', 'so_luong_doi' => 10, 'trang_thai' => 1],
            ['id_game' => $gameIds[2 % count($gameIds)], 'ten_giai_dau' => 'CS2 Winter Showdown 2026', 'mo_ta' => 'Giải đấu CS2 Winter Showdown chuyên nghiệp - Mùa Đông 2026.', 'ngay_bat_dau' => '2026-10-15', 'ngay_ket_thuc' => '2026-12-20', 'hinh_thuc_thi_dau' => 'Online', 'dia_diem' => 'Vikings Esport Arena Hà Nội', 'so_luong_doi' => 10, 'trang_thai' => 0],
        ];

        foreach ($tournaments as $gd) {
            $gd['logo']       = 'https://api.dicebear.com/7.x/initials/svg?seed=' . urlencode($gd['ten_giai_dau']);
            $gd['created_at'] = $gd['ngay_bat_dau'] . ' 08:00:00';
            GiaiDau::create($gd);
        }
    }
}
