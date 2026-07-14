<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TranDauDoi;
use App\Models\VongDau;
use App\Models\ChiTietTranDau;

class ChiTietTranDauSeeder extends Seeder
{
    public function run(): void
    {
        $tranDaus = TranDauDoi::all();

        foreach ($tranDaus as $td) {
            // Tìm vòng đấu để lấy id_giai_dau
            $vd = VongDau::find($td->id_vong_dau);
            if (!$vd) {
                continue;
            }

            // Chọn 2 đội tuyển đối kháng từ 1 đến 10
            $teamAId = (($td->id + 0) % 10) + 1;
            $teamBId = (($td->id + 1) % 10) + 1;

            // Xác định điểm số dựa trên thể thức
            if ($td->the_thuc === 'Best of 5') {
                $scoreA = 3;
                $scoreB = 1;
            } else {
                $scoreA = 2;
                $scoreB = 0;
            }

            // Tạo chi tiết cho đội tuyển A
            ChiTietTranDau::create([
                'id_giai_dau'      => $vd->id_giai_dau,
                'id_vong_dau'      => $td->id_vong_dau,
                'id_tran_dau'      => $td->id,
                'id_doi_tuyen'     => $teamAId,
                'diem_so_tran_dau' => $scoreA,
                'trang_thai'       => 1,
            ]);

            // Tạo chi tiết cho đội tuyển B
            ChiTietTranDau::create([
                'id_giai_dau'      => $vd->id_giai_dau,
                'id_vong_dau'      => $td->id_vong_dau,
                'id_tran_dau'      => $td->id,
                'id_doi_tuyen'     => $teamBId,
                'diem_so_tran_dau' => $scoreB,
                'trang_thai'       => 1,
            ]);
        }
    }
}
