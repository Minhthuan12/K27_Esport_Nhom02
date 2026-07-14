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
                'mo_ta'         => 'Xem, thêm, sửa, xóa thể loại game.',
                'trang_thai'    => 1,
            ],
            [
                'ten_chuc_nang' => 'Quản lý game',
                'mo_ta'         => 'Xem, thêm, sửa, xóa thông tin game.',
                'trang_thai'    => 1,
            ],
            [
                'ten_chuc_nang' => 'Quản lý giải đấu',
                'mo_ta'         => 'Xem, thêm, sửa, xóa giải đấu.',
                'trang_thai'    => 1,
            ],
            [
                'ten_chuc_nang' => 'Quản lý đội tuyển',
                'mo_ta'         => 'Xem, thêm, sửa, xóa đội tuyển.',
                'trang_thai'    => 1,
            ],
            [
                'ten_chuc_nang' => 'Quản lý tuyển thủ',
                'mo_ta'         => 'Xem, thêm, sửa, xóa tuyển thủ.',
                'trang_thai'    => 1,
            ],
            [
                'ten_chuc_nang' => 'Quản lý vòng đấu',
                'mo_ta'         => 'Xem, thêm, sửa, xóa vòng đấu.',
                'trang_thai'    => 1,
            ],
            [
                'ten_chuc_nang' => 'Quản lý trận đấu',
                'mo_ta'         => 'Xem, thêm, sửa, xóa trận đấu đội.',
                'trang_thai'    => 1,
            ],
            [
                'ten_chuc_nang' => 'Quản lý kết quả giải đấu',
                'mo_ta'         => 'Xem, thêm, sửa, xóa kết quả giải đấu.',
                'trang_thai'    => 1,
            ],
            [
                'ten_chuc_nang' => 'Quản lý nhà tài trợ',
                'mo_ta'         => 'Xem, thêm, sửa, xóa nhà tài trợ.',
                'trang_thai'    => 1,
            ],
            [
                'ten_chuc_nang' => 'Quản lý tin tức',
                'mo_ta'         => 'Xem, thêm, sửa, xóa tin tức.',
                'trang_thai'    => 1,
            ],
            [
                'ten_chuc_nang' => 'Quản lý người dùng',
                'mo_ta'         => 'Xem, thêm, sửa, xóa người dùng hệ thống.',
                'trang_thai'    => 1,
            ],
            [
                'ten_chuc_nang' => 'Quản lý giải thưởng',
                'mo_ta'         => 'Xem, thêm, sửa, xóa giải thưởng.',
                'trang_thai'    => 0,
            ],
        ];

        foreach ($chucNangs as $cn) {
            ChucNang::create($cn);
        }
    }
}
