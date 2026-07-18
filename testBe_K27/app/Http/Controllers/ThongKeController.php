<?php

namespace App\Http\Controllers;

use App\Models\ChucVu;
use App\Models\NguoiDung;
use App\Models\GiaiDau;
use App\Models\Game;
use App\Models\DoiTuyen;
use App\Models\NhaTaiTro;
use App\Models\TaiTroGiaiDau;
use App\Models\KetQuaGiaiDau;
use App\Models\TuyenThu;
use App\Models\TranDauDoi;
use App\Models\ChiTietTranDau;
use App\Models\TinTuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThongKeController extends Controller
{
    // ==========================================
    // NHÓM 1: THỐNG KÊ GIẢI ĐẤU & QUY MÔ
    // ==========================================

    // NHÓM 1 - CÂU 1: Thống kê số lượng giải đấu theo NĂM
    public function nhom1Cau1(Request $request)
    {
        $tu_nam  = $request->input('tu_nam', 2020);
        $den_nam = $request->input('den_nam', 2026);

        $data = GiaiDau::select(
                DB::raw('YEAR(ngay_bat_dau) as nam_to_chuc'),
                DB::raw('COUNT(*) as so_luong_giai')
            )
            ->where('trang_thai', 1)
            ->whereRaw('YEAR(ngay_bat_dau) >= ?', [$tu_nam])
            ->whereRaw('YEAR(ngay_bat_dau) <= ?', [$den_nam])
            ->groupBy(DB::raw('YEAR(ngay_bat_dau)'))
            ->orderBy('nam_to_chuc', 'asc')
            ->get();

        $array_nam = [];
        $array_so_luong = [];

        foreach ($data as $row) {
            $array_nam[] = "Năm {$row->nam_to_chuc}";
            $array_so_luong[] = $row->so_luong_giai;
        }

        return response()->json([
            'status'         => 1,
            'message'        => 'Lấy dữ liệu thành công',
            'data'           => $data,
            'array_nam'      => $array_nam,
            'array_so_luong' => $array_so_luong
        ], 200);
    }

    // NHÓM 1 - CÂU 2: Thống kê số giải đấu & tổng số đội tham gia theo Tựa Game
    public function nhom1Cau2(Request $request)
    {
        $tu_ngay  = $request->input('tu_ngay', '2020-01-01');
        $den_ngay = $request->input('den_ngay', '2026-12-31');

        $data = Game::join('giai_daus', 'games.id', '=', 'giai_daus.id_game')
            ->select(
                'games.ten_game',
                DB::raw('COUNT(giai_daus.id) as so_giai_dau'),
                DB::raw('SUM(giai_daus.so_luong_doi) as tong_so_doi')
            )
            ->where('games.trang_thai', 1)
            ->where('giai_daus.ngay_bat_dau', '>=', $tu_ngay)
            ->where('giai_daus.ngay_bat_dau', '<=', $den_ngay)
            ->groupBy('games.id', 'games.ten_game')
            ->orderBy('tong_so_doi', 'desc')
            ->get();

        $array_game = [];
        $array_so_giai = [];
        $array_tong_doi = [];

        foreach ($data as $row) {
            $array_game[] = $row->ten_game;
            $array_so_giai[] = $row->so_giai_dau;
            $array_tong_doi[] = $row->tong_so_doi;
        }

        return response()->json([
            'status'          => 1,
            'message'         => 'Lấy dữ liệu thành công',
            'data'            => $data,
            'array_game'      => $array_game,
            'array_so_giai'   => $array_so_giai,
            'array_tong_doi'  => $array_tong_doi
        ], 200);
    }

    // ==========================================
    // NHÓM 2: THỐNG KÊ TÀI TRỢ & NGÂN SÁCH
    // ==========================================

    // NHÓM 2 - CÂU 1: Thống kê tổng tiền tài trợ theo Tháng
    public function nhom2Cau1(Request $request)
    {
        $tu_ngay  = $request->input('tu_ngay', '2020-01-01');
        $den_ngay = $request->input('den_ngay', '2026-12-31');

        $data = TaiTroGiaiDau::select(
                DB::raw('YEAR(created_at) as nam'),
                DB::raw('MONTH(created_at) as thang'),
                DB::raw('SUM(tong_tai_tro) as tong_tien_tai_tro')
            )
            ->where('created_at', '>=', $tu_ngay . ' 00:00:00')
            ->where('created_at', '<=', $den_ngay . ' 23:59:59')
            ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
            ->orderBy('nam', 'asc')
            ->orderBy('thang', 'asc')
            ->get();

        $array_thang = [];
        $array_tong_tien = [];

        foreach ($data as $row) {
            $array_thang[] = "T{$row->thang}/{$row->nam}";
            $array_tong_tien[] = (float)$row->tong_tien_tai_tro;
        }

        return response()->json([
            'status'          => 1,
            'message'         => 'Lấy dữ liệu thành công',
            'data'            => $data,
            'array_thang'     => $array_thang,
            'array_tong_tien' => $array_tong_tien
        ], 200);
    }

    // NHÓM 2 - CÂU 2: Thống kê TẤT CẢ Nhà tài trợ và tổng số tiền tài trợ
    public function nhom2Cau2(Request $request)
    {
        $tu_nam  = $request->input('tu_nam', 2020);
        $den_nam = $request->input('den_nam', 2026);

        $data = NhaTaiTro::join('tai_tro_giai_daus', 'nha_tai_tros.id', '=', 'tai_tro_giai_daus.id_nha_tai_tro')
            ->select(
                'nha_tai_tros.ten_nha_tai_tro',
                DB::raw('COUNT(tai_tro_giai_daus.id_giai_dau) as so_giai_tai_tro'),
                DB::raw('SUM(tai_tro_giai_daus.tong_tai_tro) as tong_tien_tai_tro')
            )
            ->whereRaw('YEAR(tai_tro_giai_daus.created_at) >= ?', [$tu_nam])
            ->whereRaw('YEAR(tai_tro_giai_daus.created_at) <= ?', [$den_nam])
            ->groupBy('nha_tai_tros.id', 'nha_tai_tros.ten_nha_tai_tro')
            ->orderBy('tong_tien_tai_tro', 'desc')
            ->get();

        $array_nha_tai_tro = [];
        $array_so_giai = [];
        $array_tong_tien = [];

        foreach ($data as $row) {
            $array_nha_tai_tro[] = $row->ten_nha_tai_tro;
            $array_so_giai[] = $row->so_giai_tai_tro;
            $array_tong_tien[] = (float)$row->tong_tien_tai_tro;
        }

        return response()->json([
            'status'            => 1,
            'message'           => 'Lấy dữ liệu thành công',
            'data'              => $data,
            'array_nha_tai_tro' => $array_nha_tai_tro,
            'array_so_giai'     => $array_so_giai,
            'array_tong_tien'   => $array_tong_tien
        ], 200);
    }

    // ==========================================
    // NHÓM 3: THỐNG KÊ THỨ HẠNG & ĐIỂM SỐ ĐỘI TUYỂN
    // ==========================================

    // NHÓM 3 - CÂU 1: Thống kê số lần vô địch (Hạng 1) của các đội tuyển
    public function nhom3Cau1(Request $request)
    {
        $tu_ngay  = $request->input('tu_ngay', '2020-01-01');
        $den_ngay = $request->input('den_ngay', '2026-12-31');

        $data = DoiTuyen::join('ket_qua_giai_daus', 'doi_tuyens.id', '=', 'ket_qua_giai_daus.id_doi_tuyen')
            ->select(
                'doi_tuyens.ten_doi_tuyen',
                DB::raw('COUNT(*) as so_lan_vo_dich')
            )
            ->where('doi_tuyens.trang_thai', 1)
            ->where('ket_qua_giai_daus.hang', 1)
            ->where('ket_qua_giai_daus.created_at', '>=', $tu_ngay . ' 00:00:00')
            ->where('ket_qua_giai_daus.created_at', '<=', $den_ngay . ' 23:59:59')
            ->groupBy('doi_tuyens.id', 'doi_tuyens.ten_doi_tuyen')
            ->orderBy('so_lan_vo_dich', 'desc')
            ->get();

        $array_doi = [];
        $array_so_lan = [];

        foreach ($data as $row) {
            $array_doi[] = $row->ten_doi_tuyen;
            $array_so_lan[] = $row->so_lan_vo_dich;
        }

        return response()->json([
            'status'       => 1,
            'message'      => 'Lấy dữ liệu thành công',
            'data'         => $data,
            'array_doi'    => $array_doi,
            'array_so_lan' => $array_so_lan
        ], 200);
    }

    // NHÓM 3 - CÂU 2: Thống kê tổng điểm và điểm trung bình tích lũy của các đội
    public function nhom3Cau2(Request $request)
    {
        $tu_nam  = $request->input('tu_nam', 2020);
        $den_nam = $request->input('den_nam', 2026);

        $data = DoiTuyen::join('ket_qua_giai_daus', 'doi_tuyens.id', '=', 'ket_qua_giai_daus.id_doi_tuyen')
            ->select(
                'doi_tuyens.ten_doi_tuyen',
                DB::raw('COUNT(ket_qua_giai_daus.id_giai_dau) as so_giai_tham_gia'),
                DB::raw('SUM(ket_qua_giai_daus.diem_tong) as tong_diem'),
                DB::raw('ROUND(AVG(ket_qua_giai_daus.diem_tong), 1) as diem_trung_binh')
            )
            ->where('doi_tuyens.trang_thai', 1)
            ->whereRaw('YEAR(ket_qua_giai_daus.created_at) >= ?', [$tu_nam])
            ->whereRaw('YEAR(ket_qua_giai_daus.created_at) <= ?', [$den_nam])
            ->groupBy('doi_tuyens.id', 'doi_tuyens.ten_doi_tuyen')
            ->orderBy('tong_diem', 'desc')
            ->get();

        $array_doi = [];
        $array_so_giai = [];
        $array_tong_diem = [];
        $array_diem_tb = [];

        foreach ($data as $row) {
            $array_doi[] = $row->ten_doi_tuyen;
            $array_so_giai[] = $row->so_giai_tham_gia;
            $array_tong_diem[] = (float)$row->tong_diem;
            $array_diem_tb[] = (float)$row->diem_trung_binh;
        }

        return response()->json([
            'status'          => 1,
            'message'         => 'Lấy dữ liệu thành công',
            'data'            => $data,
            'array_doi'       => $array_doi,
            'array_so_giai'   => $array_so_giai,
            'array_tong_diem' => $array_tong_diem,
            'array_diem_tb'   => $array_diem_tb
        ], 200);
    }

    // ==========================================
    // NHÓM 4: THỐNG KÊ TUYỂN THỦ & QUỐC TỊCH
    // ==========================================

    // NHÓM 4 - CÂU 1: Thống kê số lượng tuyển thủ theo Vị Trí Thi Đấu
    public function nhom4Cau1(Request $request)
    {
        $tu_ngay  = $request->input('tu_ngay', '2020-01-01');
        $den_ngay = $request->input('den_ngay', '2026-12-31');

        $data = TuyenThu::select(
                'vi_tri_thi_dau',
                DB::raw('COUNT(*) as so_luong_tuyen_thu')
            )
            ->where('trang_thai', 1)
            ->where('created_at', '>=', $tu_ngay . ' 00:00:00')
            ->where('created_at', '<=', $den_ngay . ' 23:59:59')
            ->groupBy('vi_tri_thi_dau')
            ->orderBy('so_luong_tuyen_thu', 'desc')
            ->get();

        $array_vi_tri = [];
        $array_so_luong = [];

        foreach ($data as $row) {
            $array_vi_tri[] = $row->vi_tri_thi_dau;
            $array_so_luong[] = $row->so_luong_tuyen_thu;
        }

        return response()->json([
            'status'         => 1,
            'message'        => 'Lấy dữ liệu thành công',
            'data'           => $data,
            'array_vi_tri'   => $array_vi_tri,
            'array_so_luong' => $array_so_luong
        ], 200);
    }

    // NHÓM 4 - CÂU 2: Thống kê số lượng tuyển thủ theo Quốc Tịch
    public function nhom4Cau2(Request $request)
    {
        $tu_nam  = $request->input('tu_nam', 2020);
        $den_nam = $request->input('den_nam', 2026);

        $data = TuyenThu::select(
                'quoc_tich',
                DB::raw('COUNT(*) as so_luong_tuyen_thu')
            )
            ->where('trang_thai', 1)
            ->whereRaw('YEAR(created_at) >= ?', [$tu_nam])
            ->whereRaw('YEAR(created_at) <= ?', [$den_nam])
            ->groupBy('quoc_tich')
            ->orderBy('so_luong_tuyen_thu', 'desc')
            ->get();

        $array_quoc_tich = [];
        $array_so_luong = [];

        foreach ($data as $row) {
            $array_quoc_tich[] = $row->quoc_tich;
            $array_so_luong[] = $row->so_luong_tuyen_thu;
        }

        return response()->json([
            'status'          => 1,
            'message'         => 'Lấy dữ liệu thành công',
            'data'            => $data,
            'array_quoc_tich' => $array_quoc_tich,
            'array_so_luong'   => $array_so_luong
        ], 200);
    }

    // ==========================================
    // NHÓM 5: THỐNG KÊ TRẬN ĐẤU & TỶ SỐ
    // ==========================================

    // NHÓM 5 - CÂU 1: Thống kê số lượng trận đấu diễn ra theo Tháng/Năm
    public function nhom5Cau1(Request $request)
    {
        $tu_ngay  = $request->input('tu_ngay', '2020-01-01');
        $den_ngay = $request->input('den_ngay', '2026-12-31');

        $data = TranDauDoi::select(
                DB::raw('YEAR(thoi_gian_thi_dau) as nam'),
                DB::raw('MONTH(thoi_gian_thi_dau) as thang'),
                DB::raw('COUNT(*) as so_tran_dau')
            )
            ->where('thoi_gian_thi_dau', '>=', $tu_ngay . ' 00:00:00')
            ->where('thoi_gian_thi_dau', '<=', $den_ngay . ' 23:59:59')
            ->groupBy(DB::raw('YEAR(thoi_gian_thi_dau)'), DB::raw('MONTH(thoi_gian_thi_dau)'))
            ->orderBy('nam', 'asc')
            ->orderBy('thang', 'asc')
            ->get();

        $array_thang = [];
        $array_so_tran = [];

        foreach ($data as $row) {
            $array_thang[] = "T{$row->thang}/{$row->nam}";
            $array_so_tran[] = $row->so_tran_dau;
        }

        return response()->json([
            'status'        => 1,
            'message'       => 'Lấy dữ liệu thành công',
            'data'          => $data,
            'array_thang'   => $array_thang,
            'array_so_tran' => $array_so_tran
        ], 200);
    }

    // NHÓM 5 - CÂU 2: Thống kê tổng số ván thắng & số trận thi đấu của các đội
    public function nhom5Cau2(Request $request)
    {
        $tu_nam  = $request->input('tu_nam', 2020);
        $den_nam = $request->input('den_nam', 2026);

        $data = DoiTuyen::join('chi_tiet_tran_daus', 'doi_tuyens.id', '=', 'chi_tiet_tran_daus.id_doi_tuyen')
            ->select(
                'doi_tuyens.ten_doi_tuyen',
                DB::raw('COUNT(chi_tiet_tran_daus.id_tran_dau) as so_tran_thi_dau'),
                DB::raw('SUM(chi_tiet_tran_daus.diem_so_tran_dau) as tong_van_thang')
            )
            ->where('doi_tuyens.trang_thai', 1)
            ->whereRaw('YEAR(chi_tiet_tran_daus.created_at) >= ?', [$tu_nam])
            ->whereRaw('YEAR(chi_tiet_tran_daus.created_at) <= ?', [$den_nam])
            ->groupBy('doi_tuyens.id', 'doi_tuyens.ten_doi_tuyen')
            ->orderBy('tong_van_thang', 'desc')
            ->get();

        $array_doi = [];
        $array_so_tran = [];
        $array_van_thang = [];

        foreach ($data as $row) {
            $array_doi[] = $row->ten_doi_tuyen;
            $array_so_tran[] = $row->so_tran_thi_dau;
            $array_van_thang[] = (int)$row->tong_van_thang;
        }

        return response()->json([
            'status'           => 1,
            'message'          => 'Lấy dữ liệu thành công',
            'data'             => $data,
            'array_doi'        => $array_doi,
            'array_so_tran'    => $array_so_tran,
            'array_van_thang'  => $array_van_thang
        ], 200);
    }

    // ==========================================
    // NHÓM 6: THỐNG KÊ TIN TỨC & TRUYỀN THÔNG
    // ==========================================

    // NHÓM 6 - CÂU 1: Thống kê số lượng bài viết tin tức theo Tháng/Năm
    public function nhom6Cau1(Request $request)
    {
        $tu_ngay  = $request->input('tu_ngay', '2020-01-01');
        $den_ngay = $request->input('den_ngay', '2026-12-31');

        $data = TinTuc::select(
                DB::raw('YEAR(created_at) as nam'),
                DB::raw('MONTH(created_at) as thang'),
                DB::raw('COUNT(*) as so_bai_viet')
            )
            ->where('created_at', '>=', $tu_ngay . ' 00:00:00')
            ->where('created_at', '<=', $den_ngay . ' 23:59:59')
            ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
            ->orderBy('nam', 'asc')
            ->orderBy('thang', 'asc')
            ->get();

        $array_thang = [];
        $array_so_bai = [];

        foreach ($data as $row) {
            $array_thang[] = "T{$row->thang}/{$row->nam}";
            $array_so_bai[] = $row->so_bai_viet;
        }

        return response()->json([
            'status'       => 1,
            'message'      => 'Lấy dữ liệu thành công',
            'data'         => $data,
            'array_thang'  => $array_thang,
            'array_so_bai' => $array_so_bai
        ], 200);
    }

    // NHÓM 6 - CÂU 2: Thống kê số lượng bài viết tin tức theo Tựa Game
    public function nhom6Cau2(Request $request)
    {
        $tu_nam  = $request->input('tu_nam', 2020);
        $den_nam = $request->input('den_nam', 2026);

        $data = Game::join('tin_tucs', 'games.id', '=', 'tin_tucs.id_game')
            ->select(
                'games.ten_game',
                DB::raw('COUNT(tin_tucs.id) as so_luong_tin_tuc')
            )
            ->where('games.trang_thai', 1)
            ->whereRaw('YEAR(tin_tucs.created_at) >= ?', [$tu_nam])
            ->whereRaw('YEAR(tin_tucs.created_at) <= ?', [$den_nam])
            ->groupBy('games.id', 'games.ten_game')
            ->orderBy('so_luong_tin_tuc', 'desc')
            ->get();

        $array_game = [];
        $array_so_bai = [];

        foreach ($data as $row) {
            $array_game[] = $row->ten_game;
            $array_so_bai[] = $row->so_luong_tin_tuc;
        }

        return response()->json([
            'status'       => 1,
            'message'      => 'Lấy dữ liệu thành công',
            'data'         => $data,
            'array_game'   => $array_game,
            'array_so_bai' => $array_so_bai
        ], 200);
    }

    // ==========================================
    // NHÓM 7: THỐNG KÊ NGƯỜI DÙNG & CHỨC VỤ
    // ==========================================

    // NHÓM 7 - CÂU 1: Thống kê số lượng người dùng đăng ký mới theo Tháng/Năm
    public function nhom7Cau1(Request $request)
    {
        $tu_ngay  = $request->input('tu_ngay', '2020-01-01');
        $den_ngay = $request->input('den_ngay', '2026-12-31');

        $data = NguoiDung::select(
                DB::raw('YEAR(created_at) as nam'),
                DB::raw('MONTH(created_at) as thang'),
                DB::raw('COUNT(*) as so_tai_khoan_moi')
            )
            ->where('trang_thai', 1)
            ->where('created_at', '>=', $tu_ngay . ' 00:00:00')
            ->where('created_at', '<=', $den_ngay . ' 23:59:59')
            ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
            ->orderBy('nam', 'asc')
            ->orderBy('thang', 'asc')
            ->get();

        $array_thang = [];
        $array_so_tk = [];

        foreach ($data as $row) {
            $array_thang[] = "T{$row->thang}/{$row->nam}";
            $array_so_tk[] = $row->so_tai_khoan_moi;
        }

        return response()->json([
            'status'      => 1,
            'message'     => 'Lấy dữ liệu thành công',
            'data'        => $data,
            'array_thang' => $array_thang,
            'array_so_tk' => $array_so_tk
        ], 200);
    }

    // NHÓM 7 - CÂU 2: Thống kê số lượng người dùng theo Chức Vụ
    public function nhom7Cau2(Request $request)
    {
        $tu_nam  = $request->input('tu_nam', 2020);
        $den_nam = $request->input('den_nam', 2026);

        $data = ChucVu::join('nguoi_dungs', 'chuc_vus.id', '=', 'nguoi_dungs.id_chuc_vu')
            ->select(
                'chuc_vus.ten_chuc_vu',
                DB::raw('COUNT(nguoi_dungs.id) as so_luong_tai_khoan')
            )
            ->where('chuc_vus.trang_thai', 1)
            ->where('nguoi_dungs.trang_thai', 1)
            ->whereRaw('YEAR(nguoi_dungs.created_at) >= ?', [$tu_nam])
            ->whereRaw('YEAR(nguoi_dungs.created_at) <= ?', [$den_nam])
            ->groupBy('chuc_vus.id', 'chuc_vus.ten_chuc_vu')
            ->orderBy('so_luong_tai_khoan', 'desc')
            ->get();

        $array_chuc_vu = [];
        $array_so_tk = [];

        foreach ($data as $row) {
            $array_chuc_vu[] = $row->ten_chuc_vu;
            $array_so_tk[] = $row->so_luong_tai_khoan;
        }

        return response()->json([
            'status'        => 1,
            'message'       => 'Lấy dữ liệu thành công',
            'data'          => $data,
            'array_chuc_vu' => $array_chuc_vu,
            'array_so_tk'   => $array_so_tk
        ], 200);
    }
}
