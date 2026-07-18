<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ChucNang;

class ChucNangSeeder extends Seeder
{
    public function run(): void
    {
        $chucNangs = [
            [
                'ten_chuc_nang' => 'Quản lý thể loại',
                'mo_ta'         => 'Xem, thêm, sửa, xóa các thể loại game.',
                'trang_thai'    => 1,
                'created_at' => '2020-01-02 08:00:00',
            ],
            [
                'ten_chuc_nang' => 'Quản lý game',
                'mo_ta'         => 'Xem, thêm, sửa, xóa thông tin trò chơi.',
                'trang_thai'    => 1,
                'created_at' => '2020-01-10 09:15:00',
            ],
            [
                'ten_chuc_nang' => 'Quản lý giải đấu',
                'mo_ta'         => 'Xem, thêm, sửa, xóa các giải đấu Esport.',
                'trang_thai'    => 1,
                'created_at' => '2020-01-20 10:30:00',
            ],
            [
                'ten_chuc_nang' => 'Quản lý đội tuyển',
                'mo_ta'         => 'Xem, thêm, sửa, xóa các đội tuyển thi đấu.',
                'trang_thai'    => 1,
                'created_at' => '2020-02-05 14:00:00',
            ],
            [
                'ten_chuc_nang' => 'Quản lý tuyển thủ',
                'mo_ta'         => 'Xem, thêm, sửa, xóa thông tin tuyển thủ.',
                'trang_thai'    => 1,
                'created_at' => '2020-02-18 15:20:00',
            ],
            [
                'ten_chuc_nang' => 'Quản lý vòng đấu',
                'mo_ta'         => 'Xem, thêm, sửa, xóa các vòng đấu giải.',
                'trang_thai'    => 1,
                'created_at' => '2020-03-01 11:00:00',
            ],
            [
                'ten_chuc_nang' => 'Quản lý trận đấu',
                'mo_ta'         => 'Xem, thêm, sửa, xóa các trận đấu đối kháng.',
                'trang_thai'    => 1,
                'created_at' => '2020-03-15 16:45:00',
            ],
            [
                'ten_chuc_nang' => 'Quản lý kết quả giải đấu',
                'mo_ta'         => 'Xem, cập nhật thứ hạng và điểm số chung cuộc.',
                'trang_thai'    => 1,
                'created_at' => '2020-04-02 09:30:00',
            ],
            [
                'ten_chuc_nang' => 'Quản lý nhà tài trợ',
                'mo_ta'         => 'Xem, thêm, sửa, xóa đối tác tài trợ.',
                'trang_thai'    => 1,
                'created_at' => '2021-01-12 13:15:00',
            ],
            [
                'ten_chuc_nang' => 'Quản lý tài trợ giải đấu',
                'mo_ta'         => 'Xem, thêm, sửa, xóa ngân sách tài trợ giải.',
                'trang_thai'    => 1,
                'created_at' => '2021-02-20 10:00:00',
            ],
            [
                'ten_chuc_nang' => 'Quản lý tin tức',
                'mo_ta'         => 'Xem, đăng bài, cập nhật tin tức thể thao điện tử.',
                'trang_thai'    => 1,
                'created_at' => '2021-05-14 14:30:00',
            ],
            [
                'ten_chuc_nang' => 'Quản lý người dùng',
                'mo_ta'         => 'Xem, quản lý tài khoản người dùng hệ thống.',
                'trang_thai'    => 1,
                'created_at' => '2022-01-08 08:45:00',
            ],
            [
                'ten_chuc_nang' => 'Quản lý giải thưởng',
                'mo_ta'         => 'Xem, thêm, sửa, xóa các cơ cấu giải thưởng.',
                'trang_thai'    => 1,
                'created_at' => '2022-04-16 15:00:00',
            ],
            [
                'ten_chuc_nang' => 'Thống kê & Báo cáo',
                'mo_ta'         => 'Xem tổng quan và xuất báo cáo biểu đồ thống kê.',
                'trang_thai'    => 0,
                'created_at' => '2023-01-10 11:15:00',
            ],
        ];

        foreach ($chucNangs as $cn) {
            ChucNang::create($cn);
        }
    }
}
