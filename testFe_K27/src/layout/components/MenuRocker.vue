<template>
    <div class="nav-container primary-menu">
        <div class="mobile-topbar-header">
            <div>
                <img src="../../assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
            </div>
            <div>
                <h4 class="logo-text">Rukada</h4>
            </div>
            <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
            </div>
        </div>
        <nav class="navbar navbar-expand-xl w-100">
            <ul class="navbar-nav justify-content-start flex-grow-1 gap-1">
                <!-- 1. NGƯỜI DÙNG (Để riêng đầu tiên) -->
                <li class="nav-item">
                    <a class="nav-link" href="/nguoi-dung">
                        <div class="parent-icon"><i class='bx bx-user'></i>
                        </div>
                        <div class="menu-title">Người dùng</div>
                    </a>
                </li>

                <!-- 2. ĐỘI TUYỂN (Dropdown) -->
                <li class="nav-item dropdown">
                    <a href="javascript:;" class="nav-link dropdown-toggle dropdown-toggle-nocaret"
                        data-bs-toggle="dropdown">
                        <div class="parent-icon"><i class='bx bx-group'></i>
                        </div>
                        <div class="menu-title">Đội tuyển</div>
                    </a>
                    <ul class="dropdown-menu">
                        <li> <a class="dropdown-item" href="/doituyen"><i
                                    class="bx bx-right-arrow-alt"></i>Đội tuyển</a>
                        </li>
                        <li> <a class="dropdown-item" href="/tuyen-thu"><i
                                    class="bx bx-right-arrow-alt"></i>Tuyển thủ</a>
                        </li>
                        <li> <a class="dropdown-item" href="/thong-ke-tuyen-thu"><i
                                    class="bx bx-right-arrow-alt"></i>Thống kê tuyển thủ</a>
                        </li>
                        <li> <a class="dropdown-item" href="/thong-ke-doi-tuyen"><i
                                    class="bx bx-right-arrow-alt"></i>Thống kê đội tuyển</a>
                        </li>
                    </ul>
                </li>
                
                <!-- 3. GIẢI ĐẤU & TRẬN ĐẤU (Dropdown) -->
                <li class="nav-item dropdown">
                    <a href="javascript:;" class="nav-link dropdown-toggle dropdown-toggle-nocaret"
                        data-bs-toggle="dropdown">
                        <div class="parent-icon"><i class='bx bx-trophy'></i>
                        </div>
                        <div class="menu-title">Giải đấu & Trận đấu</div>
                    </a>
                    <ul class="dropdown-menu">
                        <li> <a class="dropdown-item" href="/giai-dau"><i
                                    class="bx bx-right-arrow-alt"></i>Giải đấu</a>
                        </li>
                        <li> <a class="dropdown-item" href="/vong-dau"><i
                                    class="bx bx-right-arrow-alt"></i>Vòng đấu</a>
                        </li>
                        <li> <a class="dropdown-item" href="/tran-dau"><i
                                    class="bx bx-right-arrow-alt"></i>Trận đấu</a>
                        </li>
                        <li> <a class="dropdown-item" href="/ket-qua-giai-dau"><i
                                    class="bx bx-right-arrow-alt"></i>Kết quả giải đấu</a>
                        </li>
                        <li> <a class="dropdown-item" href="/chi-tiet-tran-dau"><i
                                    class="bx bx-right-arrow-alt"></i>Chi tiết trận đấu</a>
                        </li>
                    </ul>
                </li>

                <!-- 4. NHÀ TÀI TRỢ & GIẢI THƯỞNG (Dropdown) -->
                <li class="nav-item dropdown">
                    <a href="javascript:;" class="nav-link dropdown-toggle dropdown-toggle-nocaret"
                        data-bs-toggle="dropdown">
                        <div class="parent-icon"><i class='bx bx-dollar-circle'></i>
                        </div>
                        <div class="menu-title">Nhà tài trợ & Giải thưởng</div>
                    </a>
                    <ul class="dropdown-menu">
                        <li> <a class="dropdown-item" href="/nha-tai-tro"><i
                                    class="bx bx-right-arrow-alt"></i>Nhà tài trợ</a>
                        </li>
                        <li> <a class="dropdown-item" href="/tai-tro-giai-dau"><i
                                    class="bx bx-right-arrow-alt"></i>Tài trợ giải đấu</a>
                        </li>
                        <li> <a class="dropdown-item" href="/giai-thuong"><i
                                    class="bx bx-right-arrow-alt"></i>Giải thưởng</a>
                        </li>
                    </ul>
                </li>

                <!-- 5. GAME (Dropdown) -->
                <li class="nav-item dropdown">
                    <a href="javascript:;" class="nav-link dropdown-toggle dropdown-toggle-nocaret"
                        data-bs-toggle="dropdown">
                        <div class="parent-icon"><i class='bx bx-game'></i>
                        </div>
                        <div class="menu-title">Game</div>
                    </a>
                    <ul class="dropdown-menu">
                        <li> <a class="dropdown-item" href="/the-loai"><i
                                    class="bx bx-right-arrow-alt"></i>Thể loại</a>
                        </li>
                        <li> <a class="dropdown-item" href="/game"><i
                                    class="bx bx-right-arrow-alt"></i>Trò chơi (Games)</a>
                        </li>
                    </ul>
                </li>

                <!-- 6. PHÂN QUYỀN (Dropdown) -->
                <li class="nav-item dropdown">
                    <a href="javascript:;" class="nav-link dropdown-toggle dropdown-toggle-nocaret"
                        data-bs-toggle="dropdown">
                        <div class="parent-icon"><i class='bx bx-key'></i>
                        </div>
                        <div class="menu-title">Phân quyền</div>
                    </a>
                    <ul class="dropdown-menu">
                        <li> <a class="dropdown-item" href="/chuc-vu"><i
                                    class="bx bx-right-arrow-alt"></i>Chức vụ</a>
                        </li>
                        <li> <a class="dropdown-item" href="/chuc-nang"><i
                                    class="bx bx-right-arrow-alt"></i>Chức năng</a>
                        </li>
                        <li> <a class="dropdown-item" href="/phan-quyen"><i
                                    class="bx bx-right-arrow-alt"></i>Phân quyền</a>
                        </li>
                    </ul>
                </li>

                <!-- 7. TIN TỨC (Để riêng cuối cùng) -->
                <li class="nav-item">
                    <a class="nav-link" href="/tin-tuc">
                        <div class="parent-icon"><i class='bx bx-news'></i>
                        </div>
                        <div class="menu-title">Tin tức</div>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
export default {

}
</script>

<style></style>