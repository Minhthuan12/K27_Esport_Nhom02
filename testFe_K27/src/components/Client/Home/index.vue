<template>
    <div class="container-fluid px-3 px-lg-5 pt-2 mt-0 mb-4">
        <!-- HERO BANNER SECTION -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 rounded-4 overflow-hidden shadow-sm bg-dark">
                    <img src="../../../assets/images/banner_trophy.png" class="w-100 object-fit-cover" style="height: 380px;" alt="Banner Trophy">
                </div>
            </div>
        </div>

        <!-- SECTION 1: TIN TỨC MỚI NHẤT (DỮ LIỆU THỰC TỪ BACKEND BE) -->
        <div class="mb-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold text-dark mb-0 d-flex align-items-center">
                    <i class="bx bx-news text-primary me-2 fs-4"></i>Tin Tức Mới Nhất
                </h5>
                <a href="#" class="text-primary fw-bold small text-decoration-none">Xem Tất Cả</a>
            </div>

            <div class="row g-3">
                <div v-for="(news, index) in list_tin_tuc" :key="index" class="col-12 col-sm-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden">
                        <img :src="newsImages[index % newsImages.length]" class="card-img-top object-fit-cover" style="height: 160px;" alt="News thumbnail">
                        <div class="card-body p-3">
                            <span class="badge bg-light text-primary border border-primary-subtle fw-medium mb-2">
                                {{ news.ten_game || 'eSports' }}
                            </span>
                            <h6 class="card-title fw-bold text-dark text-truncate-2 mb-2" :title="news.tieu_de">
                                {{ news.tieu_de }}
                            </h6>
                            <p class="card-text text-muted small text-truncate-2 mb-0">
                                {{ news.noi_dung }}
                            </p>
                        </div>
                    </div>
                </div>

                <div v-if="is_loading" class="col-12 text-center text-muted py-4">
                    <i class="bx bx-loader-alt bx-spin fs-2 text-primary d-block mb-2"></i>
                    Đang tải dữ liệu tin tức từ Backend...
                </div>
            </div>
        </div>

        <!-- SECTION 2: GIẢI ĐẤU ĐANG DIỄN RA (DỮ LIỆU THỰC TỪ BACKEND BE) -->
        <div class="mb-4">
            <h5 class="fw-bold text-dark mb-3 d-flex align-items-center">
                <i class="bx bx-trophy text-primary me-2 fs-4"></i>Giải Đấu Đang Diễn Ra
            </h5>

            <div class="row g-3">
                <div v-for="(giai, index) in list_giai_dau" :key="index" class="col-12 col-md-4">
                    <div class="card border-0 shadow-sm rounded-3 p-3 h-100">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <div class="bg-primary-subtle text-primary p-2 rounded-3">
                                    <i class="bx bx-shield-alt-2 fs-3"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-dark mb-0 text-truncate" style="max-width: 170px;" :title="giai.ten_giai_dau">
                                        {{ giai.ten_giai_dau }}
                                    </h6>
                                    <small class="text-muted">Bắt đầu: {{ formatDate(giai.ngay_bat_dau) }}</small>
                                </div>
                            </div>
                            <span v-if="giai.trang_thai == 1" class="badge bg-success-subtle text-success border border-success-subtle rounded-pill">Đang diễn ra</span>
                            <span v-else class="badge bg-info-subtle text-primary border border-info-subtle rounded-pill">Sắp diễn ra</span>
                        </div>

                        <div class="bg-light p-2 rounded-2 d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <small class="text-muted d-block" style="font-size: 11px;">Số đội tham gia:</small>
                                <span class="fw-bold text-dark">{{ giai.so_luong_doi || 16 }} Đội</span>
                            </div>
                            <div class="text-end">
                                <small class="text-muted d-block" style="font-size: 11px;">Tựa game:</small>
                                <span class="fw-bold text-primary">{{ giai.ten_game || 'eSports' }}</span>
                            </div>
                        </div>

                        <button v-if="giai.trang_thai == 1" class="btn btn-primary w-100 fw-bold shadow-sm">Xem Chi Tiết</button>
                        <button v-else class="btn btn-light text-muted border w-100 fw-medium">Đăng Ký Tham Gia</button>
                    </div>
                </div>

                <div v-if="is_loading" class="col-12 text-center text-muted py-4">
                    <i class="bx bx-loader-alt bx-spin fs-2 text-primary d-block mb-2"></i>
                    Đang tải dữ liệu giải đấu từ Backend...
                </div>
            </div>
        </div>

        <!-- SECTION 3: TRẬN ĐẤU SẮP TỚI & BẢNG XẾP HẠNG (DỮ LIỆU THỰC TỪ BACKEND BE) -->
        <div class="row g-4">
            <!-- Left Column: Trận Đấu Sắp Tới -->
            <div class="col-12 col-lg-7">
                <h5 class="fw-bold text-dark mb-3 d-flex align-items-center">
                    <i class="bx bx-joystick-alt text-primary me-2 fs-4"></i>Trận Đấu Sắp Tới
                </h5>

                <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                    <div class="bg-primary text-white py-2 px-3 fw-bold small d-flex justify-content-between align-items-center">
                        <span>Lịch Thi Đấu Đỉnh Cao</span>
                        <span>{{ currentDate }}</span>
                    </div>

                    <div class="p-3 d-flex flex-column gap-3">
                        <div v-for="(tran, index) in list_tran_dau" :key="index" class="d-flex align-items-center justify-content-between bg-light p-2 rounded-3 border">
                            <span class="fw-semibold text-secondary small me-2">{{ formatTime(tran.thoi_gian_thi_dau) }}</span>
                            
                            <div class="d-flex align-items-center justify-content-center gap-2 flex-grow-1">
                                <span class="fw-bold text-dark small text-end" style="width: 110px;">{{ tran.team_1 }}</span>
                                <span class="badge bg-white text-dark border rounded-circle p-2 shadow-xs">VS</span>
                                <span class="fw-bold text-dark small text-start" style="width: 110px;">{{ tran.team_2 }}</span>
                            </div>

                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-light text-secondary border">{{ tran.ten_vong_dau || 'Vòng bảng' }}</span>
                                <button v-if="index === 2" class="btn btn-primary btn-sm px-3 fw-bold shadow-sm">Xem Ngay</button>
                                <button v-else class="btn btn-white btn-sm rounded-circle p-1 text-secondary border-0">
                                    <i class="bx bx-bell fs-5"></i>
                                </button>
                            </div>
                        </div>

                        <div v-if="list_tran_dau.length === 0 && !is_loading" class="text-center text-muted py-3">
                            Không có trận đấu sắp tới.
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
                                <tr v-for="(team, index) in list_bxh" :key="index" :class="{'table-active': index === 0}">
                                    <td class="ps-3 fw-bold" :class="index === 0 ? 'text-primary' : 'text-secondary'">
                                        0{{ index + 1 }}
                                    </td>
                                    <td class="fw-bold text-dark">{{ team.ten_doi_tuyen }}</td>
                                    <td class="text-center fw-semibold">{{ team.so_tran_thang || 0 }} - {{ team.so_tran_thua || 0 }}</td>
                                    <td class="text-end pe-3 fw-bold text-primary">{{ team.diem_so || 0 }}</td>
                                </tr>
                                <tr v-if="list_bxh.length === 0 && !is_loading">
                                    <td colspan="4" class="text-center text-muted py-3">Chưa có dữ liệu bảng xếp hạng.</td>
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
</template>

