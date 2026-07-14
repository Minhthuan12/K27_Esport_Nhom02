<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GiaiDau;
use App\Models\TinTuc;

class TinTucSeeder extends Seeder
{
    public function run(): void
    {
        $giaiDaus = GiaiDau::all();

        foreach ($giaiDaus as $gd) {
            // Tin tức 1: Thông báo khai mạc / công bố giải đấu
            TinTuc::create([
                'id_game'     => $gd->id_game,
                'id_giai_dau' => $gd->id,
                'tieu_de'     => "Giải đấu {$gd->ten_giai_dau} chính thức công bố lịch thi đấu vòng bảng",
                'noi_dung'    => "Giải đấu thể thao điện tử {$gd->ten_giai_dau} đã chính thức công bố lịch thi đấu vòng bảng và thể thức tranh tài. Các đội tuyển đang gấp rút chuẩn bị tập luyện để cạnh tranh ngôi vương cùng tổng trị giá giải thưởng vô cùng hấp dẫn.",
                'trang_thai'  => 1,
            ]);

            // Tin tức 2: Tổng hợp khoảnh khắc ấn tượng
            TinTuc::create([
                'id_game'     => $gd->id_game,
                'id_giai_dau' => $gd->id,
                'tieu_de'     => "Những khoảnh khắc thi đấu ấn tượng tại giải {$gd->ten_giai_dau}",
                'noi_dung'    => "Giải đấu {$gd->ten_giai_dau} đã mang lại những trận đấu đỉnh cao và kịch tính cho cộng đồng người hâm mộ Việt Nam. Sự kịch tính thể hiện ở từng ván đấu và kỹ năng cá nhân xuất sắc của dàn tuyển thủ chuyên nghiệp.",
                'trang_thai'  => 0,
            ]);
        }
    }
}
