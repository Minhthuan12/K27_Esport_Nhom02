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
            $articles = [
                [
                    'tieu_de'   => "Giải đấu {$gd->ten_giai_dau} chính thức khởi tranh vòng bảng",
                    'noi_dung'  => "Giải đấu thể thao điện tử {$gd->ten_giai_dau} đã chính thức công bố lịch thi đấu vòng bảng và thể thức tranh tài. Các đội tuyển đang gấp rút chuẩn bị tập luyện để cạnh tranh ngôi vương cùng tổng trị giá giải thưởng vô cùng hấp dẫn.",
                    'trang_thai'=> 1,
                    'date'      => date('Y-m-d H:i:s', strtotime($gd->ngay_bat_dau)),
                ],
                [
                    'tieu_de'   => "Tổng hợp những ván đấu xuất sắc tại giải {$gd->ten_giai_dau}",
                    'noi_dung'  => "Giải đấu {$gd->ten_giai_dau} đã mang lại những trận đấu đỉnh cao và kịch tính cho cộng đồng người hâm mộ. Sự kịch tính thể hiện ở từng ván đấu và kỹ năng cá nhân xuất sắc của dàn tuyển thủ chuyên nghiệp.",
                    'trang_thai'=> 1,
                    'date'      => date('Y-m-d H:i:s', strtotime($gd->ngay_bat_dau) + 86400 * 10),
                ],
                [
                    'tieu_de'   => "Cơ cấu giải thưởng và nhà tài trợ đồng hành cùng {$gd->ten_giai_dau}",
                    'noi_dung'  => "Ban tổ chức {$gd->ten_giai_dau} chính thức công bố các đối tác tài trợ đồng hành cùng tổng giá trị tiền thưởng hấp dẫn cho nhà vô địch.",
                    'trang_thai'=> 1,
                    'date'      => date('Y-m-d H:i:s', strtotime($gd->ngay_bat_dau) + 86400 * 15),
                ],
                [
                    'tieu_de'   => "Chung kết giải đấu {$gd->ten_giai_dau}: Cuộc đụng độ của những gã khổng lồ",
                    'noi_dung'  => "Vòng chung kết giải đấu {$gd->ten_giai_dau} chuẩn bị diễn ra với sự góp mặt của các đội tuyển mạnh nhất.",
                    'trang_thai'=> ($gd->id % 5 == 0) ? 0 : 1,
                    'date'      => date('Y-m-d H:i:s', strtotime($gd->ngay_ket_thuc)),
                ],
            ];

            foreach ($articles as $art) {
                TinTuc::create([
                    'id_game'     => $gd->id_game,
                    'id_giai_dau' => $gd->id,
                    'tieu_de'     => $art['tieu_de'],
                    'noi_dung'    => $art['noi_dung'],
                    'trang_thai'  => $art['trang_thai'],
                    'created_at'  => $art['date'],
                ]);
            }
        }
    }
}
