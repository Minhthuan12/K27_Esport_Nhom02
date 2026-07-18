<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NguoiDung;
use Illuminate\Support\Facades\Hash;

class NguoiDungSeeder extends Seeder
{
    public function run(): void
    {
        $pwd = Hash::make('123456');

        $nguoiDungs = [
            ['ho_va_ten' => 'Nguyễn Văn An', 'email' => 'admin@esport.vn', 'mat_khau' => $pwd, 'so_dien_thoai' => '0901234567', 'dia_chi' => 'Hà Nội', 'anh_dai_dien' => 'https://i.pravatar.cc/150?u=admin@esport.vn', 'is_xac_thuc' => 1, 'trang_thai' => 1, 'id_chuc_vu' => 1, 'created_at' => '2020-01-05 08:30:00'],
            ['ho_va_ten' => 'Trần Thị Bình', 'email' => 'quanly1@esport.vn', 'mat_khau' => $pwd, 'so_dien_thoai' => '0912345678', 'dia_chi' => 'TP. Hồ Chí Minh', 'anh_dai_dien' => 'https://i.pravatar.cc/150?u=quanly1@esport.vn', 'is_xac_thuc' => 1, 'trang_thai' => 1, 'id_chuc_vu' => 2, 'created_at' => '2020-01-12 09:15:00'],
            ['ho_va_ten' => 'Lê Văn Cường', 'email' => 'trongtai1@esport.vn', 'mat_khau' => $pwd, 'so_dien_thoai' => '0923456789', 'dia_chi' => 'Đà Nẵng', 'anh_dai_dien' => 'https://i.pravatar.cc/150?u=trongtai1@esport.vn', 'is_xac_thuc' => 1, 'trang_thai' => 1, 'id_chuc_vu' => 3, 'created_at' => '2020-01-20 10:00:00'],
            
            ['ho_va_ten' => 'Phạm Thị Dung', 'email' => 'quanlydoi1@esport.vn', 'mat_khau' => $pwd, 'so_dien_thoai' => '0934567890', 'dia_chi' => 'Hà Nội', 'anh_dai_dien' => 'https://i.pravatar.cc/150?u=quanlydoi1@esport.vn', 'is_xac_thuc' => 1, 'trang_thai' => 1, 'id_chuc_vu' => 4, 'created_at' => '2020-05-10 14:20:00'],
            ['ho_va_ten' => 'Hoàng Văn Em', 'email' => 'hlv1@esport.vn', 'mat_khau' => $pwd, 'so_dien_thoai' => '0945678901', 'dia_chi' => 'Hải Phòng', 'anh_dai_dien' => 'https://i.pravatar.cc/150?u=hlv1@esport.vn', 'is_xac_thuc' => 1, 'trang_thai' => 1, 'id_chuc_vu' => 5, 'created_at' => '2020-05-15 11:45:00'],
            ['ho_va_ten' => 'Huỳnh Tấn Phúc', 'email' => 'caster1@esport.vn', 'mat_khau' => $pwd, 'so_dien_thoai' => '0956789012', 'dia_chi' => 'Cần Thơ', 'anh_dai_dien' => 'https://i.pravatar.cc/150?u=caster1@esport.vn', 'is_xac_thuc' => 1, 'trang_thai' => 1, 'id_chuc_vu' => 6, 'created_at' => '2020-05-22 16:10:00'],
            ['ho_va_ten' => 'Vũ Minh Giang', 'email' => 'kythuat1@esport.vn', 'mat_khau' => $pwd, 'so_dien_thoai' => '0967890123', 'dia_chi' => 'Nha Trang', 'anh_dai_dien' => 'https://i.pravatar.cc/150?u=kythuat1@esport.vn', 'is_xac_thuc' => 1, 'trang_thai' => 1, 'id_chuc_vu' => 7, 'created_at' => '2020-05-28 09:30:00'],
            ['ho_va_ten' => 'Đặng Quốc Hùng', 'email' => 'khanGia1@esport.vn', 'mat_khau' => $pwd, 'so_dien_thoai' => '0978901234', 'dia_chi' => 'Bình Dương', 'anh_dai_dien' => 'https://i.pravatar.cc/150?u=khanGia1@esport.vn', 'is_xac_thuc' => 1, 'trang_thai' => 1, 'id_chuc_vu' => 8, 'created_at' => '2020-05-30 15:00:00'],

            ['ho_va_ten' => 'Bùi Huy Khang', 'email' => 'khang.gam@gmail.com', 'mat_khau' => $pwd, 'so_dien_thoai' => '0989012345', 'dia_chi' => 'TP. Hồ Chí Minh', 'anh_dai_dien' => 'https://i.pravatar.cc/150?u=khang.gam@gmail.com', 'is_xac_thuc' => 1, 'trang_thai' => 1, 'id_chuc_vu' => 4, 'created_at' => '2021-03-05 10:15:00'],
            ['ho_va_ten' => 'Đỗ Thành Lâm', 'email' => 'lam.ces@gmail.com', 'mat_khau' => $pwd, 'so_dien_thoai' => '0990123456', 'dia_chi' => 'Hà Nội', 'anh_dai_dien' => 'https://i.pravatar.cc/150?u=lam.ces@gmail.com', 'is_xac_thuc' => 1, 'trang_thai' => 1, 'id_chuc_vu' => 4, 'created_at' => '2021-03-12 14:00:00'],
            ['ho_va_ten' => 'Hồ Hoàng Nam', 'email' => 'nam.sgb@gmail.com', 'mat_khau' => $pwd, 'so_dien_thoai' => '0901122334', 'dia_chi' => 'Đà Nẵng', 'anh_dai_dien' => 'https://i.pravatar.cc/150?u=nam.sgb@gmail.com', 'is_xac_thuc' => 1, 'trang_thai' => 1, 'id_chuc_vu' => 4, 'created_at' => '2021-08-15 11:30:00'],
            ['ho_va_ten' => 'Dương Kiều Oanh', 'email' => 'oanh.vke@gmail.com', 'mat_khau' => $pwd, 'so_dien_thoai' => '0912233445', 'dia_chi' => 'Hải Phòng', 'anh_dai_dien' => 'https://i.pravatar.cc/150?u=oanh.vke@gmail.com', 'is_xac_thuc' => 1, 'trang_thai' => 1, 'id_chuc_vu' => 4, 'created_at' => '2021-08-20 16:45:00'],
            ['ho_va_ten' => 'Lý Minh Phương', 'email' => 'phuong.mbe@gmail.com', 'mat_khau' => $pwd, 'so_dien_thoai' => '0923344556', 'dia_chi' => 'Cần Thơ', 'anh_dai_dien' => 'https://i.pravatar.cc/150?u=phuong.mbe@gmail.com', 'is_xac_thuc' => 1, 'trang_thai' => 1, 'id_chuc_vu' => 5, 'created_at' => '2021-08-25 09:00:00'],
            ['ho_va_ten' => 'Nguyễn Anh Quân', 'email' => 'quan.tw@gmail.com', 'mat_khau' => $pwd, 'so_dien_thoai' => '0934455667', 'dia_chi' => 'Bình Dương', 'anh_dai_dien' => 'https://i.pravatar.cc/150?u=quan.tw@gmail.com', 'is_xac_thuc' => 1, 'trang_thai' => 1, 'id_chuc_vu' => 5, 'created_at' => '2021-11-10 13:20:00'],
            ['ho_va_ten' => 'Trần Thái Sơn', 'email' => 'son.fl@gmail.com', 'mat_khau' => $pwd, 'so_dien_thoai' => '0945566778', 'dia_chi' => 'Đồng Nai', 'anh_dai_dien' => 'https://i.pravatar.cc/150?u=son.fl@gmail.com', 'is_xac_thuc' => 1, 'trang_thai' => 1, 'id_chuc_vu' => 5, 'created_at' => '2021-11-15 10:45:00'],
            ['ho_va_ten' => 'Lê Hoàng Tú', 'email' => 'tu.rw@gmail.com', 'mat_khau' => $pwd, 'so_dien_thoai' => '0956677889', 'dia_chi' => 'Quảng Ninh', 'anh_dai_dien' => 'https://i.pravatar.cc/150?u=tu.rw@gmail.com', 'is_xac_thuc' => 1, 'trang_thai' => 1, 'id_chuc_vu' => 5, 'created_at' => '2021-11-20 15:10:00'],

            ['ho_va_ten' => 'Phạm Bảo Uyên', 'email' => 'uyen.lx@gmail.com', 'mat_khau' => $pwd, 'so_dien_thoai' => '0967788990', 'dia_chi' => 'Huế', 'anh_dai_dien' => 'https://i.pravatar.cc/150?u=uyen.lx@gmail.com', 'is_xac_thuc' => 1, 'trang_thai' => 1, 'id_chuc_vu' => 8, 'created_at' => '2022-04-05 08:30:00'],
            ['ho_va_ten' => 'Hoàng Đức Vinh', 'email' => 'vinh.ts@gmail.com', 'mat_khau' => $pwd, 'so_dien_thoai' => '0978899001', 'dia_chi' => 'Nha Trang', 'anh_dai_dien' => 'https://i.pravatar.cc/150?u=vinh.ts@gmail.com', 'is_xac_thuc' => 1, 'trang_thai' => 1, 'id_chuc_vu' => 8, 'created_at' => '2022-04-12 14:15:00'],
            ['ho_va_ten' => 'Huỳnh Như Yến', 'email' => 'yen.t1@gmail.com', 'mat_khau' => $pwd, 'so_dien_thoai' => '0989900112', 'dia_chi' => 'Hà Nội', 'anh_dai_dien' => 'https://i.pravatar.cc/150?u=yen.t1@gmail.com', 'is_xac_thuc' => 1, 'trang_thai' => 1, 'id_chuc_vu' => 8, 'created_at' => '2022-04-18 11:00:00'],
            ['ho_va_ten' => 'Vũ Minh Tâm', 'email' => 'tam.geng@gmail.com', 'mat_khau' => $pwd, 'so_dien_thoai' => '0990011223', 'dia_chi' => 'TP. Hồ Chí Minh', 'anh_dai_dien' => 'https://i.pravatar.cc/150?u=tam.geng@gmail.com', 'is_xac_thuc' => 1, 'trang_thai' => 1, 'id_chuc_vu' => 8, 'created_at' => '2022-04-25 16:30:00'],
            ['ho_va_ten' => 'Đặng Thanh Hải', 'email' => 'hai.prx@gmail.com', 'mat_khau' => $pwd, 'so_dien_thoai' => '0901133557', 'dia_chi' => 'Đà Nẵng', 'anh_dai_dien' => 'https://i.pravatar.cc/150?u=hai.prx@gmail.com', 'is_xac_thuc' => 1, 'trang_thai' => 1, 'id_chuc_vu' => 8, 'created_at' => '2022-10-10 09:45:00'],
            ['ho_va_ten' => 'Bùi Quang Huy', 'email' => 'huy.fnc@gmail.com', 'mat_khau' => $pwd, 'so_dien_thoai' => '0912244668', 'dia_chi' => 'Cần Thơ', 'anh_dai_dien' => 'https://i.pravatar.cc/150?u=huy.fnc@gmail.com', 'is_xac_thuc' => 1, 'trang_thai' => 1, 'id_chuc_vu' => 8, 'created_at' => '2022-10-15 13:20:00'],

            ['ho_va_ten' => 'Đỗ Tiến Đạt', 'email' => 'dat.g2@gmail.com', 'mat_khau' => $pwd, 'so_dien_thoai' => '0923355779', 'dia_chi' => 'Hải Phòng', 'anh_dai_dien' => 'https://i.pravatar.cc/150?u=dat.g2@gmail.com', 'is_xac_thuc' => 1, 'trang_thai' => 1, 'id_chuc_vu' => 8, 'created_at' => '2023-05-10 15:40:00'],
            ['ho_va_ten' => 'Nguyễn Minh Nhật', 'email' => 'nhat.sen@gmail.com', 'mat_khau' => $pwd, 'so_dien_thoai' => '0934466880', 'dia_chi' => 'Bình Dương', 'anh_dai_dien' => 'https://i.pravatar.cc/150?u=nhat.sen@gmail.com', 'is_xac_thuc' => 1, 'trang_thai' => 1, 'id_chuc_vu' => 8, 'created_at' => '2023-05-15 10:00:00'],
            ['ho_va_ten' => 'Trần Đăng Khoa', 'email' => 'khoa.tl@gmail.com', 'mat_khau' => $pwd, 'so_dien_thoai' => '0945577991', 'dia_chi' => 'Đồng Nai', 'anh_dai_dien' => 'https://i.pravatar.cc/150?u=khoa.tl@gmail.com', 'is_xac_thuc' => 1, 'trang_thai' => 1, 'id_chuc_vu' => 8, 'created_at' => '2023-05-20 14:15:00'],
            ['ho_va_ten' => 'Lê Gia Bình', 'email' => 'binh.navi@gmail.com', 'mat_khau' => $pwd, 'so_dien_thoai' => '0956688002', 'dia_chi' => 'Quảng Ninh', 'anh_dai_dien' => 'https://i.pravatar.cc/150?u=binh.navi@gmail.com', 'is_xac_thuc' => 1, 'trang_thai' => 1, 'id_chuc_vu' => 8, 'created_at' => '2023-05-25 11:30:00'],

            ['ho_va_ten' => 'Phạm Văn Hùng', 'email' => 'hung.c9@gmail.com', 'mat_khau' => $pwd, 'so_dien_thoai' => '0967799113', 'dia_chi' => 'Hà Nội', 'anh_dai_dien' => 'https://i.pravatar.cc/150?u=hung.c9@gmail.com', 'is_xac_thuc' => 1, 'trang_thai' => 1, 'id_chuc_vu' => 8, 'created_at' => '2024-09-05 09:15:00'],
            ['ho_va_ten' => 'Hoàng Thị Dung', 'email' => 'dung.edg@gmail.com', 'mat_khau' => $pwd, 'so_dien_thoai' => '0978800224', 'dia_chi' => 'TP. Hồ Chí Minh', 'anh_dai_dien' => 'https://i.pravatar.cc/150?u=dung.edg@gmail.com', 'is_xac_thuc' => 1, 'trang_thai' => 1, 'id_chuc_vu' => 8, 'created_at' => '2024-09-12 16:00:00'],
            ['ho_va_ten' => 'Huỳnh Quốc Bảo', 'email' => 'bao.drx@gmail.com', 'mat_khau' => $pwd, 'so_dien_thoai' => '0989911335', 'dia_chi' => 'Đà Nẵng', 'anh_dai_dien' => 'https://i.pravatar.cc/150?u=bao.drx@gmail.com', 'is_xac_thuc' => 1, 'trang_thai' => 1, 'id_chuc_vu' => 8, 'created_at' => '2025-03-10 10:30:00'],
            ['ho_va_ten' => 'Vũ Thị Mai', 'email' => 'mai.fur@gmail.com', 'mat_khau' => $pwd, 'so_dien_thoai' => '0990022446', 'dia_chi' => 'Cần Thơ', 'anh_dai_dien' => 'https://i.pravatar.cc/150?u=mai.fur@gmail.com', 'is_xac_thuc' => 0, 'trang_thai' => 0, 'id_chuc_vu' => 8, 'created_at' => '2025-03-15 15:20:00'],
            ['ho_va_ten' => 'Đặng Văn Tuấn', 'email' => 'tuan.vp@gmail.com', 'mat_khau' => $pwd, 'so_dien_thoai' => '0901144770', 'dia_chi' => 'Nha Trang', 'anh_dai_dien' => 'https://i.pravatar.cc/150?u=tuan.vp@gmail.com', 'is_xac_thuc' => 1, 'trang_thai' => 1, 'id_chuc_vu' => 8, 'created_at' => '2026-01-10 11:10:00'],
        ];

        foreach ($nguoiDungs as $user) {
            NguoiDung::create($user);
        }
    }
}
