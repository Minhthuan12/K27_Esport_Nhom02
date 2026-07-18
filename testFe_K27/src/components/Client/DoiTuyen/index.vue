<template>
    <div class="container-fluid px-3 px-lg-5 pt-2 mt-0 mb-4">
        <!-- BREADCRUMB & PAGE TITLE HEADER -->
        <div class="row align-items-center mb-3">
            <div class="col-12 col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="/trang-chu" class="text-decoration-none">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Đội tuyển</li>
                    </ol>
                </nav>
                <h3 class="fw-bold text-dark mb-0 d-flex align-items-center">
                    <i class="bx bx-group text-primary me-2 fs-2"></i>Danh Sách Đội Tuyển eSports
                </h3>
            </div>
            <div class="col-12 col-md-6 text-md-end mt-2 mt-md-0">
                <span class="badge bg-primary-subtle text-primary border border-primary-subtle p-2 px-3 fs-6 rounded-pill">
                    <i class="bx bx-shield me-1"></i>{{ filtered_teams.length }} Đội Tuyển Đang Hợp Tác
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
                            <input v-model="search_query" type="text" class="form-control bg-light border-start-0 ps-0" placeholder="Nhập tên đội tuyển, quốc gia...">
                        </div>
                    </div>

                    <!-- Filter by Game Dropdown -->
                    <div class="col-12 col-sm-6 col-md-4">
                        <select v-model="selected_game" class="form-select bg-light">
                            <option value="">Tất Cả Bộ Môn Game</option>
                            <option v-for="(game, idx) in game_list" :key="idx" :value="game">{{ game }}</option>
                        </select>
                    </div>

                    <!-- Reset Filters Button -->
                    <div class="col-12 col-sm-6 col-md-3 text-sm-end">
                        <button @click="resetFilters" class="btn btn-outline-secondary w-100 fw-semibold">
                            <i class="bx bx-refresh me-1"></i>Đặt Lại Bộ Lọc
                        </button>
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
                            <small class="text-muted text-uppercase fw-semibold d-block">Tổng Đội Tuyển</small>
                            <span class="fs-4 fw-bold text-dark">{{ list_doi_tuyen.length }}</span>
                        </div>
                        <div class="bg-primary-subtle text-primary p-3 rounded-circle">
                            <i class="bx bx-group fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-3 p-3 bg-white border-start border-4 border-success">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted text-uppercase fw-semibold d-block">Tuyển Thủ Đăng Ký</small>
                            <span class="fs-4 fw-bold text-success">{{ list_doi_tuyen.length * 5 }}</span>
                        </div>
                        <div class="bg-success-subtle text-success p-3 rounded-circle">
                            <i class="bx bx-user-check fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-3 p-3 bg-white border-start border-4 border-warning">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted text-uppercase fw-semibold d-block">Đội Vô Địch</small>
                            <span class="fs-4 fw-bold text-warning">8 Đội</span>
                        </div>
                        <div class="bg-warning-subtle text-warning p-3 rounded-circle">
                            <i class="bx bx-crown fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card border-0 shadow-sm rounded-3 p-3 bg-white border-start border-4 border-info">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted text-uppercase fw-semibold d-block">Quốc Gia Tham Gia</small>
                            <span class="fs-4 fw-bold text-info">12 Đất Nước</span>
                        </div>
                        <div class="bg-info-subtle text-info p-3 rounded-circle">
                            <i class="bx bx-globe fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TEAMS CARDS GRID (DỮ LIỆU TỪ BACKEND BE) -->
        <div v-if="is_loading" class="text-center py-5">
            <i class="bx bx-loader-alt bx-spin fs-1 text-primary mb-3"></i>
            <h5 class="text-muted">Đang tải danh sách đội tuyển từ Backend...</h5>
        </div>

        <div v-else-if="filtered_teams.length === 0" class="card border-0 shadow-sm rounded-4 p-5 text-center my-4">
            <i class="bx bx-user-x fs-1 text-muted mb-2"></i>
            <h5 class="fw-bold text-dark">Không tìm thấy đội tuyển phù hợp</h5>
            <p class="text-muted mb-3">Vui lòng thử lại với từ khóa tìm kiếm khác.</p>
            <div>
                <button @click="resetFilters" class="btn btn-outline-primary btn-sm px-4 fw-bold">Đặt lại bộ lọc</button>
            </div>
        </div>

        <div v-else class="row g-4">
            <div v-for="(team, index) in filtered_teams" :key="index" class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center hover-shadow transition position-relative">
                    <span class="position-absolute top-0 end-0 m-3 badge bg-light text-primary border border-primary-subtle fw-bold">
                        {{ team.ten_viet_tat || 'eSports' }}
                    </span>

                    <!-- Team Logo Image -->
                    <div class="mb-3 mt-2 d-flex justify-content-center align-items-center" style="height: 80px;">
                        <img v-if="team.logo" :src="team.logo" class="object-fit-contain rounded-3" style="max-width: 80px; max-height: 80px;" :alt="team.ten_doi_tuyen">
                        <div v-else class="bg-primary-subtle text-primary rounded-circle d-inline-flex p-3 border border-2 border-primary shadow-xs">
                            <i class="bx bx-shield-quarter fs-1"></i>
                        </div>
                    </div>

                    <!-- Team Name -->
                    <h5 class="fw-bold text-dark mb-1 text-truncate" :title="team.ten_doi_tuyen">
                        {{ team.ten_doi_tuyen }}
                    </h5>
                    <p class="text-muted small mb-3">
                        <i class="bx bx-map-pin text-danger me-1"></i>{{ team.quoc_gia || 'Việt Nam' }}
                    </p>

                    <!-- Stats mini box -->
                    <div class="bg-light p-3 rounded-3 mb-3 d-flex justify-content-around text-center">
                        <div>
                            <small class="text-muted d-block" style="font-size: 11px;">Trận Thắng</small>
                            <span class="fw-bold text-success fs-6">{{ team.so_tran_thang || (10 + index * 2) }}</span>
                        </div>
                        <div class="border-start border-end px-3">
                            <small class="text-muted d-block" style="font-size: 11px;">Tỷ Lệ Thắng</small>
                            <span class="fw-bold text-primary fs-6">{{ 70 + (index % 25) }}%</span>
                        </div>
                        <div>
                            <small class="text-muted d-block" style="font-size: 11px;">Vô Địch 🏆</small>
                            <span class="fw-bold text-warning fs-6">{{ (index % 3) + 1 }}</span>
                        </div>
                    </div>

                    <!-- Roster Members preview -->
                    <div class="d-flex align-items-center justify-content-center gap-1 mb-4">
                        <img v-for="i in 5" :key="i" :src="`https://i.pravatar.cc/100?u=player_${index}_${i}`" class="rounded-circle border border-2 border-white shadow-xs" width="32" height="32" :alt="`Player ${i}`">
                    </div>

                    <!-- Action Button -->
                    <button @click="openModal(team, index)" class="btn btn-primary w-100 fw-bold shadow-sm">
                        Xem Hồ Sơ Đội Tuyển
                    </button>
                </div>
            </div>
        </div>

        <!-- MODAL HỒ SƠ ĐỘI TUYỂN (BOOTSTRAP MODAL) -->
        <div v-if="selected_team" class="modal fade show d-block bg-dark bg-opacity-50" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
                    <div class="modal-header bg-primary text-white p-3 px-4">
                        <h5 class="modal-title fw-bold d-flex align-items-center">
                            <i class="bx bx-shield me-2 fs-4"></i>Hồ Sơ Đội Tuyển - {{ selected_team.ten_doi_tuyen }}
                        </h5>
                        <button @click="selected_team = null" type="button" class="btn-close btn-close-white"></button>
                    </div>

                    <div class="modal-body p-4">
                        <div class="row align-items-center mb-4 bg-light p-3 rounded-3">
                            <div class="col-auto">
                                <img v-if="selected_team.logo" :src="selected_team.logo" class="object-fit-contain rounded-3" style="width: 64px; height: 64px;" :alt="selected_team.ten_doi_tuyen">
                                <div v-else class="bg-primary-subtle text-primary p-3 rounded-circle">
                                    <i class="bx bx-shield-quarter fs-1"></i>
                                </div>
                            </div>
                            <div class="col">
                                <h4 class="fw-bold text-dark mb-1">{{ selected_team.ten_doi_tuyen }} ({{ selected_team.ten_viet_tat }})</h4>
                                <div class="text-muted small">Mô tả: <strong>{{ selected_team.mo_ta }}</strong></div>
                            </div>
                        </div>

                        <h6 class="fw-bold text-dark mb-3">Danh Sách Tuyển Thủ Đang Thi Đấu</h6>
                        <div class="row g-2">
                            <div v-for="(role, idx) in ['Top Lane', 'Jungle', 'Mid Lane', 'ADC Carry', 'Support']" :key="idx" class="col-12 col-md-6">
                                <div class="d-flex align-items-center justify-content-between p-2 px-3 border rounded-3 bg-white">
                                    <div class="d-flex align-items-center gap-2">
                                        <img :src="`https://i.pravatar.cc/100?u=player_detail_${idx}`" class="rounded-circle" width="36" height="36" alt="Avatar">
                                        <div>
                                            <div class="fw-bold text-dark small">Player_{{ selected_team_index + 1 }}_{{ idx + 1 }}</div>
                                            <small class="text-muted" style="font-size: 11px;">Vị trí: {{ role }}</small>
                                        </div>
                                    </div>
                                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill">Chính thức</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer bg-light p-3 px-4">
                        <button @click="selected_team = null" type="button" class="btn btn-secondary fw-bold px-4">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'ClientDoiTuyen',
    data() {
        return {
            is_loading: true,
            list_doi_tuyen: [],
            search_query: '',
            selected_game: '',
            selected_team: null,
            selected_team_index: 0
        }
    },
    computed: {
        game_list() {
            const games = this.list_doi_tuyen.map(t => t.ten_game).filter(Boolean);
            return [...new Set(games)];
        },
        filtered_teams() {
            return this.list_doi_tuyen.filter(team => {
                const query = this.search_query.toLowerCase();
                const nameMatch = !query || (team.ten_doi_tuyen && team.ten_doi_tuyen.toLowerCase().includes(query)) || (team.ten_viet_tat && team.ten_viet_tat.toLowerCase().includes(query));
                const gameMatch = !this.selected_game || team.ten_game === this.selected_game;
                return nameMatch && gameMatch;
            });
        }
    },
    mounted() {
        this.fetchDoiTuyenData();
    },
    methods: {
        fetchDoiTuyenData() {
            this.is_loading = true;
            axios.get('http://127.0.0.1:8000/api/admin/doi-tuyen/get-data')
                .then(res => {
                    if (res.data.status === 1) {
                        this.list_doi_tuyen = res.data.data || [];
                    }
                    this.is_loading = false;
                })
                .catch(err => {
                    console.error("Lỗi lấy danh sách đội tuyển:", err);
                    this.is_loading = false;
                });
        },
        resetFilters() {
            this.search_query = '';
            this.selected_game = '';
        },
        openModal(team, index) {
            this.selected_team = team;
            this.selected_team_index = index;
        }
    }
}
</script>

<style scoped></style>
