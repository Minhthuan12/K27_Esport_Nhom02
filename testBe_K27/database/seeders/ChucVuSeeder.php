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
                'ten_chuc_vu' => 'Quản trị viên hệ thống',
                'mo_ta'       => 'Quản lý toàn bộ dữ liệu, phân quyền và vận hành hệ thống.',
                'trang_thai'  => 1,
                'created_at' => '2020-01-02 08:00:00',
            ],
            [
                'ten_chuc_vu' => 'Quản lý giải đấu',
                'mo_ta'       => 'Phụ trách lập kế hoạch, điều hành và duyệt giải đấu.',
                'trang_thai'  => 1,
                'created_at' => '2020-01-15 09:30:00',
            ],
            [
                'ten_chuc_vu' => 'Ban tổ chức & Trọng tài',
                'mo_ta'       => 'Giám sát tính minh bạch, thi đấu và kết quả các trận đấu.',
                'trang_thai'  => 1,
                'created_at' => '2020-02-01 10:15:00',
            ],
            [
                'ten_chuc_vu' => 'Quản lý đội tuyển',
                'mo_ta'       => 'Quản lý thông tin đội tuyển, đăng ký danh sách tuyển thủ.',
                'trang_thai'  => 1,
                'created_at' => '2020-02-20 14:00:00',
            ],
            [
                'ten_chuc_vu' => 'Huấn luyện viên',
                'mo_ta'       => 'Phụ trách chiến thuật và huấn luyện tuyển thủ thi đấu.',
                'trang_thai'  => 1,
                'created_at' => '2021-03-05 11:20:00',
            ],
            [
                'ten_chuc_vu' => 'Biên tập viên & Caster',
                'mo_ta'       => 'Sáng tạo nội dung tin tức, bình luận trực tiếp các giải đấu.',
                'trang_thai'  => 1,
                'created_at' => '2021-06-12 15:45:00',
            ],
            [
                'ten_chuc_vu' => 'Chuyên viên kỹ thuật',
                'mo_ta'       => 'Đảm bảo hạ tầng mạng và hệ thống thi đấu vận hành ổn định.',
                'trang_thai'  => 1,
                'created_at' => '2022-01-18 13:10:00',
            ],
            [
                'ten_chuc_vu' => 'Khán giả / Thành viên',
                'mo_ta'       => 'Người dùng theo dõi thông tin, tin tức và bảng xếp hạng.',
                'trang_thai'  => 0,
                'created_at' => '2023-04-10 16:30:00',
            ],
        ];

        foreach ($chucVus as $cv) {
            ChucVu::create($cv);
        }
    }
}
