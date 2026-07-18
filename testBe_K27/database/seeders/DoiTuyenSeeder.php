<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DoiTuyen;
use App\Models\NguoiDung;

class DoiTuyenSeeder extends Seeder
{
    public function run(): void
    {
        $users   = NguoiDung::where('id_chuc_vu', 4)->orWhere('id_chuc_vu', 1)->get();
        $userIds = $users->pluck('id')->toArray();
        if (empty($userIds)) {
            $userIds = [1, 2, 3, 4];
        }

        $doiTuyens = [
            ['ten_doi_tuyen' => 'GAM Esports', 'ten_viet_tat' => 'GAM', 'mo_ta' => 'Đội tuyển Esport giàu thành tích bậc nhất lịch sử Liên Minh Huyền Thoại Việt Nam.', 'trang_thai' => 1, 'created_at' => '2020-01-10 08:00:00'],
            ['ten_doi_tuyen' => 'Cerberus Esports', 'ten_viet_tat' => 'CES', 'mo_ta' => 'Đội tuyển chuyên nghiệp nổi tiếng với lối chơi tấn công mạnh mẽ.', 'trang_thai' => 1, 'created_at' => '2020-01-15 09:30:00'],
            ['ten_doi_tuyen' => 'Saigon Buffalo', 'ten_viet_tat' => 'SGB', 'mo_ta' => 'Đội tuyển "Bầy Trâu" từng nhiều lần đại diện Việt Nam thi đấu quốc tế.', 'trang_thai' => 1, 'created_at' => '2020-02-01 10:15:00'],
            ['ten_doi_tuyen' => 'Vikings Esports', 'ten_viet_tat' => 'VKE', 'mo_ta' => 'Đội tuyển của Vikings với sự dẫn dắt từ các huyền thoại kỳ cựu.', 'trang_thai' => 1, 'created_at' => '2020-02-20 14:00:00'],
            ['ten_doi_tuyen' => 'MGN Blue Esports', 'ten_viet_tat' => 'MBE', 'mo_ta' => 'Đội tuyển trẻ có phong cách thi đấu đầy khát khao và đột phá.', 'trang_thai' => 1, 'created_at' => '2020-03-05 11:20:00'],
            ['ten_doi_tuyen' => 'Team Whales', 'ten_viet_tat' => 'TW', 'mo_ta' => 'Đội tuyển "Bầy Cá Voi" thế lực mới mạnh mẽ tại VCS.', 'trang_thai' => 1, 'created_at' => '2021-01-12 15:45:00'],
            ['ten_doi_tuyen' => 'Team Flash', 'ten_viet_tat' => 'FL', 'mo_ta' => 'Tổ chức Esports danh tiếng Đông Nam Á có chi nhánh tại Việt Nam.', 'trang_thai' => 1, 'created_at' => '2021-02-18 13:10:00'],
            ['ten_doi_tuyen' => 'Rainbow Warriors', 'ten_viet_tat' => 'RW', 'mo_ta' => 'Đội tuyển mới nổi với lối chơi đoàn kết, cống hiến.', 'trang_thai' => 1, 'created_at' => '2021-04-10 09:00:00'],
            ['ten_doi_tuyen' => 'Luxury Esports', 'ten_viet_tat' => 'LX', 'mo_ta' => 'Đội tuyển có tinh thần chiến đấu quả cảm, kiên cường.', 'trang_thai' => 1, 'created_at' => '2021-06-22 16:30:00'],
            ['ten_doi_tuyen' => 'Team Secret', 'ten_viet_tat' => 'TS', 'mo_ta' => 'Ẩn Mật Giáo - đội tuyển có lượng fan đông đảo cùng lối chơi cống hiến.', 'trang_thai' => 1, 'created_at' => '2021-08-15 10:20:00'],
            ['ten_doi_tuyen' => 'T1 Esports', 'ten_viet_tat' => 'T1', 'mo_ta' => 'Đội tuyển huyền thoại giàu truyền thống nhất thế giới.', 'trang_thai' => 1, 'created_at' => '2022-01-05 08:00:00'],
            ['ten_doi_tuyen' => 'Gen.G Esports', 'ten_viet_tat' => 'GEN', 'mo_ta' => 'Đội tuyển Esports hàng đầu khu vực LCK.', 'trang_thai' => 1, 'created_at' => '2022-02-10 14:15:00'],
            ['ten_doi_tuyen' => 'Paper Rex', 'ten_viet_tat' => 'PRX', 'mo_ta' => 'Đội tuyển Valorant với phong cách thi đấu hoa mỹ số 1 Châu Á.', 'trang_thai' => 1, 'created_at' => '2022-04-12 11:30:00'],
            ['ten_doi_tuyen' => 'Fnatic', 'ten_viet_tat' => 'FNC', 'mo_ta' => 'Tổ chức Esports hàng đầu Châu Âu.', 'trang_thai' => 1, 'created_at' => '2022-06-18 09:45:00'],
            ['ten_doi_tuyen' => 'G2 Esports', 'ten_viet_tat' => 'G2', 'mo_ta' => 'Đội tuyển nổi tiếng với lối thi đấu biến hóa ngẫu hứng.', 'trang_thai' => 1, 'created_at' => '2022-09-20 15:10:00'],
            ['ten_doi_tuyen' => 'Sentinels', 'ten_viet_tat' => 'SEN', 'mo_ta' => 'Đội tuyển Valorant đình đám khu vực Bắc Mỹ.', 'trang_thai' => 1, 'created_at' => '2023-01-15 10:00:00'],
            ['ten_doi_tuyen' => 'Team Liquid', 'ten_viet_tat' => 'TL', 'mo_ta' => 'Tổ chức Esports toàn cầu giàu thành tích.', 'trang_thai' => 1, 'created_at' => '2023-03-22 13:40:00'],
            ['ten_doi_tuyen' => 'Natus Vincere', 'ten_viet_tat' => 'NAVI', 'mo_ta' => 'Đội tuyển CS2 & Dota 2 huyền thoại Đông Âu.', 'trang_thai' => 1, 'created_at' => '2023-05-18 16:00:00'],
            ['ten_doi_tuyen' => 'Cloud9', 'ten_viet_tat' => 'C9', 'mo_ta' => 'Đội tuyển thể thao điện tử lâu đời khu vực Bắc Mỹ.', 'trang_thai' => 1, 'created_at' => '2023-08-10 11:15:00'],
            ['ten_doi_tuyen' => 'EDward Gaming', 'ten_viet_tat' => 'EDG', 'mo_ta' => 'Đội tuyển Esport hàng đầu khu vực LPL Trung Quốc.', 'trang_thai' => 1, 'created_at' => '2024-01-12 09:30:00'],
            ['ten_doi_tuyen' => 'DRX Esports', 'ten_viet_tat' => 'DRX', 'mo_ta' => 'Đội tuyển nổi tiếng với câu chuyện thần thoại Vô địch Thế giới.', 'trang_thai' => 1, 'created_at' => '2024-04-05 14:20:00'],
            ['ten_doi_tuyen' => 'Furia Esports', 'ten_viet_tat' => 'FUR', 'mo_ta' => 'Đội tuyển CS2 vũ bão khu vực Nam Mỹ.', 'trang_thai' => 1, 'created_at' => '2024-07-15 10:00:00'],
            ['ten_doi_tuyen' => 'Virtus.pro', 'ten_viet_tat' => 'VP', 'mo_ta' => 'Đội tuyển kỳ cựu các tựa game bắn súng chiến thuật.', 'trang_thai' => 0, 'created_at' => '2025-01-10 15:30:00'],
            ['ten_doi_tuyen' => 'LGD Gaming', 'ten_viet_tat' => 'LGD', 'mo_ta' => 'Đội tuyển Dota 2 hàng đầu Châu Á.', 'trang_thai' => 0, 'created_at' => '2025-05-20 11:45:00'],
            ['ten_doi_tuyen' => 'Astralis', 'ten_viet_tat' => 'AST', 'mo_ta' => 'Huyền thoại CS:GO/CS2 Đan Mạch.', 'trang_thai' => 0, 'created_at' => '2025-09-12 08:15:00'],
        ];

        foreach ($doiTuyens as $key => $dt) {
            $dt['id_nguoi_dung'] = $userIds[$key % count($userIds)];
            $dt['logo']          = 'https://api.dicebear.com/7.x/initials/svg?seed=' . urlencode($dt['ten_doi_tuyen']);
            DoiTuyen::create($dt);
        }
    }
}