<script>
import axios from 'axios';

export default {
    name: 'ClientHome',
    data() {
        return {
            is_loading: true,
            list_tin_tuc: [],
            list_giai_dau: [],
            list_tran_dau: [],
            list_bxh: [],
            currentDate: '24/05/2024',
            newsImages: [
                'https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&w=600',
                'https://images.unsplash.com/photo-1511512578047-dfb367046420?auto=format&fit=crop&w=600',
                'https://images.unsplash.com/photo-1538481199705-c710c4e965fc?auto=format&fit=crop&w=600',
                'https://images.unsplash.com/photo-1615663245857-ac93bb7c39e7?auto=format&fit=crop&w=600'
            ]
        }
    },
    mounted() {
        this.loadHomeData();
    },
    methods: {
        loadHomeData() {
            this.is_loading = true;
            axios.get('http://127.0.0.1:8000/api/client/home-data')
                .then(res => {
                    if (res.data.status === 1) {
                        this.list_tin_tuc = res.data.tin_tuc || [];
                        this.list_giai_dau = res.data.giai_dau || [];
                        this.list_tran_dau = res.data.tran_dau || [];
                        this.list_bxh = res.data.bxh || [];
                    }
                    this.is_loading = false;
                })
                .catch(err => {
                    console.error("Lỗi lấy dữ liệu Client Home:", err);
                    this.is_loading = false;
                });
        },
        formatDate(dateStr) {
            if (!dateStr) return '15/05/2024';
            const date = new Date(dateStr);
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const year = date.getFullYear();
            return `${day}/${month}/${year}`;
        },
        formatTime(dateStr) {
            if (!dateStr) return '18:00';
            const date = new Date(dateStr);
            const hours = String(date.getHours()).padStart(2, '0');
            const minutes = String(date.getMinutes()).padStart(2, '0');
            return `${hours}:${minutes}`;
        }
    }
}
</script>

<style scoped></style>
