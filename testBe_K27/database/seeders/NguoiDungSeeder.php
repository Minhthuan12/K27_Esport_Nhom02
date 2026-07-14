<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NguoiDung;
use Illuminate\Support\Facades\Hash;

class NguoiDungSeeder extends Seeder
{
    public function run(): void
    {
        $nguoiDungs = [
            [
                'ho_va_ten'     => 'Nguyễn Văn An',
                'email'         => 'admin@esport.vn',
                'mat_khau'      => Hash::make('123456'),
                'so_dien_thoai' => '0901234567',
                'dia_chi'       => 'Hà Nội',
                'anh_dai_dien'  => null,
                'is_xac_thuc'   => true,
                'trang_thai'    => 1,
                'id_chuc_vu'    => 1, // Quản trị viên
            ],
            [
                'ho_va_ten'     => 'Trần Thị Bình',
                'email'         => 'quanly1@esport.vn',
                'mat_khau'      => Hash::make('123456'),
                'so_dien_thoai' => '0912345678',
                'dia_chi'       => 'TP. Hồ Chí Minh',
                'anh_dai_dien'  => null,
                'is_xac_thuc'   => true,
                'trang_thai'    => 1,
                'id_chuc_vu'    => 2, // Quản lý giải đấu
            ],
            [
                'ho_va_ten'     => 'Lê Văn Cường',
                'email'         => 'trongtai1@esport.vn',
                'mat_khau'      => Hash::make('123456'),
                'so_dien_thoai' => '0923456789',
                'dia_chi'       => 'Đà Nẵng',
                'anh_dai_dien'  => null,
                'is_xac_thuc'   => true,
                'trang_thai'    => 1,
                'id_chuc_vu'    => 3, // Trọng tài
            ],
            [
                'ho_va_ten'     => 'Phạm Thị Dung',
                'email'         => 'phonvien1@esport.vn',
                'mat_khau'      => Hash::make('123456'),
                'so_dien_thoai' => '0934567890',
                'dia_chi'       => 'Hải Phòng',
                'anh_dai_dien'  => null,
                'is_xac_thuc'   => true,
                'trang_thai'    => 1,
                'id_chuc_vu'    => 4, // Phóng viên
            ],
            [
                'ho_va_ten'     => 'Hoàng Văn Em',
                'email'         => 'hoangem@gmail.com',
                'mat_khau'      => Hash::make('123456'),
                'so_dien_thoai' => '0945678901',
                'dia_chi'       => 'Cần Thơ',
                'anh_dai_dien'  => null,
                'is_xac_thuc'   => true,
                'trang_thai'    => 1,
                'id_chuc_vu'    => 5, // Thành viên
            ],
            [
                'ho_va_ten'     => 'Đỗ Thị Phương',
                'email'         => 'quanly2@esport.vn',
                'mat_khau'      => Hash::make('123456'),
                'so_dien_thoai' => '0956789012',
                'dia_chi'       => 'Nha Trang',
                'anh_dai_dien'  => null,
                'is_xac_thuc'   => true,
                'trang_thai'    => 1,
                'id_chuc_vu'    => 2, // Quản lý giải đấu
            ],
            [
                'ho_va_ten'     => 'Vũ Minh Giang',
                'email'         => 'trongtai2@esport.vn',
                'mat_khau'      => Hash::make('123456'),
                'so_dien_thoai' => '0967890123',
                'dia_chi'       => 'Huế',
                'anh_dai_dien'  => null,
                'is_xac_thuc'   => true,
                'trang_thai'    => 1,
                'id_chuc_vu'    => 3, // Trọng tài
            ],
            [
                'ho_va_ten'     => 'Bùi Thị Hoa',
                'email'         => 'buihoa@gmail.com',
                'mat_khau'      => Hash::make('123456'),
                'so_dien_thoai' => '0978901234',
                'dia_chi'       => 'Vinh',
                'anh_dai_dien'  => null,
                'is_xac_thuc'   => false,
                'trang_thai'    => 1,
                'id_chuc_vu'    => 5, // Thành viên
            ],
            [
                'ho_va_ten'     => 'Nguyễn Quốc Bảo',
                'email'         => 'bao.nguyen@gmail.com',
                'mat_khau'      => Hash::make('123456'),
                'so_dien_thoai' => '0981000001',
                'dia_chi'       => 'Hà Nội',
                'anh_dai_dien'  => null,
                'is_xac_thuc'   => true,
                'trang_thai'    => 1,
                'id_chuc_vu'    => 5, // Thành viên
            ],
            [
                'ho_va_ten'     => 'Trần Minh Khôi',
                'email'         => 'khoi.tran@gmail.com',
                'mat_khau'      => Hash::make('123456'),
                'so_dien_thoai' => '0981000002',
                'dia_chi'       => 'Đà Nẵng',
                'anh_dai_dien'  => null,
                'is_xac_thuc'   => true,
                'trang_thai'    => 1,
                'id_chuc_vu'    => 5, // Thành viên
            ],
            [
                'ho_va_ten'     => 'Lê Gia Huy',
                'email'         => 'huy.le@gmail.com',
                'mat_khau'      => Hash::make('123456'),
                'so_dien_thoai' => '0981000003',
                'dia_chi'       => 'Huế',
                'anh_dai_dien'  => null,
                'is_xac_thuc'   => false,
                'trang_thai'    => 1,
                'id_chuc_vu'    => 5, // Thành viên
            ],
            [
                'ho_va_ten'     => 'Phạm Nhật Nam',
                'email'         => 'nam.pham@gmail.com',
                'mat_khau'      => Hash::make('123456'),
                'so_dien_thoai' => '0981000004',
                'dia_chi'       => 'TP. Hồ Chí Minh',
                'anh_dai_dien'  => null,
                'is_xac_thuc'   => true,
                'trang_thai'    => 1,
                'id_chuc_vu'    => 5, // Thành viên
            ],
            [
                'ho_va_ten'     => 'Hoàng Đức Anh',
                'email'         => 'ducanh@gmail.com',
                'mat_khau'      => Hash::make('123456'),
                'so_dien_thoai' => '0981000005',
                'dia_chi'       => 'Quảng Nam',
                'anh_dai_dien'  => null,
                'is_xac_thuc'   => true,
                'trang_thai'    => 1,
                'id_chuc_vu'    => 5, // Thành viên
            ],
            [
                'ho_va_ten'     => 'Võ Thanh Tùng',
                'email'         => 'tung.vo@gmail.com',
                'mat_khau'      => Hash::make('123456'),
                'so_dien_thoai' => '0981000006',
                'dia_chi'       => 'Bình Dương',
                'anh_dai_dien'  => null,
                'is_xac_thuc'   => true,
                'trang_thai'    => 0, // Tạm khóa
                'id_chuc_vu'    => 5, // Thành viên
            ],
            [
                'ho_va_ten'     => 'Đặng Minh Quân',
                'email'         => 'trongtai3@esport.vn',
                'mat_khau'      => Hash::make('123456'),
                'so_dien_thoai' => '0981000007',
                'dia_chi'       => 'Hải Phòng',
                'anh_dai_dien'  => null,
                'is_xac_thuc'   => true,
                'trang_thai'    => 1,
                'id_chuc_vu'    => 3, // Trọng tài
            ],
            [
                'ho_va_ten'     => 'Ngô Hải Long',
                'email'         => 'quanly3@esport.vn',
                'mat_khau'      => Hash::make('123456'),
                'so_dien_thoai' => '0981000008',
                'dia_chi'       => 'Hà Nội',
                'anh_dai_dien'  => null,
                'is_xac_thuc'   => true,
                'trang_thai'    => 1,
                'id_chuc_vu'    => 2, // Quản lý giải đấu
            ],
            [
                'ho_va_ten'     => 'Phan Quốc Việt',
                'email'         => 'quanly4@esport.vn',
                'mat_khau'      => Hash::make('123456'),
                'so_dien_thoai' => '0981000009',
                'dia_chi'       => 'Đà Nẵng',
                'anh_dai_dien'  => null,
                'is_xac_thuc'   => true,
                'trang_thai'    => 1,
                'id_chuc_vu'    => 2, // Quản lý giải đấu
            ],
            [
                'ho_va_ten'     => 'Lý Thanh Phúc',
                'email'         => 'phongvien2@esport.vn',
                'mat_khau'      => Hash::make('123456'),
                'so_dien_thoai' => '0981000010',
                'dia_chi'       => 'Cần Thơ',
                'anh_dai_dien'  => null,
                'is_xac_thuc'   => true,
                'trang_thai'    => 1,
                'id_chuc_vu'    => 4, // Phóng viên
            ],
            [
                'ho_va_ten'     => 'Mai Thị Lan',
                'email'         => 'mailan@gmail.com',
                'mat_khau'      => Hash::make('123456'),
                'so_dien_thoai' => '0981000011',
                'dia_chi'       => 'Huế',
                'anh_dai_dien'  => null,
                'is_xac_thuc'   => false,
                'trang_thai'    => 1,
                'id_chuc_vu'    => 5, // Thành viên
            ],
            [
                'ho_va_ten'     => 'Lâm Minh Đức',
                'email'         => 'duc.lam@gmail.com',
                'mat_khau'      => Hash::make('123456'),
                'so_dien_thoai' => '0981000012',
                'dia_chi'       => 'Quảng Bình',
                'anh_dai_dien'  => null,
                'is_xac_thuc'   => true,
                'trang_thai'    => 1,
                'id_chuc_vu'    => 5, // Thành viên
            ],
            [
                'ho_va_ten'     => 'Đinh Văn Sơn',
                'email'         => 'trongtai4@esport.vn',
                'mat_khau'      => Hash::make('123456'),
                'so_dien_thoai' => '0981000013',
                'dia_chi'       => 'Nam Định',
                'anh_dai_dien'  => null,
                'is_xac_thuc'   => true,
                'trang_thai'    => 1,
                'id_chuc_vu'    => 3, // Trọng tài
            ],
            [
                'ho_va_ten'     => 'Tạ Hoàng Minh',
                'email'         => 'phongvien3@esport.vn',
                'mat_khau'      => Hash::make('123456'),
                'so_dien_thoai' => '0981000014',
                'dia_chi'       => 'Nghệ An',
                'anh_dai_dien'  => null,
                'is_xac_thuc'   => true,
                'trang_thai'    => 1,
                'id_chuc_vu'    => 4, // Phóng viên
            ],
            [
                'ho_va_ten'     => 'Đỗ Khánh Linh',
                'email'         => 'linh.do@gmail.com',
                'mat_khau'      => Hash::make('123456'),
                'so_dien_thoai' => '0981000015',
                'dia_chi'       => 'Hà Tĩnh',
                'anh_dai_dien'  => null,
                'is_xac_thuc'   => true,
                'trang_thai'    => 1,
                'id_chuc_vu'    => 5, // Thành viên
            ],
            [
                'ho_va_ten'     => 'Vũ Thành Công',
                'email'         => 'cong.vu@gmail.com',
                'mat_khau'      => Hash::make('123456'),
                'so_dien_thoai' => '0981000016',
                'dia_chi'       => 'Thanh Hóa',
                'anh_dai_dien'  => null,
                'is_xac_thuc'   => true,
                'trang_thai'    => 1,
                'id_chuc_vu'    => 5, // Thành viên
            ],
            [
                'ho_va_ten'     => 'Nguyễn Hải Đăng',
                'email'         => 'quanly5@esport.vn',
                'mat_khau'      => Hash::make('123456'),
                'so_dien_thoai' => '0981000017',
                'dia_chi'       => 'Bắc Ninh',
                'anh_dai_dien'  => null,
                'is_xac_thuc'   => true,
                'trang_thai'    => 1,
                'id_chuc_vu'    => 2, // Quản lý giải đấu
            ],
            [
                'ho_va_ten'     => 'Trịnh Văn Phong',
                'email'         => 'phong@gmail.com',
                'mat_khau'      => Hash::make('123456'),
                'so_dien_thoai' => '0981000018',
                'dia_chi'       => 'Quảng Ngãi',
                'anh_dai_dien'  => null,
                'is_xac_thuc'   => false,
                'trang_thai'    => 0, // Tạm khóa
                'id_chuc_vu'    => 5, // Thành viên
            ],
            [
                'ho_va_ten'     => 'Lưu Quốc Khánh',
                'email'         => 'trongtai5@esport.vn',
                'mat_khau'      => Hash::make('123456'),
                'so_dien_thoai' => '0981000019',
                'dia_chi'       => 'Bình Định',
                'anh_dai_dien'  => null,
                'is_xac_thuc'   => true,
                'trang_thai'    => 1,
                'id_chuc_vu'    => 3, // Trọng tài
            ],
            [
                'ho_va_ten'     => 'Phạm Ngọc Hân',
                'email'         => 'han.pham@gmail.com',
                'mat_khau'      => Hash::make('123456'),
                'so_dien_thoai' => '0981000020',
                'dia_chi'       => 'Lâm Đồng',
                'anh_dai_dien'  => null,
                'is_xac_thuc'   => true,
                'trang_thai'    => 1,
                'id_chuc_vu'    => 5, // Thành viên
            ],
        ];

        foreach ($nguoiDungs as $key => $nd) {
            $nd['anh_dai_dien'] = 'https://i.pravatar.cc/150?u=' . urlencode($nd['email']);
            if ($key % 4 == 0) {
                $nd['trang_thai'] = 0;
            }
            NguoiDung::create($nd);
        }
    }
}
