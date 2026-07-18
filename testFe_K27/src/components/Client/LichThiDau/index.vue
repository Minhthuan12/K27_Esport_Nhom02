<template>
    <div class="container-fluid px-3 px-lg-5 pt-2 mt-0 mb-4">
        <!-- BREADCRUMB & PAGE TITLE HEADER -->
        <div class="row align-items-center mb-3">
            <div class="col-12 col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="/trang-chu" class="text-decoration-none">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Lịch thi đấu</li>
                    </ol>
                </nav>
                <h3 class="fw-bold text-dark mb-0 d-flex align-items-center">
                    <i class="bx bx-joystick-alt text-primary me-2 fs-2"></i>Lịch Thi Đấu & Kết Quả Trận Đấu
                </h3>
            </div>
            <div class="col-12 col-md-6 text-md-end mt-2 mt-md-0">
                <span class="badge bg-primary-subtle text-primary border border-primary-subtle p-2 px-3 fs-6 rounded-pill">
                    <i class="bx bx-calendar-event me-1"></i>Cập Nhật Trực Tiếp 24/7
                </span>
            </div>
        </div>

        <!-- SEARCH & FILTER CONTROLS BAR -->
        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-body p-3 p-lg-4">
                <div class="row g-3 align-items-center">
                    <!-- Search Input -->
                    <div class="col-12 col-md-4">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="bx bx-search text-muted fs-5"></i>
                            </span>
                            <input v-model="search_query" type="text" class="form-control bg-light border-start-0 ps-0" placeholder="Nhập tên đội tuyển, giải đấu...">
                        </div>
                    </div>

                    <!-- Filter by Game Dropdown -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <select v-model="selected_game" class="form-select bg-light">
                            <option value="">Tất Cả Tựa Game</option>
                            <option value="LMHT">Liên Minh Huyền Thoại</option>
                            <option value="Valorant">Valorant</option>
                            <option value="Dota 2">Dota 2</option>
                            <option value="CS2">Counter-Strike 2</option>
                        </select>
                    </div>

                    <!-- Filter by Match Status -->
                    <div class="col-12 col-sm-6 col-md-5">
                        <div class="btn-group w-100" role="group">
                            <button @click="status_filter = 'all'" :class="['btn', 'btn-sm', status_filter === 'all' ? 'btn-primary fw-bold' : 'btn-outline-primary']">Tất Cả</button>
                            <button @click="status_filter = 'live'" :class="['btn', 'btn-sm', status_filter === 'live' ? 'btn-danger fw-bold' : 'btn-outline-danger']">🔴 Đang Trực Tiếp</button>
                            <button @click="status_filter = 'upcoming'" :class="['btn', 'btn-sm', status_filter === 'upcoming' ? 'btn-primary fw-bold' : 'btn-outline-primary']">Sắp Thi Đấu</button>
                            <button @click="status_filter = 'finished'" :class="['btn', 'btn-sm', status_filter === 'finished' ? 'btn-secondary fw-bold' : 'btn-outline-secondary']">Đã Kết Thúc</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FEATURED MATCH HIGHLIGHT CARD (HOT LIVE MATCH) -->
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-dark text-white">
            <div class="card-body p-4 p-lg-5 position-relative">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="badge bg-danger p-2 px-3 rounded-pill fw-bold d-flex align-items-center">
                        <i class="bx bx-broadcast me-1 fs-5"></i>TRẬN ĐẤU TIÊU ĐIỂM HÔM NAY
                    </span>
                    <span class="badge bg-light text-dark fw-bold">BO5 - Chung Kết Nhánh Thắng</span>
                </div>

                <div class="row align-items-center my-3 text-center">
                    <!-- Team 1 -->
                    <div class="col-5 col-md-4">
                        <div class="p-3">
                            <div class="bg-primary-subtle text-primary rounded-circle d-inline-flex p-3 mb-2">
                                <i class="bx bx-shield-quarter fs-1"></i>
                            </div>
                            <h4 class="fw-bold mb-1">Rocker Team</h4>
                            <small class="text-white-50">Hạng #1 BXH</small>
                        </div>
                    </div>

                    <!-- Versus / Score -->
                    <div class="col-2 col-md-4">
                        <div class="py-2">
                            <span class="fs-1 fw-black text-warning">2 - 1</span>
                            <div class="small text-white-50 mt-1">Ván 4 đang diễn ra</div>
                            <span class="badge bg-danger border border-white mt-2 p-2 px-3 rounded-pill fw-bold">LIVE STREAM</span>
                        </div>
                    </div>

                    <!-- Team 2 -->
                    <div class="col-5 col-md-4">
                        <div class="p-3">
                            <div class="bg-warning-subtle text-warning rounded-circle d-inline-flex p-3 mb-2">
                                <i class="bx bx-crown fs-1"></i>
                            </div>
                            <h4 class="fw-bold mb-1">Dragon Clan</h4>
                            <small class="text-white-50">Hạng #2 BXH</small>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-3">
                    <button class="btn btn-danger btn-lg fw-bold px-5 rounded-pill shadow-lg">
                        <i class="bx bx-play-circle me-2 fs-4 align-middle"></i>Xem Trực Tiếp Nhận Quà
                    </button>
                </div>
            </div>
        </div>

        <!-- MATCH SCHEDULE LIST TABLE (DỮ LIỆU TỪ BACKEND BE) -->
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
            <div class="card-header bg-white p-3 px-4 border-bottom d-flex justify-content-between align-items-center">
                <h5 class="fw-bold text-dark mb-0 d-flex align-items-center">
                    <i class="bx bx-list-check text-primary me-2 fs-4"></i>Danh Sách Trận Đấu
                </h5>
                <small class="text-muted">Tổng số: <strong>{{ filtered_matches.length }}</strong> trận</small>
            </div>

            <div v-if="is_loading" class="text-center py-5">
                <i class="bx bx-loader-alt bx-spin fs-1 text-primary mb-3"></i>
                <h5 class="text-muted">Đang tải lịch thi đấu từ Backend...</h5>
            </div>

            <div v-else-if="filtered_matches.length === 0" class="text-center py-5">
                <i class="bx bx-calendar-x fs-1 text-muted mb-2"></i>
                <h5 class="fw-bold text-dark">Không có trận đấu phù hợp</h5>
                <p class="text-muted">Vui lòng thay đổi từ khóa hoặc bộ lọc tìm kiếm.</p>
            </div>

            <div v-else class="list-group list-group-flush">
                <div v-for="(tran, index) in filtered_matches" :key="index" class="list-group-item p-3 p-lg-4 hover-bg-light transition border-bottom">
                    <div class="row align-items-center g-3">
                        <!-- Time & Tournament Info -->
                        <div class="col-12 col-md-3">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span class="badge bg-light text-primary border border-primary-subtle fw-bold">
                                    <i class="bx bx-time-five me-1"></i>{{ formatTime(tran.thoi_gian_thi_dau) }}
                                </span>
                                <small class="text-muted">{{ formatDate(tran.thoi_gian_thi_dau) }}</small>
                            </div>
                            <div class="fw-bold text-dark text-truncate" :title="tran.ten_giai_dau">
                                {{ tran.ten_giai_dau || 'Championship League' }}
                            </div>
                            <small class="text-muted d-block">{{ tran.ten_vong_dau || 'Vòng Bảng' }} • {{ tran.the_thuc || 'BO3' }}</small>
                        </div>

                        <!-- Match Teams vs Score -->
                        <div class="col-12 col-md-6 text-center">
                            <div class="d-flex align-items-center justify-content-center gap-3 bg-light p-2 px-3 rounded-3 border">
                                <!-- Team 1 -->
                                <div class="d-flex align-items-center gap-2 justify-content-end text-end" style="width: 170px;">
                                    <span class="fw-bold text-dark text-truncate">{{ getTeam1(index) }}</span>
                                    <div class="bg-primary-subtle text-primary p-2 rounded-circle">
                                        <i class="bx bx-shield-alt-2 fs-5"></i>
                                    </div>
                                </div>

                                <!-- Versus / Score -->
                                <div class="px-2">
                                    <span v-if="index === 0" class="badge bg-danger fs-6 p-2 px-3 rounded-pill">LIVE 2 - 1</span>
                                    <span v-else-if="index % 2 === 1" class="badge bg-secondary fs-6 p-2 px-3 rounded-pill">2 - 0</span>
                                    <span v-else class="badge bg-white text-dark border shadow-xs fs-6 p-2 px-3 rounded-circle">VS</span>
                                </div>

                                <!-- Team 2 -->
                                <div class="d-flex align-items-center gap-2 justify-content-start text-start" style="width: 170px;">
                                    <div class="bg-warning-subtle text-warning p-2 rounded-circle">
                                        <i class="bx bx-crown fs-5"></i>
                                    </div>
                                    <span class="fw-bold text-dark text-truncate">{{ getTeam2(index) }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Action Button & Status Badge -->
                        <div class="col-12 col-md-3 text-md-end">
                            <div class="d-flex align-items-center justify-content-md-end gap-2">
                                <span v-if="index === 0" class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill">Đang phát</span>
                                <span v-else-if="index % 2 === 1" class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill">Đã kết thúc</span>
                                <span v-else class="badge bg-success-subtle text-success border border-success-subtle rounded-pill">Sắp thi đấu</span>

                                <button @click="openModal(tran, index)" class="btn btn-outline-primary btn-sm fw-bold px-3">
                                    Chi Tiết
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL CHI TIẾT TRẬN ĐẤU (BOOTSTRAP MODAL) -->
        <div v-if="selected_match" class="modal fade show d-block bg-dark bg-opacity-50" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
                    <div class="modal-header bg-primary text-white p-3 px-4">
                        <h5 class="modal-title fw-bold d-flex align-items-center">
                            <i class="bx bx-joystick me-2 fs-4"></i>Chi Tiết Trận Đấu - {{ selected_match.ten_giai_dau }}
                        </h5>
                        <button @click="selected_match = null" type="button" class="btn-close btn-close-white"></button>
                    </div>

                    <div class="modal-body p-4">
                        <div class="bg-light p-3 rounded-3 text-center mb-4">
                            <span class="badge bg-primary px-3 py-1 rounded-pill mb-2">{{ selected_match.ten_vong_dau }} • {{ selected_match.the_thuc }}</span>
                            <div class="row align-items-center my-2">
                                <div class="col-5">
                                    <h5 class="fw-bold text-dark mb-0">{{ selected_match.team1 }}</h5>
                                </div>
                                <div class="col-2">
                                    <span class="fs-3 fw-bold text-danger">VS</span>
                                </div>
                                <div class="col-5">
                                    <h5 class="fw-bold text-dark mb-0">{{ selected_match.team2 }}</h5>
                                </div>
                            </div>
                            <small class="text-muted">Thời gian thi đấu: {{ formatDate(selected_match.thoi_gian_thi_dau) }} - {{ formatTime(selected_match.thoi_gian_thi_dau) }}</small>
                        </div>

                        <h6 class="fw-bold text-dark mb-3">Thông Tin Kỹ Thuật Trận Đấu</h6>
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="border p-3 rounded-3">
                                    <small class="text-muted d-block">Thể thức thi đấu:</small>
                                    <span class="fw-bold text-dark">{{ selected_match.the_thuc || 'Best of 3 (BO3)' }}</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="border p-3 rounded-3">
                                    <small class="text-muted d-block">Số lượng đội tham gia:</small>
                                    <span class="fw-bold text-dark">{{ selected_match.so_luong_doi || 2 }} Đội</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer bg-light p-3 px-4">
                        <button @click="selected_match = null" type="button" class="btn btn-secondary fw-bold px-4">Đóng</button>
                        <button type="button" class="btn btn-primary fw-bold px-4 shadow-sm">Xem Replay Video</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'ClientLichThiDau',
    data() {
        return {
            is_loading: true,
            list_tran_dau: [],
            search_query: '',
            selected_game: '',
            status_filter: 'all',
            selected_match: null,
            teamPairs: [
                { team1: 'Rocker Team', team2: 'Dragon Clan' },
                { team1: 'Phoenix Gaming', team2: 'Team Shadow' },
                { team1: 'Apex Stars', team2: 'Nova Esports' },
                { team1: 'Cyber Legends', team2: 'Vanguard Gaming' },
                { team1: 'Titan Esports', team2: 'Golden Knights' }
            ]
        }
    },
    computed: {
        filtered_matches() {
            return this.list_tran_dau.filter((tran, index) => {
                const team1 = this.getTeam1(index).toLowerCase();
                const team2 = this.getTeam2(index).toLowerCase();
                const giai = (tran.ten_giai_dau || '').toLowerCase();
                const query = this.search_query.toLowerCase();

                const matchSearch = !query || team1.includes(query) || team2.includes(query) || giai.includes(query);

                let matchStatus = true;
                if (this.status_filter === 'live') matchStatus = index === 0;
                if (this.status_filter === 'finished') matchStatus = index % 2 === 1 && index !== 0;
                if (this.status_filter === 'upcoming') matchStatus = index % 2 === 0 && index !== 0;

                return matchSearch && matchStatus;
            });
        }
    },
    mounted() {
        this.fetchTranDauData();
    },
    methods: {
        fetchTranDauData() {
            this.is_loading = true;
            axios.get('http://127.0.0.1:8000/api/admin/tran-dau/get-data')
                .then(res => {
                    if (res.data.status === 1) {
                        this.list_tran_dau = res.data.data || [];
                    }
                    this.is_loading = false;
                })
                .catch(err => {
                    console.error("Lỗi lấy dữ liệu lịch thi đấu:", err);
                    this.is_loading = false;
                });
        },
        getTeam1(index) {
            return this.teamPairs[index % this.teamPairs.length].team1;
        },
        getTeam2(index) {
            return this.teamPairs[index % this.teamPairs.length].team2;
        },
        formatDate(dateStr) {
            if (!dateStr) return '24/05/2024';
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
        },
        openModal(tran, index) {
            this.selected_match = {
                ...tran,
                team1: this.getTeam1(index),
                team2: this.getTeam2(index)
            };
        }
    }
}
</script>

<style scoped></style>
