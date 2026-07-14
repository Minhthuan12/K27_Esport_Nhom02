<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\TinTuc;
use App\Models\TaiTroGiaiDau;
use App\Models\NhaTaiTro;
use App\Models\ThongSoTuyenThu;
use App\Models\ThongSoDoiTuyen;
use App\Models\KetQuaGiaiDau;
use App\Models\ChiTietTranDau;
use App\Models\TranDauDoi;
use App\Models\VongDau;
use App\Models\GiaiThuong;
use App\Models\TuyenThu;
use App\Models\DoiTuyen;
use App\Models\GiaiDau;
use App\Models\Game;
use App\Models\NguoiDung;
use App\Models\PhanQuyen;
use App\Models\ChucNang;
use App\Models\ChucVu;
use App\Models\TheLoai;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. TẮT FOREIGN KEY CHECKS ĐỂ TRUNCATE AN TOÀN
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate tất cả các bảng theo thứ tự phụ thuộc (bảng con trước)
        TinTuc::truncate();
        TaiTroGiaiDau::truncate();
        NhaTaiTro::truncate();
        ThongSoTuyenThu::truncate();
        ThongSoDoiTuyen::truncate();
        KetQuaGiaiDau::truncate();
        ChiTietTranDau::truncate();
        TranDauDoi::truncate();
        VongDau::truncate();
        GiaiThuong::truncate();
        TuyenThu::truncate();
        DoiTuyen::truncate();
        GiaiDau::truncate();
        Game::truncate();
        NguoiDung::truncate();
        PhanQuyen::truncate();
        ChucNang::truncate();
        ChucVu::truncate();
        TheLoai::truncate();
        User::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 2. GỌI TUẦN TỰ CÁC FILE SEEDER RIÊNG BIỆT (Theo thứ tự khóa ngoại phụ thuộc)
        $this->call([
            TheLoaiSeeder::class,       // Không phụ thuộc
            ChucVuSeeder::class,        // Không phụ thuộc
            ChucNangSeeder::class,      // Không phụ thuộc
            PhanQuyenSeeder::class,     // Phụ thuộc ChucVu, ChucNang
            NguoiDungSeeder::class,     // Phụ thuộc ChucVu
            GameSeeder::class,          // Phụ thuộc TheLoai
            GiaiDauSeeder::class,       // Phụ thuộc Game
            GiaiThuongSeeder::class,    // Không phụ thuộc
            DoiTuyenSeeder::class,      // Phụ thuộc NguoiDung
            TuyenThuSeeder::class,      // Phụ thuộc DoiTuyen
            VongDauSeeder::class,       // Phụ thuộc GiaiDau
            TranDauDoiSeeder::class,    // Phụ thuộc VongDau
            ChiTietTranDauSeeder::class, // Phụ thuộc GiaiDau, VongDau, TranDauDoi, DoiTuyen
            KetQuaGiaiDauSeeder::class, // Phụ thuộc GiaiDau, DoiTuyen, GiaiThuong
            ThongSoDoiTuyenSeeder::class, // Phụ thuộc DoiTuyen, Game
            ThongSoTuyenThuSeeder::class, // Phụ thuộc DoiTuyen, Game, TuyenThu
            NhaTaiTroSeeder::class,     // Không phụ thuộc
            TaiTroGiaiDauSeeder::class, // Phụ thuộc NhaTaiTro, GiaiDau
            TinTucSeeder::class,        // Phụ thuộc Game, GiaiDau
        ]);
    }
}

