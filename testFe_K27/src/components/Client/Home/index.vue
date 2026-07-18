<template>
    <div class="bg-light min-vh-100">
        <!-- TOPBAR / NAVBAR -->
        <nav class="navbar navbar-expand-lg bg-white border-bottom py-2 px-3 shadow-sm sticky-top">
            <div class="container-fluid">
                <!-- Logo -->
                <a class="navbar-brand fw-bold fs-4 text-primary me-4 d-flex align-items-center" href="#">
                    <i class="bx bx-joystick text-primary me-1 fs-3"></i>Rocker
                </a>

                <!-- Search Input -->
                <div class="d-none d-md-flex me-auto" style="width: 320px;">
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0">
                            <i class="bx bx-search text-muted"></i>
                        </span>
                        <input type="text" class="form-control bg-light border-start-0 ps-0" placeholder="Tìm kiếm giải đấu, đội tuyển...">
                    </div>
                </div>

                <!-- Navigation Links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-none d-lg-flex flex-row gap-4">
                    <li class="nav-item">
                        <a class="nav-link fw-bold text-primary border-bottom border-primary border-2 pb-1" href="#">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary fw-semibold" href="#">Teams</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary fw-semibold" href="#">Tournaments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary fw-semibold" href="#">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary fw-semibold" href="#">Games</a>
                    </li>
                </ul>

                <!-- Action Icons & User Profile -->
                <div class="d-flex align-items-center gap-3 ms-auto">
                    <button class="btn btn-light rounded-circle p-2 text-secondary border-0 d-flex align-items-center justify-content-center">
                        <i class="bx bx-grid-alt fs-5"></i>
                    </button>
                    
                    <div class="position-relative">
                        <button class="btn btn-light rounded-circle p-2 text-secondary border-0 d-flex align-items-center justify-content-center">
                            <i class="bx bx-bell fs-5"></i>
                        </button>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger border border-white" style="font-size: 10px;">2</span>
                    </div>

                    <div class="position-relative">
                        <button class="btn btn-light rounded-circle p-2 text-secondary border-0 d-flex align-items-center justify-content-center">
                            <i class="bx bx-message-rounded-dots fs-5"></i>
                        </button>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger border border-white" style="font-size: 10px;">4</span>
                    </div>

                    <div class="vr my-2"></div>

                    <!-- User Info -->
                    <div class="d-flex align-items-center gap-2">
                        <div class="text-end d-none d-sm-block">
                            <div class="fw-bold fs-6 lh-1 text-dark">Pauline Seitz</div>
                            <small class="text-muted text-uppercase" style="font-size: 10px;">WEB DESIGNER</small>
                        </div>
                        <img src="https://i.pravatar.cc/150?u=pauline" class="rounded-circle border border-2 border-primary" width="38" height="38" alt="Avatar">
                    </div>
                </div>
            </div>
        </nav>

        <!-- MAIN CONTAINER -->
        <div class="container-fluid px-3 px-lg-5 my-4">
            
            <!-- HERO BANNER SECTION -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0 rounded-4 overflow-hidden shadow-sm bg-dark">
                        <img src="../../../assets/images/banner_trophy.png" class="w-100 object-fit-cover" style="height: 380px;" alt="Banner Trophy">
                    </div>
                </div>
            </div>

            <!-- SECTION 1: TIN TỨC MỚI NHẤT -->
            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold text-dark mb-0 d-flex align-items-center">
                        <i class="bx bx-news text-primary me-2 fs-4"></i>Tin Tức Mới Nhất
                    </h5>
                    <a href="#" class="text-primary fw-bold small text-decoration-none">Xem Tất Cả</a>
                </div>

                <div class="row g-3">
                    <!-- News Item 1 -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&w=600" class="card-img-top object-fit-cover" style="height: 160px;" alt="News 1">
                            <div class="card-body p-3">
                                <span class="badge bg-light text-primary border border-primary-subtle fw-medium mb-2">Cập Nhật Game</span>
                                <h6 class="card-title fw-bold text-dark text-truncate-2 mb-2">Lộ diện bản cập nhật v2.4: Thay đổi hoàn toàn meta hiện tại</h6>
                                <p class="card-text text-muted small text-truncate-2 mb-0">Những thay đổi quan trọng về tướng và bản đồ sẽ ảnh hưởng lớn đến các giải...</p>
                            </div>
                        </div>
                    </div>

                    <!-- News Item 2 -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1511512578047-dfb367046420?auto=format&fit=crop&w=600" class="card-img-top object-fit-cover" style="height: 160px;" alt="News 2">
                            <div class="card-body p-3">
                                <span class="badge bg-light text-primary border border-primary-subtle fw-medium mb-2">Chuyển Nhượng</span>
                                <h6 class="card-title fw-bold text-dark text-truncate-2 mb-2">Siêu sao 'Dragon' chính thức gia nhập đội tuyển Rocker Team</h6>
                                <p class="card-text text-muted small text-truncate-2 mb-0">Bản hợp đồng kỷ lục đã được ký kết, hứa hẹn một mùa giải bùng nổ cho đội...</p>
                            </div>
                        </div>
                    </div>

                    <!-- News Item 3 -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1538481199705-c710c4e965fc?auto=format&fit=crop&w=600" class="card-img-top object-fit-cover" style="height: 160px;" alt="News 3">
                            <div class="card-body p-3">
                                <span class="badge bg-light text-primary border border-primary-subtle fw-medium mb-2">Sự Kiện</span>
                                <h6 class="card-title fw-bold text-dark text-truncate-2 mb-2">Vé xem chung kết Championship 2024 đã được bán sạch chỉ sau ...</h6>
                                <p class="card-text text-muted small text-truncate-2 mb-0">Sức nóng của giải đấu năm nay vượt xa dự kiến của ban tổ chức...</p>
                            </div>
                        </div>
                    </div>

                    <!-- News Item 4 -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1615663245857-ac93bb7c39e7?auto=format&fit=crop&w=600" class="card-img-top object-fit-cover" style="height: 160px;" alt="News 4">
                            <div class="card-body p-3">
                                <span class="badge bg-light text-primary border border-primary-subtle fw-medium mb-2">Phần Cứng</span>
                                <h6 class="card-title fw-bold text-dark text-truncate-2 mb-2">Đánh giá chuột gaming mới nhất dành cho game thủ chuyên nghiệp</h6>
                                <p class="card-text text-muted small text-truncate-2 mb-0">Công nghệ cảm biến mới giúp tăng độ chính xác lên đến 99% trong các trận...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SECTION 2: GIẢI ĐẤU ĐANG DIỄN RA -->
            <div class="mb-4">
                <h5 class="fw-bold text-dark mb-3 d-flex align-items-center">
                    <i class="bx bx-trophy text-primary me-2 fs-4"></i>Giải Đấu Đang Diễn Ra
                </h5>

                <div class="row g-3">
                    <!-- Tournament Card 1 -->
                    <div class="col-12 col-md-4">
                        <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="bg-primary-subtle text-primary p-2 rounded-3">
                                        <i class="bx bx-shield-alt-2 fs-3"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold text-dark mb-0">Valor Pro Series S3</h6>
                                        <small class="text-muted">Bắt đầu: 15/05/2024</small>
                                    </div>
                                </div>
                                <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill">Đang diễn ra</span>
                            </div>

                            <div class="bg-light p-2 rounded-2 d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <small class="text-muted d-block" style="font-size: 11px;">Số đội tham gia:</small>
                                    <span class="fw-bold text-dark">16 Đội</span>
                                </div>
                                <div class="text-end">
                                    <small class="text-muted d-block" style="font-size: 11px;">Giải thưởng:</small>
                                    <span class="fw-bold text-primary">500,000,000 VNĐ</span>
                                </div>
                            </div>

                            <button class="btn btn-primary w-100 fw-bold shadow-sm">Xem Chi Tiết</button>
                        </div>
                    </div>

                    <!-- Tournament Card 2 -->
                    <div class="col-12 col-md-4">
                        <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="bg-primary-subtle text-primary p-2 rounded-3">
                                        <i class="bx bx-crown fs-3"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold text-dark mb-0">Dota Masters Spring</h6>
                                        <small class="text-muted">Bắt đầu: 01/06/2024</small>
                                    </div>
                                </div>
                                <span class="badge bg-info-subtle text-primary border border-info-subtle rounded-pill">Sắp diễn ra</span>
                            </div>

                            <div class="bg-light p-2 rounded-2 d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <small class="text-muted d-block" style="font-size: 11px;">Số đội tham gia:</small>
                                    <span class="fw-bold text-dark">12 Đội</span>
                                </div>
                                <div class="text-end">
                                    <small class="text-muted d-block" style="font-size: 11px;">Giải thưởng:</small>
                                    <span class="fw-bold text-primary">300,000,000 VNĐ</span>
                                </div>
                            </div>

                            <button class="btn btn-light text-muted border w-100 fw-medium">Đăng Ký Tham Gia</button>
                        </div>
                    </div>

                    <!-- Tournament Card 3 -->
                    <div class="col-12 col-md-4">
                        <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="bg-primary-subtle text-primary p-2 rounded-3">
                                        <i class="bx bx-game fs-3"></i>
                                    </div>
                                    <div>
                                        <h6 class="fw-bold text-dark mb-0">Cyber League 2024</h6>
                                        <small class="text-muted">Bắt đầu: 20/05/2024</small>
                                    </div>
                                </div>
                                <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill">Đang diễn ra</span>
                            </div>

                            <div class="bg-light p-2 rounded-2 d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <small class="text-muted d-block" style="font-size: 11px;">Số đội tham gia:</small>
                                    <span class="fw-bold text-dark">32 Đội</span>
                                </div>
                                <div class="text-end">
                                    <small class="text-muted d-block" style="font-size: 11px;">Giải thưởng:</small>
                                    <span class="fw-bold text-primary">200,000,000 VNĐ</span>
                                </div>
                            </div>

                            <button class="btn btn-primary w-100 fw-bold shadow-sm">Xem Chi Tiết</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SECTION 3: TRẬN ĐẤU SẮP TỚI & BẢNG XẾP HẠNG -->
            <div class="row g-4">
                <!-- Left Column: Trận Đấu Sắp Tới -->
                <div class="col-12 col-lg-7">
                    <h5 class="fw-bold text-dark mb-3 d-flex align-items-center">
                        <i class="bx bx-joystick-alt text-primary me-2 fs-4"></i>Trận Đấu Sắp Tới
                    </h5>

                    <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                        <div class="bg-primary text-white py-2 px-3 fw-bold small">
                            Hôm nay - 24/05/2024
                        </div>

                        <div class="p-3 d-flex flex-column gap-3">
                            <!-- Match 1 -->
                            <div class="d-flex align-items-center justify-content-between bg-light p-2 rounded-3 border">
                                <span class="fw-semibold text-secondary small me-2">18:00</span>
                                
                                <div class="d-flex align-items-center justify-content-center gap-2 flex-grow-1">
                                    <span class="fw-bold text-dark small text-end" style="width: 110px;">Rocker Team</span>
                                    <span class="badge bg-white text-dark border rounded-circle p-2 shadow-xs">VS</span>
                                    <span class="fw-bold text-dark small text-start" style="width: 110px;">Dragon Clan</span>
                                </div>

                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge bg-light text-secondary border">Bán kết</span>
                                    <button class="btn btn-white btn-sm rounded-circle p-1 text-secondary border-0">
                                        <i class="bx bx-bell fs-5"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Match 2 -->
                            <div class="d-flex align-items-center justify-content-between bg-light p-2 rounded-3 border">
                                <span class="fw-semibold text-secondary small me-2">20:30</span>
                                
                                <div class="d-flex align-items-center justify-content-center gap-2 flex-grow-1">
                                    <span class="fw-bold text-dark small text-end" style="width: 110px;">Phoenix G</span>
                                    <span class="badge bg-white text-dark border rounded-circle p-2 shadow-xs">VS</span>
                                    <span class="fw-bold text-dark small text-start" style="width: 110px;">Team Shadow</span>
                                </div>

                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge bg-light text-secondary border">Bảng A</span>
                                    <button class="btn btn-white btn-sm rounded-circle p-1 text-secondary border-0">
                                        <i class="bx bx-bell fs-5"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Match 3 -->
                            <div class="d-flex align-items-center justify-content-between bg-light p-2 rounded-3 border">
                                <span class="fw-semibold text-secondary small me-2">22:00</span>
                                
                                <div class="d-flex align-items-center justify-content-center gap-2 flex-grow-1">
                                    <span class="fw-bold text-dark small text-end" style="width: 110px;">Apex Stars</span>
                                    <span class="badge bg-white text-dark border rounded-circle p-2 shadow-xs">VS</span>
                                    <span class="fw-bold text-dark small text-start" style="width: 110px;">Nova Esports</span>
                                </div>

                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill">Trực tiếp</span>
                                    <button class="btn btn-primary btn-sm px-3 fw-bold shadow-sm">Xem Ngay</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Bảng Xếp Hạng Đội Tuyển -->
                <div class="col-12 col-lg-5">
                    <h5 class="fw-bold text-dark mb-3 d-flex align-items-center">
                        <i class="bx bx-bar-chart-alt-2 text-primary me-2 fs-4"></i>Bảng Xếp Hạng Đội Tuyển
                    </h5>

                    <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0 align-middle">
                                <thead class="table-primary text-white">
                                    <tr>
                                        <th class="ps-3">#</th>
                                        <th>Đội Tuyển</th>
                                        <th class="text-center">W-L</th>
                                        <th class="text-end pe-3">Điểm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-active">
                                        <td class="ps-3 fw-bold text-primary">01</td>
                                        <td class="fw-bold text-dark">Rocker Team</td>
                                        <td class="text-center fw-semibold">12 - 2</td>
                                        <td class="text-end pe-3 fw-bold text-primary">360</td>
                                    </tr>
                                    <tr>
                                        <td class="ps-3 fw-bold text-secondary">02</td>
                                        <td class="fw-bold text-dark">Phoenix Gaming</td>
                                        <td class="text-center fw-semibold">10 - 4</td>
                                        <td class="text-end pe-3 fw-bold text-primary">310</td>
                                    </tr>
                                    <tr>
                                        <td class="ps-3 fw-bold text-secondary">03</td>
                                        <td class="fw-bold text-dark">Dragon Clan</td>
                                        <td class="text-center fw-semibold">9 - 5</td>
                                        <td class="text-end pe-3 fw-bold text-primary">285</td>
                                    </tr>
                                    <tr>
                                        <td class="ps-3 fw-bold text-secondary">04</td>
                                        <td class="fw-bold text-dark">Apex Stars</td>
                                        <td class="text-center fw-semibold">8 - 6</td>
                                        <td class="text-end pe-3 fw-bold text-primary">240</td>
                                    </tr>
                                    <tr>
                                        <td class="ps-3 fw-bold text-secondary">05</td>
                                        <td class="fw-bold text-dark">Team Shadow</td>
                                        <td class="text-center fw-semibold">7 - 7</td>
                                        <td class="text-end pe-3 fw-bold text-primary">210</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <a href="#" class="text-center py-2 bg-light border-top text-primary fw-bold text-decoration-none small d-block">
                            Xem Toàn Bộ Bảng Xếp Hạng
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <!-- FOOTER -->
        <footer class="bg-white border-top mt-5 pt-5 pb-3">
            <div class="container-fluid px-3 px-lg-5">
                <div class="row g-4 mb-4">
                    <!-- Col 1: About -->
                    <div class="col-12 col-md-4">
                        <a class="fw-bold fs-4 text-primary me-4 d-flex align-items-center mb-2 text-decoration-none" href="#">
                            <i class="bx bx-joystick text-primary me-1 fs-3"></i>Rocker
                        </a>
                        <p class="text-muted small mb-0" style="line-height: 1.6;">
                            Nền tảng quản lý và theo dõi giải đấu eSports hàng đầu thế giới, mang đến trải nghiệm chuyên nghiệp cho cộng đồng game thủ.
                        </p>
                    </div>

                    <!-- Col 2: Quick Links -->
                    <div class="col-6 col-md-3">
                        <h6 class="fw-bold text-dark text-uppercase fs-6 mb-3">Quick Links</h6>
                        <ul class="list-unstyled small d-flex flex-column gap-2 mb-0">
                            <li><a href="#" class="text-secondary text-decoration-none">About Us</a></li>
                            <li><a href="#" class="text-secondary text-decoration-none">Contact</a></li>
                            <li><a href="#" class="text-secondary text-decoration-none">Privacy Policy</a></li>
                            <li><a href="#" class="text-secondary text-decoration-none">Terms of Service</a></li>
                        </ul>
                    </div>

                    <!-- Col 3: Community -->
                    <div class="col-6 col-md-2">
                        <h6 class="fw-bold text-dark text-uppercase fs-6 mb-3">Cộng Đồng</h6>
                        <div class="d-flex gap-3 fs-4 text-primary">
                            <a href="#" class="text-primary"><i class="bx bxl-discord"></i></a>
                            <a href="#" class="text-primary"><i class="bx bxl-youtube"></i></a>
                            <a href="#" class="text-primary"><i class="bx bxl-facebook-circle"></i></a>
                        </div>
                    </div>

                    <!-- Col 4: Newsletter -->
                    <div class="col-12 col-md-3">
                        <h6 class="fw-bold text-dark text-uppercase fs-6 mb-3">Đăng Ký Nhận Tin</h6>
                        <div class="input-group">
                            <input type="email" class="form-control bg-light" placeholder="Email của bạn">
                            <button class="btn btn-primary fw-bold px-3">Gửi</button>
                        </div>
                    </div>
                </div>

                <div class="border-top pt-3 text-muted small d-flex flex-wrap justify-content-between align-items-center">
                    <div>Copyright © 2021. All right reserved.</div>
                    <div class="d-flex gap-4">
                        <span>Language: <strong>Tiếng Việt</strong></span>
                        <span>Region: <strong>Việt Nam</strong></span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<script>
export default {
    name: 'ClientHome'
}
</script>
