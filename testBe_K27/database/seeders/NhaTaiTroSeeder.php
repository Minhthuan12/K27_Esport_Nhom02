<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NhaTaiTro;

class NhaTaiTroSeeder extends Seeder
{
    public function run(): void
    {
        $nhaTaiTros = [
            [
                'ten_nha_tai_tro'        => 'Razer',
                'logo'                   => 'https://logos-world.net/wp-content/uploads/2020/11/Razer-Logo.png',
                'ten_nguoi_dai_dien'     => 'Nguyễn Văn Phúc',
                'so_dien_thoai_dai_dien' => '0281234567',
                'email_dai_dien'         => 'partner.vn@razer.com',
                'website'                => 'https://www.razer.com',
                'mo_ta'                  => 'Thương hiệu thiết bị gaming hàng đầu thế giới.',
                'created_at'             => '2020-01-05 08:00:00',
            ],
            [
                'ten_nha_tai_tro'        => 'Logitech G',
                'logo'                   => 'https://seeklogo.com/images/L/logitech-g-logo-DE57FD2FBD-seeklogo.com.png',
                'ten_nguoi_dai_dien'     => 'Trần Thị Hương',
                'so_dien_thoai_dai_dien' => '0289876543',
                'email_dai_dien'         => 'gaming.vn@logitech.com',
                'website'                => 'https://www.logitechg.com',
                'mo_ta'                  => 'Nhà sản xuất thiết bị gaming và phụ kiện máy tính uy tín.',
                'created_at'             => '2020-01-10 09:15:00',
            ],
            [
                'ten_nha_tai_tro'        => 'Red Bull',
                'logo'                   => 'https://1000logos.net/wp-content/uploads/2017/05/Red-Bull-emblems.jpg',
                'ten_nguoi_dai_dien'     => 'Lê Minh Tuấn',
                'so_dien_thoai_dai_dien' => '0245678901',
                'email_dai_dien'         => 'esport@redbull.vn',
                'website'                => 'https://www.redbull.com/vn',
                'mo_ta'                  => 'Thương hiệu nước tăng lực tài trợ nhiều sự kiện esport lớn.',
                'created_at'             => '2020-02-01 10:30:00',
            ],
            [
                'ten_nha_tai_tro'        => 'Samsung Việt Nam',
                'logo'                   => 'https://haymora.com/upload/images/cong_nghe_thong_tin/big_it/samsung_electronics_viet_nam_sev/logo-cong-ty-samsung.jpg',
                'ten_nguoi_dai_dien'     => 'Phạm Hữu Đạt',
                'so_dien_thoai_dai_dien' => '0256789012',
                'email_dai_dien'         => 'b2b@samsung.vn',
                'website'                => 'https://www.samsung.com/vn',
                'mo_ta'                  => 'Tập đoàn công nghệ hàng đầu tài trợ màn hình và thiết bị gaming.',
                'created_at'             => '2020-02-20 14:00:00',
            ],
            [
                'ten_nha_tai_tro'        => 'Viettel Gaming',
                'logo'                   => 'https://seeklogo.com/images/V/viettel-logo-31311410F4-seeklogo.com.png',
                'ten_nguoi_dai_dien'     => 'Hoàng Quốc Bảo',
                'so_dien_thoai_dai_dien' => '0267890123',
                'email_dai_dien'         => 'gaming@viettel.vn',
                'website'                => 'https://gaming.viettel.vn',
                'mo_ta'                  => 'Nền tảng gaming và esport của tập đoàn viễn thông Viettel.',
                'created_at'             => '2020-03-05 15:20:00',
            ],
            [
                'ten_nha_tai_tro'        => 'Monster Energy',
                'logo'                   => 'https://cdn.freebiesupply.com/logos/large/2x/monster-energy-logo-png-transparent.png',
                'ten_nguoi_dai_dien'     => 'Nguyễn Hoàng Nam',
                'so_dien_thoai_dai_dien' => '0278123456',
                'email_dai_dien'         => 'partner.vn@monster.com',
                'website'                => 'https://www.monsterenergy.com',
                'mo_ta'                  => 'Thương hiệu nước tăng lực đồng hành cùng eSports thế giới.',
                'created_at'             => '2021-01-12 11:00:00',
            ],
            [
                'ten_nha_tai_tro'        => 'ASUS ROG',
                'logo'                   => 'https://wallpaperaccess.com/full/4383620.png',
                'ten_nguoi_dai_dien'     => 'Phạm Quốc Anh',
                'so_dien_thoai_dai_dien' => '0278123458',
                'email_dai_dien'         => 'rog.vn@asus.com',
                'website'                => 'https://rog.asus.com',
                'mo_ta'                  => 'Thương hiệu laptop và linh kiện gaming cao cấp.',
                'created_at'             => '2021-04-10 09:30:00',
            ],
            [
                'ten_nha_tai_tro'        => 'Acer Predator',
                'logo'                   => 'https://wallpapercave.com/wp/wp5322134.jpg',
                'ten_nguoi_dai_dien'     => 'Vũ Hoàng Đức',
                'so_dien_thoai_dai_dien' => '0278123460',
                'email_dai_dien'         => 'predator@acer.com',
                'website'                => 'https://www.acer.com/predator',
                'mo_ta'                  => 'Dòng sản phẩm laptop và thiết bị chơi game đỉnh cao.',
                'created_at'             => '2021-06-18 14:10:00',
            ],
            [
                'ten_nha_tai_tro'        => 'MSI Gaming',
                'logo'                   => 'https://wallpaperaccess.com/full/114230.jpg',
                'ten_nguoi_dai_dien'     => 'Lê Thanh Bình',
                'so_dien_thoai_dai_dien' => '0278123459',
                'email_dai_dien'         => 'marketing.vn@msi.com',
                'website'                => 'https://www.msi.com',
                'mo_ta'                  => 'Nhà sản xuất phần cứng máy tính và laptop gaming nổi tiếng.',
                'created_at'             => '2021-08-22 10:00:00',
            ],
            [
                'ten_nha_tai_tro'        => 'Secretlab',
                'logo'                   => 'https://fbi.cults3d.com/uploaders/15636329/illustration-file/75b5d5eb-ab4f-45d7-a483-70e8727d1392/Secretlab-Cup-Holder-7.jpg',
                'ten_nguoi_dai_dien'     => 'Đỗ Tiến Đạt',
                'so_dien_thoai_dai_dien' => '0278123461',
                'email_dai_dien'         => 'support@secretlab.co',
                'website'                => 'https://secretlab.co',
                'mo_ta'                  => 'Thương hiệu ghế gaming cao cấp số 1 thế giới.',
                'created_at'             => '2022-01-15 11:30:00',
            ],
            [
                'ten_nha_tai_tro'        => 'Kingston FURY',
                'logo'                   => 'https://www.cravingtech.com/blog/wp-content/uploads/2021/06/Kingston-FURY-logo-2021-CMYK-scaled.jpg',
                'ten_nguoi_dai_dien'     => 'Trịnh Gia Huy',
                'so_dien_thoai_dai_dien' => '0278123462',
                'email_dai_dien'         => 'fury@kingston.com',
                'website'                => 'https://www.kingston.com/fury',
                'mo_ta'                  => 'Thương hiệu RAM và SSD gaming hàng đầu.',
                'created_at'             => '2022-03-20 15:45:00',
            ],
            [
                'ten_nha_tai_tro'        => 'HyperX',
                'logo'                   => 'https://logos-world.net/wp-content/uploads/2023/05/Kingston-HyperX-Logo-2002.png',
                'ten_nguoi_dai_dien'     => 'Đặng Văn Lâm',
                'so_dien_thoai_dai_dien' => '0278123463',
                'email_dai_dien'         => 'hyperx@hp.com',
                'website'                => 'https://hyperx.com',
                'mo_ta'                  => 'Thương hiệu tai nghe và phụ kiện gaming được các tuyển thủ yêu thích.',
                'created_at'             => '2022-05-12 09:20:00',
            ],
            [
                'ten_nha_tai_tro'        => 'Sony PlayStation',
                'logo'                   => 'https://pngimg.com/uploads/sony_playstation/sony_playstation_PNG17532.png',
                'ten_nguoi_dai_dien'     => 'Ngô Tuấn Anh',
                'so_dien_thoai_dai_dien' => '0278123464',
                'email_dai_dien'         => 'playstation.vn@sony.com',
                'website'                => 'https://www.playstation.com',
                'mo_ta'                  => 'Hệ sinh thái máy chơi game console hàng đầu.',
                'created_at'             => '2022-08-10 13:00:00',
            ],
            [
                'ten_nha_tai_tro'        => 'Intel Việt Nam',
                'logo'                   => 'https://printgo.vn/uploads/file-logo/1/512x512.707a470dc892941ddfc8fd5cb31e2d34.ai.1.png',
                'ten_nguoi_dai_dien'     => 'Trần Văn Mạnh',
                'so_dien_thoai_dai_dien' => '0278123465',
                'email_dai_dien'         => 'intel.vn@intel.com',
                'website'                => 'https://www.intel.vn',
                'mo_ta'                  => 'Tập đoàn vi xử lý máy tính hàng đầu thế giới.',
                'created_at'             => '2023-01-05 10:00:00',
            ],
            [
                'ten_nha_tai_tro'        => 'AMD Ryzen',
                'logo'                   => 'https://logos-download.com/wp-content/uploads/2022/11/AMD_Ryzen_Logo_full.png',
                'ten_nguoi_dai_dien'     => 'Bùi Hoàng Việt',
                'so_dien_thoai_dai_dien' => '0278123466',
                'email_dai_dien'         => 'ryzen.vn@amd.com',
                'website'                => 'https://www.amd.com',
                'mo_ta'                  => 'Thương hiệu vi xử lý gaming mạnh mẽ và hiệu năng cao.',
                'created_at'             => '2023-04-18 16:30:00',
            ]
        ];

        foreach ($nhaTaiTros as $ntt) {
            NhaTaiTro::create($ntt);
        }
    }
}
