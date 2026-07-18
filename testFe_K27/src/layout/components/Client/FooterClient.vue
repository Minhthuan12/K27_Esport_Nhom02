<template>
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
</template>

<script>
export default {
    name: 'FooterClient'
}
</script>

<style scoped></style>
