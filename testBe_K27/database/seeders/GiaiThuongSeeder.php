<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GiaiThuong;

class GiaiThuongSeeder extends Seeder
{
    public function run(): void
    {
        $giaiThuongs = [
            // --- GIẢI THƯỞNG TẬP THỂ (ĐỘI TUYỂN) ---
            [
                'ten_giai_thuong' => 'Quán quân',
                'gia_tri'         => 50000000,
                'is_ca_nhan'      => false,
                'trang_thai'      => 1,
            ],
            [
                'ten_giai_thuong' => 'Á quân',
                'gia_tri'         => 25000000,
                'is_ca_nhan'      => false,
                'trang_thai'      => 1,
            ],
            [
                'ten_giai_thuong' => 'Hạng ba',
                'gia_tri'         => 15000000,
                'is_ca_nhan'      => false,
                'trang_thai'      => 1,
            ],
            [
                'ten_giai_thuong' => 'Hạng tư',
                'gia_tri'         => 8000000,
                'is_ca_nhan'      => false,
                'trang_thai'      => 1,
            ],
            [
                'ten_giai_thuong' => 'Giải phong cách (Fair Play)',
                'gia_tri'         => 5000000,
                'is_ca_nhan'      => false,
                'trang_thai'      => 1,
            ],
            [
                'ten_giai_thuong' => 'Đội tuyển đột phá',
                'gia_tri'         => 5000000,
                'is_ca_nhan'      => false,
                'trang_thai'      => 1,
            ],

            // --- GIẢI THƯỞNG CÁ NHÂN ---
            [
                'ten_giai_thuong' => 'MVP giải đấu',
                'gia_tri'         => 5000000,
                'is_ca_nhan'      => true,
                'trang_thai'      => 1,
            ],
            [
                'ten_giai_thuong' => 'Đường trên xuất sắc nhất',
                'gia_tri'         => 3000000,
                'is_ca_nhan'      => true,
                'trang_thai'      => 1,
            ],
            [
                'ten_giai_thuong' => 'Thần rừng xuất sắc nhất',
                'gia_tri'         => 3000000,
                'is_ca_nhan'      => true,
                'trang_thai'      => 1,
            ],
            [
                'ten_giai_thuong' => 'Đường giữa xuất sắc nhất',
                'gia_tri'         => 3000000,
                'is_ca_nhan'      => true,
                'trang_thai'      => 1,
            ],
            [
                'ten_giai_thuong' => 'Xạ thủ xuất sắc nhất',
                'gia_tri'         => 3000000,
                'is_ca_nhan'      => true,
                'trang_thai'      => 1,
            ],
            [
                'ten_giai_thuong' => 'Hỗ trợ xuất sắc nhất',
                'gia_tri'         => 3000000,
                'is_ca_nhan'      => true,
                'trang_thai'      => 1,
            ],
            [
                'ten_giai_thuong' => 'Tân binh xuất sắc nhất',
                'gia_tri'         => 3000000,
                'is_ca_nhan'      => true,
                'trang_thai'      => 1,
            ],
            [
                'ten_giai_thuong' => 'Huấn luyện viên xuất sắc nhất',
                'gia_tri'         => 4000000,
                'is_ca_nhan'      => true,
                'trang_thai'      => 1,
            ],
        ];

        foreach ($giaiThuongs as $key => $gt) {
            if ($key % 4 == 0) {
                $gt['trang_thai'] = 0;
            }
            GiaiThuong::create($gt);
        }
    }
}
