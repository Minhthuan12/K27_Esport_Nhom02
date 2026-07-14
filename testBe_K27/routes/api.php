<?php

use App\Http\Controllers\DoiTuyenController;
use App\Http\Controllers\TuyenThuController;
use App\Http\Controllers\ThongSoDoiTuyenController;
use App\Http\Controllers\ThongSoTuyenThuController;
use App\Http\Controllers\NguoiDungController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GiaiDauController;
use App\Http\Controllers\VongDauController;
use App\Http\Controllers\TranDauDoiController;
use App\Http\Controllers\KetQuaGiaiDauController;
use App\Http\Controllers\GiaiThuongController;
use App\Http\Controllers\NhaTaiTroController;
use App\Http\Controllers\TaiTroGiaiDauController;
use App\Http\Controllers\TinTucController;
use App\Http\Controllers\TheLoaiController;
use App\Http\Controllers\ChucVuController;
use App\Http\Controllers\ChiTietTranDauController;
use App\Http\Controllers\ChucNangController;
use App\Http\Controllers\PhanQuyenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('admin')->group(function () {

    Route::prefix('nguoi-dung')->group(function () {
        Route::get('/get-data', [NguoiDungController::class, 'getData']);
    });

    Route::prefix('doi-tuyen')->group(function () {
        Route::get('/get-data', [DoiTuyenController::class, 'getData']);
    });

    Route::prefix('tuyen-thu')->group(function () {
        Route::get('/get-data', [TuyenThuController::class, 'getData']);
    });

    Route::prefix('thong-so-tuyen-thu')->group(function () {
        Route::get('/get-data', [ThongSoTuyenThuController::class, 'getData']);
    });

    Route::prefix('thong-so-doi-tuyen')->group(function () {
        Route::get('/get-data', [ThongSoDoiTuyenController::class, 'getData']);
    });

    Route::prefix('giai-dau')->group(function () {
        Route::get('/get-data', [GiaiDauController::class, 'getData']);
    });

    Route::prefix('vong-dau')->group(function () {
        Route::get('/get-data', [VongDauController::class, 'getData']);
    });

    Route::prefix('tran-dau')->group(function () {
        Route::get('/get-data', [TranDauDoiController::class, 'getData']);
    });

    Route::prefix('chi-tiet-tran-dau')->group(function () {
        Route::get('/get-data', [ChiTietTranDauController::class, 'getData']);
    });

    Route::prefix('ket-qua-giai-dau')->group(function () {
        Route::get('/get-data', [KetQuaGiaiDauController::class, 'getData']);
    });

    Route::prefix('nha-tai-tro')->group(function () {
        Route::get('/get-data', [NhaTaiTroController::class, 'getData']);
    });

    Route::prefix('tai-tro-giai-dau')->group(function () {
        Route::get('/get-data', [TaiTroGiaiDauController::class, 'getData']);
    });

    Route::prefix('giai-thuong')->group(function () {
        Route::get('/get-data', [GiaiThuongController::class, 'getData']);
    });

    Route::prefix('game')->group(function () {
        Route::get('/get-data', [GameController::class, 'getData']);
    });

    Route::prefix('the-loai')->group(function () {
        Route::get('/get-data', [TheLoaiController::class, 'getData']);
    });

    Route::prefix('tin-tuc')->group(function () {
        Route::get('/get-data', [TinTucController::class, 'getData']);
    });

    Route::prefix('chuc-vu')->group(function () {
        Route::get('/get-data', [ChucVuController::class, 'getData']);
    });

    Route::prefix('chuc-nang')->group(function () {
        Route::get('/get-data', [ChucNangController::class, 'getData']);
    });

    Route::prefix('phan-quyen')->group(function () {
        Route::get('/get-data', [PhanQuyenController::class, 'getData']);
    });

});