<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PhanQuyen;

class PhanQuyenSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Ban tổ chức (id_chuc_vu = 1) có tất cả 12 quyền (1 -> 12)
        for ($i = 1; $i <= 12; $i++) {
            PhanQuyen::create([
                'id_chuc_vu'   => 1,
                'id_chuc_nang' => $i,
            ]);
        }

        // 2. Quản lý đội tuyển (id_chuc_vu = 2) có quyền Quản lý đội tuyển (4) và Quản lý tuyển thủ (5)
        PhanQuyen::create([
            'id_chuc_vu'   => 2,
            'id_chuc_nang' => 4,
        ]);
        PhanQuyen::create([
            'id_chuc_vu'   => 2,
            'id_chuc_nang' => 5,
        ]);

        // 3. Huấn luyện viên (id_chuc_vu = 4) có quyền Quản lý tuyển thủ (5)
        PhanQuyen::create([
            'id_chuc_vu'   => 4,
            'id_chuc_nang' => 5,
        ]);

        // 4. Trọng tài (id_chuc_vu = 5) có quyền Quản lý vòng đấu (6), Quản lý trận đấu (7), Quản lý kết quả giải đấu (8)
        PhanQuyen::create([
            'id_chuc_vu'   => 5,
            'id_chuc_nang' => 6,
        ]);
        PhanQuyen::create([
            'id_chuc_vu'   => 5,
            'id_chuc_nang' => 7,
        ]);
        PhanQuyen::create([
            'id_chuc_vu'   => 5,
            'id_chuc_nang' => 8,
        ]);
    }
}
