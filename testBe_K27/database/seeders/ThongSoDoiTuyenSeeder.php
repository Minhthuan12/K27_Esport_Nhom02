<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ThongSoDoiTuyen;

class ThongSoDoiTuyenSeeder extends Seeder
{
    public function run(): void
    {
        $thongSos = [
            // --- Đội 1: Cerberus Esports (CES) ---
            [
                'id_doi_tuyen'  => 1,
                'id_game'       => 1, // League of Legends
                'trang_thai'    => 1,
                'so_tran_thua'  => 12,
                'so_tran_thang' => 18,
                'so_tran_hoa'   => 0,
                'so_giai_nhat'  => 1,
                'so_giai_nhi'   => 1,
                'so_giai_ba'    => 2,
                'so_giai_thuong' => 4,
            ],
            [
                'id_doi_tuyen'  => 1,
                'id_game'       => 5, // PUBG
                'trang_thai'    => 1,
                'so_tran_thua'  => 8,
                'so_tran_thang' => 22,
                'so_tran_hoa'   => 0,
                'so_giai_nhat'  => 3,
                'so_giai_nhi'   => 0,
                'so_giai_ba'    => 1,
                'so_giai_thuong' => 4,
            ],

            // --- Đội 2: Saigon Buffalo (SGB) ---
            [
                'id_doi_tuyen'  => 2,
                'id_game'       => 1, // League of Legends
                'trang_thai'    => 1,
                'so_tran_thua'  => 10,
                'so_tran_thang' => 20,
                'so_tran_hoa'   => 0,
                'so_giai_nhat'  => 2,
                'so_giai_nhi'   => 2,
                'so_giai_ba'    => 1,
                'so_giai_thuong' => 5,
            ],

            // --- Đội 3: Vikings Esports (VKE) ---
            [
                'id_doi_tuyen'  => 3,
                'id_game'       => 1, // League of Legends
                'trang_thai'    => 1,
                'so_tran_thua'  => 5,
                'so_tran_thang' => 15,
                'so_tran_hoa'   => 0,
                'so_giai_nhat'  => 0,
                'so_giai_nhi'   => 1,
                'so_giai_ba'    => 1,
                'so_giai_thuong' => 2,
            ],

            // --- Đội 4: MGN Blue Esports (MBE) ---
            [
                'id_doi_tuyen'  => 4,
                'id_game'       => 1, // League of Legends
                'trang_thai'    => 1,
                'so_tran_thua'  => 14,
                'so_tran_thang' => 12,
                'so_tran_hoa'   => 0,
                'so_giai_nhat'  => 0,
                'so_giai_nhi'   => 0,
                'so_giai_ba'    => 1,
                'so_giai_thuong' => 1,
            ],
            [
                'id_doi_tuyen'  => 4,
                'id_game'       => 4, // Valorant
                'trang_thai'    => 1,
                'so_tran_thua'  => 6,
                'so_tran_thang' => 18,
                'so_tran_hoa'   => 0,
                'so_giai_nhat'  => 1,
                'so_giai_nhi'   => 1,
                'so_giai_ba'    => 0,
                'so_giai_thuong' => 2,
            ],

            // --- Đội 5: GAM Esports (GAM) ---
            [
                'id_doi_tuyen'  => 5,
                'id_game'       => 1, // League of Legends
                'trang_thai'    => 1,
                'so_tran_thua'  => 6,
                'so_tran_thang' => 34,
                'so_tran_hoa'   => 0,
                'so_giai_nhat'  => 8,
                'so_giai_nhi'   => 2,
                'so_giai_ba'    => 0,
                'so_giai_thuong' => 10,
            ],

            // --- Đội 6: Team Whales (TW) ---
            [
                'id_doi_tuyen'  => 6,
                'id_game'       => 1, // League of Legends
                'trang_thai'    => 1,
                'so_tran_thua'  => 9,
                'so_tran_thang' => 21,
                'so_tran_hoa'   => 0,
                'so_giai_nhat'  => 1,
                'so_giai_nhi'   => 3,
                'so_giai_ba'    => 1,
                'so_giai_thuong' => 5,
            ],

            // --- Đội 7: Team Flash (FL) ---
            [
                'id_doi_tuyen'  => 7,
                'id_game'       => 1, // League of Legends
                'trang_thai'    => 1,
                'so_tran_thua'  => 15,
                'so_tran_thang' => 25,
                'so_tran_hoa'   => 0,
                'so_giai_nhat'  => 2,
                'so_giai_nhi'   => 1,
                'so_giai_ba'    => 2,
                'so_giai_thuong' => 5,
            ],
            [
                'id_doi_tuyen'  => 7,
                'id_game'       => 3, // CS2
                'trang_thai'    => 1,
                'so_tran_thua'  => 10,
                'so_tran_thang' => 20,
                'so_tran_hoa'   => 0,
                'so_giai_nhat'  => 2,
                'so_giai_nhi'   => 1,
                'so_giai_ba'    => 1,
                'so_giai_thuong' => 4,
            ],

            // --- Đội 8: Rainbow Warriors (RW) ---
            [
                'id_doi_tuyen'  => 8,
                'id_game'       => 1, // League of Legends
                'trang_thai'    => 1,
                'so_tran_thua'  => 18,
                'so_tran_thang' => 6,
                'so_tran_hoa'   => 0,
                'so_giai_nhat'  => 0,
                'so_giai_nhi'   => 0,
                'so_giai_ba'    => 0,
                'so_giai_thuong' => 0,
            ],

            // --- Đội 9: Luxury Esports (LX) ---
            [
                'id_doi_tuyen'  => 9,
                'id_game'       => 1, // League of Legends
                'trang_thai'    => 1,
                'so_tran_thua'  => 15,
                'so_tran_thang' => 11,
                'so_tran_hoa'   => 0,
                'so_giai_nhat'  => 0,
                'so_giai_nhi'   => 0,
                'so_giai_ba'    => 1,
                'so_giai_thuong' => 1,
            ],

            // --- Đội 10: Team Secret (TS) ---
            [
                'id_doi_tuyen'  => 10,
                'id_game'       => 1, // League of Legends
                'trang_thai'    => 1,
                'so_tran_thua'  => 12,
                'so_tran_thang' => 22,
                'so_tran_hoa'   => 0,
                'so_giai_nhat'  => 1,
                'so_giai_nhi'   => 2,
                'so_giai_ba'    => 3,
                'so_giai_thuong' => 6,
            ],
            [
                'id_doi_tuyen'  => 10,
                'id_game'       => 2, // Dota 2
                'trang_thai'    => 1,
                'so_tran_thua'  => 8,
                'so_tran_thang' => 16,
                'so_tran_hoa'   => 0,
                'so_giai_nhat'  => 1,
                'so_giai_nhi'   => 1,
                'so_giai_ba'    => 1,
                'so_giai_thuong' => 3,
            ],
        ];

        foreach ($thongSos as $key => $ts) {
            if ($key % 3 == 0) {
                $ts['trang_thai'] = 0;
            }
            ThongSoDoiTuyen::create($ts);
        }
    }
}
