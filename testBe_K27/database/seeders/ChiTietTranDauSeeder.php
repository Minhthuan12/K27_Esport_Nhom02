<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TranDauDoi;
use App\Models\VongDau;
use App\Models\DoiTuyen;
use App\Models\ChiTietTranDau;

class ChiTietTranDauSeeder extends Seeder
{
    public function run(): void
    {
        $tranDaus  = TranDauDoi::all();
        $doiTuyens = DoiTuyen::all();

        if ($tranDaus->isEmpty() || $doiTuyens->isEmpty()) {
            return;
        }

        $teamIds    = $doiTuyens->pluck('id')->toArray();
        $totalTeams = count($teamIds);

        foreach ($tranDaus as $td) {
            $vd = VongDau::find($td->id_vong_dau);
            if (!$vd) {
                continue;
            }

            // Đội A và Đội B được chọn xoay vòng deterministically từ mảng teamIds
            $teamAIndex = ($td->id * 2 + 0) % $totalTeams;
            $teamBIndex = ($td->id * 2 + 1) % $totalTeams;

            $teamAId = $teamIds[$teamAIndex];
            $teamBId = $teamIds[$teamBIndex];

            // Tỷ số trận đấu
            if ($td->the_thuc === 'Best of 5') {
                $scoreA = 3;
                $scoreB = 1;
            } else {
                $scoreA = 2;
                $scoreB = 1;
            }

            // Tạo chi tiết cho đội A
            ChiTietTranDau::create([
                'id_giai_dau'      => $vd->id_giai_dau,
                'id_vong_dau'      => $td->id_vong_dau,
                'id_tran_dau'      => $td->id,
                'id_doi_tuyen'     => $teamAId,
                'diem_so_tran_dau' => $scoreA,
                'trang_thai'       => 1,
                'created_at'       => $td->thoi_gian_thi_dau,
            ]);

            // Tạo chi tiết cho đội B
            ChiTietTranDau::create([
                'id_giai_dau'      => $vd->id_giai_dau,
                'id_vong_dau'      => $td->id_vong_dau,
                'id_tran_dau'      => $td->id,
                'id_doi_tuyen'     => $teamBId,
                'diem_so_tran_dau' => $scoreB,
                'trang_thai'       => 1,
                'created_at'       => $td->thoi_gian_thi_dau,
            ]);
        }
    }
}
