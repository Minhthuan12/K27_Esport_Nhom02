<template>
    <div class="container-fluid px-3 px-lg-5 pt-2 mt-0 mb-4">
        <!-- BREADCRUMB & PAGE TITLE HEADER -->
        <div class="row align-items-center mb-3">
            <div class="col-12 col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="/trang-chu" class="text-decoration-none">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Trò chơi</li>
                    </ol>
                </nav>
                <h3 class="fw-bold text-dark mb-0 d-flex align-items-center">
                    <i class="bx bx-game text-primary me-2 fs-2"></i>Bộ Môn Trò Chơi eSports
                </h3>
            </div>
            <div class="col-12 col-md-6 text-md-end mt-2 mt-md-0">
                <span class="badge bg-primary-subtle text-primary border border-primary-subtle p-2 px-3 fs-6 rounded-pill">
                    <i class="bx bx-joystick me-1"></i>{{ filtered_games.length }} Tựa Game Đấu Giải
                </span>
            </div>
        </div>

        <!-- SEARCH & FILTER BAR -->
        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-body p-3 p-lg-4">
                <div class="row g-3 align-items-center">
                    <div class="col-12 col-md-6">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="bx bx-search text-muted fs-5"></i>
                            </span>
                            <input v-model="search_query" type="text" class="form-control bg-light border-start-0 ps-0" placeholder="Nhập tên trò chơi, thể loại...">
                        </div>
                    </div>

                    <div class="col-12 col-md-6 text-md-end">
                        <button @click="search_query = ''" class="btn btn-outline-secondary fw-semibold">
                            <i class="bx bx-refresh me-1"></i>Đặt Lại Bộ Lọc
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- GAMES CARDS GRID (DỮ LIỆU TỪ BACKEND BE) -->
        <div v-if="is_loading" class="text-center py-5">
            <i class="bx bx-loader-alt bx-spin fs-1 text-primary mb-3"></i>
            <h5 class="text-muted">Đang tải danh sách game từ Backend...</h5>
        </div>

        <div v-else-if="filtered_games.length === 0" class="card border-0 shadow-sm rounded-4 p-5 text-center">
            <i class="bx bx-ghost fs-1 text-muted mb-2"></i>
            <h5 class="fw-bold text-dark">Không tìm thấy tựa game phù hợp</h5>
            <p class="text-muted">Vui lòng thử lại với tên game khác.</p>
        </div>

        <div v-else class="row g-4">
            <div v-for="(game, index) in filtered_games" :key="index" class="col-12 col-sm-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden hover-shadow transition">
                    <div class="position-relative">
                        <img :src="gameCovers[index % gameCovers.length]" class="w-100 object-fit-cover" style="height: 200px;" alt="Game cover">
                        <span class="position-absolute top-0 end-0 m-3 badge bg-primary border border-white shadow-sm fw-bold">
                            {{ game.ten_the_loai || 'MOBA / FPS' }}
                        </span>
                    </div>

                    <div class="card-body p-4 d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="fw-bold text-dark mb-2 text-truncate" :title="game.ten_game">
                                {{ game.ten_game }}
                            </h5>
                            <p class="text-muted small text-truncate-2 mb-3" style="line-height: 1.5;">
                                {{ game.mo_ta || 'Tựa game eSports đối kháng đỉnh cao hàng đầu thế giới quy tụ hàng triệu người chơi.' }}
                            </p>

                            <div class="bg-light p-3 rounded-3 mb-3 d-flex justify-content-around text-center">
                                <div>
                                    <small class="text-muted d-block" style="font-size: 11px;">Giải Đấu</small>
                                    <span class="fw-bold text-primary fs-6">{{ 4 + (index % 5) }} Giải</span>
                                </div>
                                <div class="border-start border-end px-3">
                                    <small class="text-muted d-block" style="font-size: 11px;">Đội Tuyển</small>
                                    <span class="fw-bold text-success fs-6">{{ 12 + (index % 10) }} Đội</span>
                                </div>
                                <div>
                                    <small class="text-muted d-block" style="font-size: 11px;">Trận Đã Đấu</small>
                                    <span class="fw-bold text-dark fs-6">{{ 120 + index * 15 }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <a href="/client/giai-dau" class="btn btn-primary flex-grow-1 fw-bold shadow-sm">
                                Xem Các Giải Đấu
                            </a>
                            <button @click="openModal(game, index)" class="btn btn-outline-primary fw-bold px-3">
                                Chi Tiết
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MODAL CHI TIẾT GAME (BOOTSTRAP MODAL) -->
        <div v-if="selected_game" class="modal fade show d-block bg-dark bg-opacity-50" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
                    <div class="modal-header bg-primary text-white p-3 px-4">
                        <h5 class="modal-title fw-bold d-flex align-items-center">
                            <i class="bx bx-game me-2 fs-4"></i>{{ selected_game.ten_game }}
                        </h5>
                        <button @click="selected_game = null" type="button" class="btn-close btn-close-white"></button>
                    </div>

                    <div class="modal-body p-4">
                        <div class="row g-4 align-items-center">
                            <div class="col-12 col-md-5">
                                <img :src="gameCovers[selected_index % gameCovers.length]" class="w-100 rounded-3 shadow-sm object-fit-cover" style="height: 200px;" alt="Game details">
                            </div>
                            <div class="col-12 col-md-7">
                                <h5 class="fw-bold text-dark mb-2">{{ selected_game.ten_game }}</h5>
                                <span class="badge bg-primary-subtle text-primary border mb-3">Thể loại: {{ selected_game.ten_the_loai || 'eSports' }}</span>
                                <p class="text-muted small" style="line-height: 1.6;">
                                    {{ selected_game.mo_ta || 'Tựa game eSports chiến thuật đồng đội hàng đầu, mang đến những pha xử lý đỉnh cao và gay cấn.' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer bg-light p-3 px-4">
                        <button @click="selected_game = null" type="button" class="btn btn-secondary fw-bold px-4">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'ClientGame',
    data() {
        return {
            is_loading: true,
            list_game: [],
            search_query: '',
            selected_game: null,
            selected_index: 0,
            gameCovers: [
                'https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&w=800',
                'https://images.unsplash.com/photo-1511512578047-dfb367046420?auto=format&fit=crop&w=800',
                'https://images.unsplash.com/photo-1538481199705-c710c4e965fc?auto=format&fit=crop&w=800',
                'https://images.unsplash.com/photo-1615663245857-ac93bb7c39e7?auto=format&fit=crop&w=800'
            ]
        }
    },
    computed: {
        filtered_games() {
            return this.list_game.filter(game => {
                const query = this.search_query.toLowerCase();
                return !query || (game.ten_game && game.ten_game.toLowerCase().includes(query));
            });
        }
    },
    mounted() {
        this.fetchGameData();
    },
    methods: {
        fetchGameData() {
            this.is_loading = true;
            axios.get('http://127.0.0.1:8000/api/admin/game/get-data')
                .then(res => {
                    if (res.data.status === 1) {
                        this.list_game = res.data.data || [];
                    }
                    this.is_loading = false;
                })
                .catch(err => {
                    console.error("Lỗi lấy danh sách game:", err);
                    this.is_loading = false;
                });
        },
        openModal(game, index) {
            this.selected_game = game;
            this.selected_index = index;
        }
    }
}
</script>

<style scoped></style>
