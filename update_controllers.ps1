$controllers = @{
    'ChiTietTranDauController.php' = 'Lấy dữ liệu chi tiết trận đấu thành công'
    'ChucNangController.php'       = 'Lấy dữ liệu chức năng thành công'
    'ChucVuController.php'         = 'Lấy dữ liệu chức vụ thành công'
    'DoiTuyenController.php'       = 'Lấy dữ liệu đội tuyển thành công'
    'GameController.php'           = 'Lấy dữ liệu game thành công'
    'GiaiDauController.php'        = 'Lấy dữ liệu giải đấu thành công'
    'GiaiThuongController.php'     = 'Lấy dữ liệu giải thưởng thành công'
    'KetQuaGiaiDauController.php'  = 'Lấy dữ liệu kết quả giải đấu thành công'
    'NguoiDungController.php'      = 'Lấy dữ liệu người dùng thành công'
    'NhaTaiTroController.php'      = 'Lấy dữ liệu nhà tài trợ thành công'
    'PhanQuyenController.php'      = 'Lấy dữ liệu phân quyền thành công'
    'TaiTroGiaiDauController.php'  = 'Lấy dữ liệu tài trợ giải đấu thành công'
    'TheLoaiController.php'        = 'Lấy dữ liệu thể loại thành công'
    'ThongSoDoiTuyenController.php'= 'Lấy dữ liệu thống số đội tuyển thành công'
    'ThongSoTuyenThuController.php'= 'Lấy dữ liệu thống kê tuyển thủ thành công'
    'TinTucController.php'         = 'Lấy dữ liệu tin tức thành công'
    'TranDauDoiController.php'     = 'Lấy dữ liệu trận đấu thành công'
    'TuyenThuController.php'       = 'Lấy dữ liệu tuyển thủ thành công'
    'VongDauController.php'        = 'Lấy dữ liệu vòng đấu thành công'
}

$oldBlock = "        return response()->json([`r`n            'data' => `$data`r`n        ]);"
$oldBlockLF = "        return response()->json([`n            'data' => `$data`n        ]);"

foreach ($fileName in $controllers.Keys) {
    $msg = $controllers[$fileName]
    $newBlock = "        return response()->json([`r`n            'status' => 1,`r`n            'message' => '$msg',`r`n            'data' => `$data`r`n        ]);"

    # Update testBe_K27
    $path1 = "C:\xampp\htdocs\TestCodeK27\testBe_K27\app\Http\Controllers\$fileName"
    if (Test-Path $path1) {
        $content = [System.IO.File]::ReadAllText($path1)
        if ($content -match [regex]::Escape("'data' => `$data")) {
            $newBlockLF = "        return response()->json([`n            'status' => 1,`n            'message' => '$msg',`n            'data' => `$data`n        ]);"
            $content = $content -replace [regex]::Escape($oldBlock), $newBlock
            $content = $content -replace [regex]::Escape($oldBlockLF), $newBlockLF
            [System.IO.File]::WriteAllText($path1, $content, [System.Text.Encoding]::UTF8)
            Write-Host "testBe_K27 - Updated: $fileName"
        }
    }

    # Update Be_K27_Esport
    $path2 = "C:\xampp\htdocs\CodeChinhK27\Be_K27_Esport\app\Http\Controllers\$fileName"
    if (Test-Path $path2) {
        $content = [System.IO.File]::ReadAllText($path2)
        if ($content -match [regex]::Escape("'data' => `$data")) {
            $newBlockLF = "        return response()->json([`n            'status' => 1,`n            'message' => '$msg',`n            'data' => `$data`n        ]);"
            $content = $content -replace [regex]::Escape($oldBlock), $newBlock
            $content = $content -replace [regex]::Escape($oldBlockLF), $newBlockLF
            [System.IO.File]::WriteAllText($path2, $content, [System.Text.Encoding]::UTF8)
            Write-Host "Be_K27_Esport - Updated: $fileName"
        }
    }
}

Write-Host "`nDONE!"
