<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PhanQuyen;
use App\Models\ChucVu;
use App\Models\ChucNang;

class PhanQuyenSeeder extends Seeder
{
    public function run(): void
    {
        $chucVus   = ChucVu::all();
        $chucNangs = ChucNang::all();

        if ($chucVus->isEmpty() || $chucNangs->isEmpty()) {
            return;
        }

        // Mapping quyền chi tiết cho các chức vụ với mốc thời gian cố định
        foreach ($chucVus as $cv) {
            switch ($cv->id) {
                case 1: // Quản trị viên hệ thống - Có tất cả quyền
                    foreach ($chucNangs as $cn) {
                        PhanQuyen::create([
                            'id_chuc_vu'   => $cv->id,
                            'id_chuc_nang' => $cn->id,
                            'created_at'   => '2020-01-02 08:00:00',
                        ]);
                    }
                    break;

                case 2: // Quản lý giải đấu
                    $funcIds = [1, 2, 3, 6, 7, 8, 11, 14];
                    foreach ($funcIds as $cnId) {
                        PhanQuyen::create([
                            'id_chuc_vu'   => $cv->id,
                            'id_chuc_nang' => $cnId,
                            'created_at'   => '2020-01-15 09:30:00',
                        ]);
                    }
                    break;

                case 3: // Ban tổ chức & Trọng tài
                    $funcIds = [6, 7, 8];
                    foreach ($funcIds as $cnId) {
                        PhanQuyen::create([
                            'id_chuc_vu'   => $cv->id,
                            'id_chuc_nang' => $cnId,
                            'created_at'   => '2020-02-01 10:15:00',
                        ]);
                    }
                    break;

                case 4: // Quản lý đội tuyển
                    $funcIds = [4, 5, 8];
                    foreach ($funcIds as $cnId) {
                        PhanQuyen::create([
                            'id_chuc_vu'   => $cv->id,
                            'id_chuc_nang' => $cnId,
                            'created_at'   => '2020-02-20 14:00:00',
                        ]);
                    }
                    break;

                case 5: // Huấn luyện viên
                    $funcIds = [5, 8];
                    foreach ($funcIds as $cnId) {
                        PhanQuyen::create([
                            'id_chuc_vu'   => $cv->id,
                            'id_chuc_nang' => $cnId,
                            'created_at'   => '2021-03-05 11:20:00',
                        ]);
                    }
                    break;

                case 6: // Biên tập viên & Caster
                    $funcIds = [11, 14];
                    foreach ($funcIds as $cnId) {
                        PhanQuyen::create([
                            'id_chuc_vu'   => $cv->id,
                            'id_chuc_nang' => $cnId,
                            'created_at'   => '2021-06-12 15:45:00',
                        ]);
                    }
                    break;

                default: // Các chức vụ khác - Cho quyền Thống kê & Báo cáo
                    PhanQuyen::create([
                        'id_chuc_vu'   => $cv->id,
                        'id_chuc_nang' => 14,
                        'created_at'   => '2022-01-18 13:10:00',
                    ]);
                    break;
            }
        }
    }
}
