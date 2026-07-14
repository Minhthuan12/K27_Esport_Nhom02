<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VongDau;

class VongDauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vongDaus = [
            // --- NĂM 2024 (id_giai_dau từ 1 đến 8) ---
            // Giải đấu 1 - VCS Mùa Xuân 2024 (LoL) | 2024-01-20 -> 2024-03-20
            [
                'id_giai_dau'       => 1,
                'ten_vong_dau'      => 'Vòng bảng',
                'ngay_bat_dau'      => '2024-01-20',
                'ngay_ket_thuc'     => '2024-03-05',
                'so_doi_tham_gia'   => 8,
                'hinh_thuc_thi_dau' => 'Vòng tròn 2 lượt',
                'dia_diem'          => 'GG Stadium TP.HCM',
                'trang_thai'        => 1,
            ],
            [
                'id_giai_dau'       => 1,
                'ten_vong_dau'      => 'Chung kết',
                'ngay_bat_dau'      => '2024-03-10',
                'ngay_ket_thuc'     => '2024-03-20',
                'so_doi_tham_gia'   => 4,
                'hinh_thuc_thi_dau' => 'Double Elimination',
                'dia_diem'          => 'GG Stadium TP.HCM',
                'trang_thai'        => 1,
            ],

            // Giải đấu 2 - CS2 Pro League Season 1 - 2024 (CS2) | 2024-02-15 -> 2024-04-15
            [
                'id_giai_dau'       => 2,
                'ten_vong_dau'      => 'Vòng bảng',
                'ngay_bat_dau'      => '2024-02-15',
                'ngay_ket_thuc'     => '2024-03-30',
                'so_doi_tham_gia'   => 10,
                'hinh_thuc_thi_dau' => 'Swiss System',
                'dia_diem'          => 'Vikings Esport Arena Hà Nội',
                'trang_thai'        => 1,
            ],
            [
                'id_giai_dau'       => 2,
                'ten_vong_dau'      => 'Chung kết',
                'ngay_bat_dau'      => '2024-04-05',
                'ngay_ket_thuc'     => '2024-04-15',
                'so_doi_tham_gia'   => 4,
                'hinh_thuc_thi_dau' => 'Knockout',
                'dia_diem'          => 'Vikings Esport Arena Hà Nội',
                'trang_thai'        => 1,
            ],

            // Giải đấu 3 - Dota 2 Vietnam Cup 2024 (Dota 2) | 2024-04-05 -> 2024-05-15
            [
                'id_giai_dau'       => 3,
                'ten_vong_dau'      => 'Vòng bảng',
                'ngay_bat_dau'      => '2024-04-05',
                'ngay_ket_thuc'     => '2024-04-30',
                'so_doi_tham_gia'   => 8,
                'hinh_thuc_thi_dau' => 'Vòng tròn 1 lượt',
                'dia_diem'          => 'Cyzone Stadium Hà Nội',
                'trang_thai'        => 1,
            ],
            [
                'id_giai_dau'       => 3,
                'ten_vong_dau'      => 'Chung kết',
                'ngay_bat_dau'      => '2024-05-05',
                'ngay_ket_thuc'     => '2024-05-15',
                'so_doi_tham_gia'   => 4,
                'hinh_thuc_thi_dau' => 'Double Elimination',
                'dia_diem'          => 'Cyzone Stadium Hà Nội',
                'trang_thai'        => 1,
            ],

            // Giải đấu 4 - Valorant Challengers VN Split 1 - 2024 (Valorant) | 2024-05-01 -> 2024-07-01
            [
                'id_giai_dau'       => 4,
                'ten_vong_dau'      => 'Vòng bảng',
                'ngay_bat_dau'      => '2024-05-01',
                'ngay_ket_thuc'     => '2024-06-15',
                'so_doi_tham_gia'   => 8,
                'hinh_thuc_thi_dau' => 'Vòng tròn 2 lượt',
                'dia_diem'          => 'Online',
                'trang_thai'        => 1,
            ],
            [
                'id_giai_dau'       => 4,
                'ten_vong_dau'      => 'Chung kết',
                'ngay_bat_dau'      => '2024-06-20',
                'ngay_ket_thuc'     => '2024-07-01',
                'so_doi_tham_gia'   => 4,
                'hinh_thuc_thi_dau' => 'Double Elimination',
                'dia_diem'          => 'Chung kết TP.HCM',
                'trang_thai'        => 1,
            ],

            // Giải đấu 5 - VCS Mùa Hè 2024 (LoL) | 2024-06-20 -> 2024-08-20
            [
                'id_giai_dau'       => 5,
                'ten_vong_dau'      => 'Vòng bảng',
                'ngay_bat_dau'      => '2024-06-20',
                'ngay_ket_thuc'     => '2024-08-05',
                'so_doi_tham_gia'   => 8,
                'hinh_thuc_thi_dau' => 'Vòng tròn 2 lượt',
                'dia_diem'          => 'GG Stadium TP.HCM',
                'trang_thai'        => 1,
            ],
            [
                'id_giai_dau'       => 5,
                'ten_vong_dau'      => 'Chung kết',
                'ngay_bat_dau'      => '2024-08-10',
                'ngay_ket_thuc'     => '2024-08-20',
                'so_doi_tham_gia'   => 4,
                'hinh_thuc_thi_dau' => 'Double Elimination',
                'dia_diem'          => 'GG Stadium TP.HCM',
                'trang_thai'        => 1,
            ],

            // Giải đấu 6 - PUBG Vietnam Championship 2024 (PUBG) | 2024-08-10 -> 2024-09-10
            [
                'id_giai_dau'       => 6,
                'ten_vong_dau'      => 'Vòng bảng',
                'ngay_bat_dau'      => '2024-08-10',
                'ngay_ket_thuc'     => '2024-08-30',
                'so_doi_tham_gia'   => 16,
                'hinh_thuc_thi_dau' => 'League Stage',
                'dia_diem'          => 'Vikings Esport Arena TP.HCM',
                'trang_thai'        => 1,
            ],
            [
                'id_giai_dau'       => 6,
                'ten_vong_dau'      => 'Chung kết',
                'ngay_bat_dau'      => '2024-09-01',
                'ngay_ket_thuc'     => '2024-09-10',
                'so_doi_tham_gia'   => 16,
                'hinh_thuc_thi_dau' => 'Finals Round',
                'dia_diem'          => 'Vikings Esport Arena TP.HCM',
                'trang_thai'        => 1,
            ],

            // Giải đấu 7 - CS2 Pro League Season 2 - 2024 (CS2) | 2024-09-15 -> 2024-11-15
            [
                'id_giai_dau'       => 7,
                'ten_vong_dau'      => 'Vòng bảng',
                'ngay_bat_dau'      => '2024-09-15',
                'ngay_ket_thuc'     => '2024-10-30',
                'so_doi_tham_gia'   => 10,
                'hinh_thuc_thi_dau' => 'Swiss System',
                'dia_diem'          => 'Vikings Esport Arena Hà Nội',
                'trang_thai'        => 1,
            ],
            [
                'id_giai_dau'       => 7,
                'ten_vong_dau'      => 'Chung kết',
                'ngay_bat_dau'      => '2024-11-05',
                'ngay_ket_thuc'     => '2024-11-15',
                'so_doi_tham_gia'   => 4,
                'hinh_thuc_thi_dau' => 'Knockout',
                'dia_diem'          => 'Vikings Esport Arena Hà Nội',
                'trang_thai'        => 1,
            ],

            // Giải đấu 8 - Valorant Challengers VN Split 2 - 2024 (Valorant) | 2024-10-01 -> 2024-12-01
            [
                'id_giai_dau'       => 8,
                'ten_vong_dau'      => 'Vòng bảng',
                'ngay_bat_dau'      => '2024-10-01',
                'ngay_ket_thuc'     => '2024-11-15',
                'so_doi_tham_gia'   => 8,
                'hinh_thuc_thi_dau' => 'Vòng tròn 2 lượt',
                'dia_diem'          => 'Online',
                'trang_thai'        => 1,
            ],
            [
                'id_giai_dau'       => 8,
                'ten_vong_dau'      => 'Chung kết',
                'ngay_bat_dau'      => '2024-11-20',
                'ngay_ket_thuc'     => '2024-12-01',
                'so_doi_tham_gia'   => 4,
                'hinh_thuc_thi_dau' => 'Double Elimination',
                'dia_diem'          => 'Chung kết Đà Nẵng',
                'trang_thai'        => 1,
            ],


            // --- NĂM 2025 (id_giai_dau từ 9 đến 16) ---
            // Giải đấu 9 - VCS Mùa Xuân 2025 (LoL) | 2025-01-15 -> 2025-03-15
            [
                'id_giai_dau'       => 9,
                'ten_vong_dau'      => 'Vòng bảng',
                'ngay_bat_dau'      => '2025-01-15',
                'ngay_ket_thuc'     => '2025-03-01',
                'so_doi_tham_gia'   => 8,
                'hinh_thuc_thi_dau' => 'Vòng tròn 2 lượt',
                'dia_diem'          => 'GG Stadium TP.HCM',
                'trang_thai'        => 1,
            ],
            [
                'id_giai_dau'       => 9,
                'ten_vong_dau'      => 'Chung kết',
                'ngay_bat_dau'      => '2025-03-05',
                'ngay_ket_thuc'     => '2025-03-15',
                'so_doi_tham_gia'   => 4,
                'hinh_thuc_thi_dau' => 'Double Elimination',
                'dia_diem'          => 'GG Stadium TP.HCM',
                'trang_thai'        => 1,
            ],

            // Giải đấu 10 - CS2 Pro League Season 1 - 2025 (CS2) | 2025-02-10 -> 2025-04-10
            [
                'id_giai_dau'       => 10,
                'ten_vong_dau'      => 'Vòng bảng',
                'ngay_bat_dau'      => '2025-02-10',
                'ngay_ket_thuc'     => '2025-03-25',
                'so_doi_tham_gia'   => 10,
                'hinh_thuc_thi_dau' => 'Swiss System',
                'dia_diem'          => 'Vikings Esport Arena Hà Nội',
                'trang_thai'        => 1,
            ],
            [
                'id_giai_dau'       => 10,
                'ten_vong_dau'      => 'Chung kết',
                'ngay_bat_dau'      => '2025-04-01',
                'ngay_ket_thuc'     => '2025-04-10',
                'so_doi_tham_gia'   => 4,
                'hinh_thuc_thi_dau' => 'Knockout',
                'dia_diem'          => 'Vikings Esport Arena Hà Nội',
                'trang_thai'        => 1,
            ],

            // Giải đấu 11 - Dota 2 Vietnam Championship 2025 (Dota 2) | 2025-04-10 -> 2025-05-20
            [
                'id_giai_dau'       => 11,
                'ten_vong_dau'      => 'Vòng bảng',
                'ngay_bat_dau'      => '2025-04-10',
                'ngay_ket_thuc'     => '2025-05-05',
                'so_doi_tham_gia'   => 8,
                'hinh_thuc_thi_dau' => 'Vòng tròn 1 lượt',
                'dia_diem'          => 'Cyzone Stadium Hà Nội',
                'trang_thai'        => 1,
            ],
            [
                'id_giai_dau'       => 11,
                'ten_vong_dau'      => 'Chung kết',
                'ngay_bat_dau'      => '2025-05-10',
                'ngay_ket_thuc'     => '2025-05-20',
                'so_doi_tham_gia'   => 4,
                'hinh_thuc_thi_dau' => 'Double Elimination',
                'dia_diem'          => 'Cyzone Stadium Hà Nội',
                'trang_thai'        => 1,
            ],

            // Giải đấu 12 - Valorant Challengers VN Split 1 - 2025 (Valorant) | 2025-05-20 -> 2025-07-20
            [
                'id_giai_dau'       => 12,
                'ten_vong_dau'      => 'Vòng bảng',
                'ngay_bat_dau'      => '2025-05-20',
                'ngay_ket_thuc'     => '2025-07-05',
                'so_doi_tham_gia'   => 8,
                'hinh_thuc_thi_dau' => 'Vòng tròn 2 lượt',
                'dia_diem'          => 'Online',
                'trang_thai'        => 1,
            ],
            [
                'id_giai_dau'       => 12,
                'ten_vong_dau'      => 'Chung kết',
                'ngay_bat_dau'      => '2025-07-10',
                'ngay_ket_thuc'     => '2025-07-20',
                'so_doi_tham_gia'   => 4,
                'hinh_thuc_thi_dau' => 'Double Elimination',
                'dia_diem'          => 'Chung kết TP.HCM',
                'trang_thai'        => 1,
            ],

            // Giải đấu 13 - VCS Mùa Hè 2025 (LoL) | 2025-06-15 -> 2025-08-15
            [
                'id_giai_dau'       => 13,
                'ten_vong_dau'      => 'Vòng bảng',
                'ngay_bat_dau'      => '2025-06-15',
                'ngay_ket_thuc'     => '2025-08-01',
                'so_doi_tham_gia'   => 8,
                'hinh_thuc_thi_dau' => 'Vòng tròn 2 lượt',
                'dia_diem'          => 'GG Stadium TP.HCM',
                'trang_thai'        => 1,
            ],
            [
                'id_giai_dau'       => 13,
                'ten_vong_dau'      => 'Chung kết',
                'ngay_bat_dau'      => '2025-08-05',
                'ngay_ket_thuc'     => '2025-08-15',
                'so_doi_tham_gia'   => 4,
                'hinh_thuc_thi_dau' => 'Double Elimination',
                'dia_diem'          => 'GG Stadium TP.HCM',
                'trang_thai'        => 1,
            ],

            // Giải đấu 14 - PUBG Vietnam Series 2025 (PUBG) | 2025-08-25 -> 2025-09-25
            [
                'id_giai_dau'       => 14,
                'ten_vong_dau'      => 'Vòng bảng',
                'ngay_bat_dau'      => '2025-08-25',
                'ngay_ket_thuc'     => '2025-09-12',
                'so_doi_tham_gia'   => 16,
                'hinh_thuc_thi_dau' => 'League Stage',
                'dia_diem'          => 'Vikings Esport Arena TP.HCM',
                'trang_thai'        => 1,
            ],
            [
                'id_giai_dau'       => 14,
                'ten_vong_dau'      => 'Chung kết',
                'ngay_bat_dau'      => '2025-09-15',
                'ngay_ket_thuc'     => '2025-09-25',
                'so_doi_tham_gia'   => 16,
                'hinh_thuc_thi_dau' => 'Finals Round',
                'dia_diem'          => 'Vikings Esport Arena TP.HCM',
                'trang_thai'        => 1,
            ],

            // Giải đấu 15 - CS2 Pro League Season 2 - 2025 (CS2) | 2025-09-10 -> 2025-11-10
            [
                'id_giai_dau'       => 15,
                'ten_vong_dau'      => 'Vòng bảng',
                'ngay_bat_dau'      => '2025-09-10',
                'ngay_ket_thuc'     => '2025-10-25',
                'so_doi_tham_gia'   => 10,
                'hinh_thuc_thi_dau' => 'Swiss System',
                'dia_diem'          => 'Vikings Esport Arena Hà Nội',
                'trang_thai'        => 1,
            ],
            [
                'id_giai_dau'       => 15,
                'ten_vong_dau'      => 'Chung kết',
                'ngay_bat_dau'      => '2025-11-01',
                'ngay_ket_thuc'     => '2025-11-10',
                'so_doi_tham_gia'   => 4,
                'hinh_thuc_thi_dau' => 'Knockout',
                'dia_diem'          => 'Vikings Esport Arena Hà Nội',
                'trang_thai'        => 1,
            ],

            // Giải đấu 16 - Valorant Challengers VN Split 2 - 2025 (Valorant) | 2025-10-15 -> 2025-12-15
            [
                'id_giai_dau'       => 16,
                'ten_vong_dau'      => 'Vòng bảng',
                'ngay_bat_dau'      => '2025-10-15',
                'ngay_ket_thuc'     => '2025-12-01',
                'so_doi_tham_gia'   => 8,
                'hinh_thuc_thi_dau' => 'Vòng tròn 2 lượt',
                'dia_diem'          => 'Online',
                'trang_thai'        => 1,
            ],
            [
                'id_giai_dau'       => 16,
                'ten_vong_dau'      => 'Chung kết',
                'ngay_bat_dau'      => '2025-12-05',
                'ngay_ket_thuc'     => '2025-12-15',
                'so_doi_tham_gia'   => 4,
                'hinh_thuc_thi_dau' => 'Double Elimination',
                'dia_diem'          => 'Chung kết Đà Nẵng',
                'trang_thai'        => 1,
            ],
        ];

        foreach ($vongDaus as $key => $vd) {
            if ($key % 4 == 0) {
                $vd['trang_thai'] = 0;
            }
            VongDau::create($vd);
        }
    }
}
