$dirs = @(
    "C:\xampp\htdocs\TestCodeK27\testBe_K27\app\Http\Controllers",
    "C:\xampp\htdocs\CodeChinhK27\Be_K27_Esport\app\Http\Controllers"
)

$messages = @{
    "ChucVuController.php"          = "L" + [char]0x1ea5 + "y d" + [char]0x1eef + " li" + [char]0x1ec7 + "u ch" + [char]0x1ee9 + "c v" + [char]0x1ee5 + " th" + [char]0xe0 + "nh c" + [char]0xf4 + "ng"
    "ChucNangController.php"        = "L" + [char]0x1ea5 + "y d" + [char]0x1eef + " li" + [char]0x1ec7 + "u ch" + [char]0x1ee9 + "c n" + [char]0x0103 + "ng th" + [char]0xe0 + "nh c" + [char]0xf4 + "ng"
}

foreach ($dir in $dirs) {
    foreach ($file in $messages.Keys) {
        $path = "$dir\$file"
        if (Test-Path $path) {
            $content = [System.IO.File]::ReadAllText($path, [System.Text.Encoding]::UTF8)
            Write-Host "Found: $path"
        }
    }
}
