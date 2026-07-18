<template>
    <div class="container-fluid px-3 px-lg-5 pt-2 mt-0 mb-4">
        <!-- BREADCRUMB & PAGE TITLE HEADER -->
        <div class="row align-items-center mb-3">
            <div class="col-12 col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="/trang-chu" class="text-decoration-none">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Giải đấu</li>
                    </ol>
                </nav>
                <h3 class="fw-bold text-dark mb-0 d-flex align-items-center">
                    <i class="bx bx-trophy text-primary me-2 fs-2"></i>Danh Sách Giải Đấu eSports
                </h3>
            </div>
            <div class="col-12 col-md-6 text-md-end mt-2 mt-md-0">
                <span class="badge bg-primary-subtle text-primary border border-primary-subtle p-2 px-3 fs-6 rounded-pill">
                    <i class="bx bx-shield-quarter me-1"></i>{{ filtered_giai_dau.length }} Giải Đấu Được Tìm Thấy
                </span>
            </div>
        </div>

        <!-- SEARCH & FILTER CONTROLS BAR -->
        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-body p-3 p-lg-4">
                <div class="row g-3 align-items-center">
                    <!-- Search Input -->
                    <div class="col-12 col-md-5">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="bx bx-search text-muted fs-5"></i>
                            </span>
                            <input v-model="search_query" type="text" class="form-control bg-light border-start-0 ps-0" placeholder="Nhập tên giải đấu, địa điểm...">
                        </div>
                    </div>

                    <!-- Filter by Game Dropdown -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <select v-model="selected_game" class="form-select bg-light">
                            <option value="">Tất Cả Tựa Game</option>
                            <option v-for="(game, idx) in game_list" :key="idx" :value="game">{{ game }}</option>
                        </select>
                    </div>

                    <!-- Filter by Status Dropdown -->
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="btn-group w-100" role="group">
                            <button @click="status_filter = 'all'" :class="['btn', 'btn-sm', status_filter === 'all' ? 'btn-primary fw-bold' : 'btn-outline-primary']">Tất Cả</button>
                            <button @click="status_filter = 'active'" :class="['btn', 'btn-sm', status_filter === 'active' ? 'btn-primary fw-bold' : 'btn-outline-primary']">Đang Diễn Ra</button>
                            <button @click="status_filter = 'upcoming'" :class="['btn', 'btn-sm', status_filter === 'upcoming' ? 'btn-primary fw-bold' : 'btn-outline-primary']">Sắp Diễn Ra</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- STATS SUMMARY CARDS -->
        <div class="row g-3 mb-4">
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-3 p-3 bg-white border-start border-4 border-primary">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted text-uppercase fw-semibold d-block">Tổng Giải Đấu</small>
                            <span class="fs-4 fw-bold text-dark">{{ list_giai_dau.length }}</span>
                        </div>
                        <div class="bg-primary-subtle text-primary p-3 rounded-circle">
                            <i class="bx bx-trophy fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-3 p-3 bg-white border-start border-4 border-success">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted text-uppercase fw-semibold d-block">Đang Diễn Ra</small>
                            <span class="fs-4 fw-bold text-success">{{ activeCount }}</span>
                        </div>
                        <div class="bg-success-subtle text-success p-3 rounded-circle">
                            <i class="bx bx-play-circle fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-3 p-3 bg-white border-start border-4 border-info">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted text-uppercase fw-semibold d-block">Sắp Diễn Ra</small>
                            <span class="fs-4 fw-bold text-info">{{ upcomingCount }}</span>
                        </div>
                        <div class="bg-info-subtle text-info p-3 rounded-circle">
                            <i class="bx bx-time-five fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-3 p-3 bg-white border-start border-4 border-warning">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted text-uppercase fw-semibold d-block">Tổng Giải Thưởng</small>
                            <span class="fs-4 fw-bold text-warning">2.5 Tỷ VNĐ</span>
                        </div>
                        <div class="bg-warning-subtle text-warning p-3 rounded-circle">
                            <i class="bx bx-dollar-circle fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TOURNAMENT CARDS GRID (DỮ LIỆU TỪ BACKEND BE) -->
        <div v-if="is_loading" class="text-center py-5">
            <i class="bx bx-loader-alt bx-spin fs-1 text-primary mb-3"></i>
            <h5 class="text-muted">Đang tải danh sách giải đấu từ Backend...</h5>
        </div>

        <div v-else-if="filtered_giai_dau.length === 0" class="card border-0 shadow-sm rounded-4 p-5 text-center my-4">
            <i class="bx bx-search-alt fs-1 text-muted mb-2"></i>
            <h5 class="fw-bold text-dark">Không tìm thấy giải đấu phù hợp</h5>
            <p class="text-muted mb-3">Vui lòng thử lại với từ khóa hoặc bộ lọc khác.</p>
            <div>
                <button @click="resetFilters" class="btn btn-outline-primary btn-sm px-4 fw-bold">Đặt lại bộ lọc</button>
            </div>
        </div>

        <div v-else class="row g-4">
            <div v-for="(giai, index) in filtered_giai_dau" :key="index" class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden position-relative hover-shadow transition">
                    <!-- Top Cover Image -->
                    <div class="position-relative">
                        <img :src="tournamentCovers[index % tournamentCovers.length]" class="w-100 object-fit-cover" style="height: 180px;" alt="Tournament cover">
                        <div class="position-absolute top-0 end-0 m-3">
                            <span v-if="giai.trang_thai == 1" class="badge bg-success border border-white shadow-sm p-2 px-3 rounded-pill fw-bold">
                                <i class="bx bx-radio-circle-marked me-1"></i>Đang Diễn Ra
                            </span>
                            <span v-else class="badge bg-info text-dark border border-white shadow-sm p-2 px-3 rounded-pill fw-bold">
                                <i class="bx bx-time me-1"></i>Sắp Diễn Ra
                            </span>
                        </div>
                        <div class="position-absolute bottom-0 start-0 m-3">
                            <span class="badge bg-dark text-white bg-opacity-75 p-2 px-3 rounded-3 fw-medium">
                                <i class="bx bx-game me-1 text-primary"></i>{{ giai.ten_game || 'eSports' }}
                            </span>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body p-4 d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="fw-bold text-dark mb-2 text-truncate-2" :title="giai.ten_giai_dau">
                                {{ giai.ten_giai_dau }}
                            </h5>
                            <p class="text-muted small text-truncate-2 mb-3" style="line-height: 1.5;">
                                {{ giai.mo_ta || 'Giải đấu chuyên nghiệp quy tụ các đội tuyển hàng đầu thế giới tranh tài giải thưởng hấp dẫn.' }}
                            </p>

                            <!-- Key Details list -->
                            <div class="bg-light p-3 rounded-3 mb-3 d-flex flex-column gap-2 small">
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted"><i class="bx bx-calendar me-1 text-primary"></i>Thời gian:</span>
                                    <span class="fw-bold text-dark">{{ formatDate(giai.ngay_bat_dau) }} - {{ formatDate(giai.ngay_ket_thuc) }}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted"><i class="bx bx-group me-1 text-primary"></i>Quy mô:</span>
                                    <span class="fw-bold text-dark">{{ giai.so_luong_doi || 16 }} Đội tuyển</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted"><i class="bx bx-map-pin me-1 text-primary"></i>Địa điểm:</span>
                                    <span class="fw-bold text-dark">{{ giai.dia_diem || 'Online Arena' }}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted"><i class="bx bx-sitemap me-1 text-primary"></i>Thể thức:</span>
                                    <span class="fw-bold text-dark">{{ giai.hinh_thuc_thi_dau || 'Double Elimination' }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex gap-2 mt-2">
                            <button @click="openModal(giai)" class="btn btn-primary flex-grow-1 fw-bold shadow-sm">
                                Chi Tiết Giải Đấu
                            </button>
                            <button v-if="giai.trang_thai == 1" class="btn btn-outline-success fw-bold px-3">
                                <i class="bx bx-tv fs-5"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL CHI TIẾT GIẢI ĐẤU (BOOTSTRAP MODAL) -->
        <div v-if="selected_giai" class="modal fade show d-block bg-dark bg-opacity-50" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
                    <div class="modal-header bg-primary text-white p-3 px-4">
                        <h5 class="modal-title fw-bold d-flex align-items-center">
                            <i class="bx bx-trophy me-2 fs-4"></i>{{ selected_giai.ten_giai_dau }}
                        </h5>
                        <button @click="selected_giai = null" type="button" class="btn-close btn-close-white"></button>
                    </div>

                    <div class="modal-body p-4">
                        <div class="row g-4">
                            <div class="col-12 col-md-5">
                                <img :src="tournamentCovers[0]" class="w-100 rounded-3 shadow-sm object-fit-cover" style="height: 220px;" alt="Detail cover">
                                
                                <div class="mt-3 bg-light p-3 rounded-3">
                                    <h6 class="fw-bold text-dark mb-2">Thông Tin Nhanh</h6>
                                    <div class="small d-flex flex-column gap-1">
                                        <div><strong>Bộ môn:</strong> {{ selected_giai.ten_game }}</div>
                                        <div><strong>Số đội tham gia:</strong> {{ selected_giai.so_luong_doi }} đội</div>
                                        <div><strong>Hình thức:</strong> {{ selected_giai.hinh_thuc_thi_dau }}</div>
                                        <div><strong>Địa điểm:</strong> {{ selected_giai.dia_diem }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-7">
                                <h6 class="fw-bold text-dark mb-2">Mô Tả Chi Tiết Giải Đấu</h6>
                                <p class="text-muted small" style="line-height: 1.6;">
                                    {{ selected_giai.mo_ta || 'Giải đấu quy tụ những đội tuyển thể thao điện tử mạnh nhất khu vực, hứa hẹn mang lại những màn trình diễn vô cùng mãn nhãn và kịch tính.' }}
                                </p>

                                <h6 class="fw-bold text-dark mt-3 mb-2">Cơ Cấu Giải Thưởng</h6>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm align-middle small text-center mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Thứ Hạng</th>
                                                <th>Giải Thưởng (VNĐ)</th>
                                                <th>Điểm Tích Lũy</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="fw-bold text-warning">🥇 Vô Địch</td>
                                                <td class="fw-bold text-success">500,000,000</td>
                                                <td class="fw-bold text-primary">500 Pts</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold text-secondary">🥈 Á Quân</td>
                                                <td class="fw-bold text-dark">200,000,000</td>
                                                <td class="fw-bold text-primary">300 Pts</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold text-danger">🥉 Hạng 3</td>
                                                <td class="fw-bold text-dark">100,000,000</td>
                                                <td class="fw-bold text-primary">150 Pts</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer bg-light p-3 px-4">
                        <button @click="selected_giai = null" type="button" class="btn btn-secondary fw-bold px-4">Đóng</button>
                        <button type="button" class="btn btn-primary fw-bold px-4 shadow-sm">Đăng Ký Đội Tuyển</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'ClientGiaiDau',
    data() {
        return {
            is_loading: true,
            list_giai_dau: [],
            search_query: '',
            selected_game: '',
            status_filter: 'all',
            selected_giai: null,
            tournamentCovers: [
                'https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&w=800',
                'https://images.unsplash.com/photo-1511512578047-dfb367046420?auto=format&fit=crop&w=800',
                'https://images.unsplash.com/photo-1538481199705-c710c4e965fc?auto=format&fit=crop&w=800',
                'https://images.unsplash.com/photo-1511882150382-421056c89033?auto=format&fit=crop&w=800',
                'https://images.unsplash.com/photo-1550745165-9bc0b252726f?auto=format&fit=crop&w=800'
            ]
        }
    },
    computed: {
        game_list() {
            const games = this.list_giai_dau.map(g => g.ten_game).filter(Boolean);
            return [...new Set(games)];
        },
        filtered_giai_dau() {
            return this.list_giai_dau.filter(giai => {
                const matchSearch = !this.search_query || 
                    (giai.ten_giai_dau && giai.ten_giai_dau.toLowerCase().includes(this.search_query.toLowerCase())) ||
                    (giai.dia_diem && giai.dia_diem.toLowerCase().includes(this.search_query.toLowerCase()));
                
                const matchGame = !this.selected_game || giai.ten_game === this.selected_game;

                let matchStatus = true;
                if (this.status_filter === 'active') matchStatus = giai.trang_thai == 1;
                if (this.status_filter === 'upcoming') matchStatus = giai.trang_thai == 0;

                return matchSearch && matchGame && matchStatus;
            });
        },
        activeCount() {
            return this.list_giai_dau.filter(g => g.trang_thai == 1).length;
        },
        upcomingCount() {
            return this.list_giai_dau.filter(g => g.trang_thai == 0).length;
        }
    },
    mounted() {
        this.fetchGiaiDauData();
    },
    methods: {
        fetchGiaiDauData() {
            this.is_loading = true;
            axios.get('http://127.0.0.1:8000/api/admin/giai-dau/get-data')
                .then(res => {
                    if (res.data.status === 1) {
                        this.list_giai_dau = res.data.data || [];
                    }
                    this.is_loading = false;
                })
                .catch(err => {
                    console.error("Lỗi lấy danh sách giải đấu:", err);
                    this.is_loading = false;
                });
        },
        formatDate(dateStr) {
            if (!dateStr) return '01/06/2024';
            const date = new Date(dateStr);
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const year = date.getFullYear();
            return `${day}/${month}/${year}`;
        },
        resetFilters() {
            this.search_query = '';
            this.selected_game = '';
            this.status_filter = 'all';
        },
        openModal(giai) {
            this.selected_giai = giai;
        }
    }
}
</script>

<style scoped></style>
