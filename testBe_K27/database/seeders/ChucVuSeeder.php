<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ChucVu;

class ChucVuSeeder extends Seeder
{
    public function run(): void
    {
        $chucVus = [
            [
                'ten_chuc_vu' => 'Quản trị viên',
                'mo_ta'       => 'Quản lý toàn bộ hệ thống.',
                'trang_thai'  => 1,
            ],
            [
                'ten_chuc_vu' => 'Quản lý giải đấu',
                'mo_ta'       => 'Phụ trách tổ chức và điều hành các giải đấu.',
                'trang_thai'  => 1,
            ],
            [
                'ten_chuc_vu' => 'Trọng tài',
                'mo_ta'       => 'Giám sát và phán quyết các trận đấu.',
                'trang_thai'  => 1,
            ],
            [
                'ten_chuc_vu' => 'Phóng viên',
                'mo_ta'       => 'Viết tin tức và bình luận về các giải đấu.',
                'trang_thai'  => 0,
            ],
            [
                'ten_chuc_vu' => 'Thành viên',
                'mo_ta'       => 'Người dùng thông thường của hệ thống.',
                'trang_thai'  => 1,
            ],
        ];

        foreach ($chucVus as $cv) {
            ChucVu::create($cv);
        }
    }
}
