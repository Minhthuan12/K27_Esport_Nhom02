<template>
    <div class="container-fluid px-3 px-lg-5 pt-2 mt-0 mb-4">
        <!-- BREADCRUMB & PAGE TITLE HEADER -->
        <div class="row align-items-center mb-3">
            <div class="col-12 col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="/trang-chu" class="text-decoration-none">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tin tức</li>
                    </ol>
                </nav>
                <h3 class="fw-bold text-dark mb-0 d-flex align-items-center">
                    <i class="bx bx-news text-primary me-2 fs-2"></i>Tin Tức & Sự Kiện eSports
                </h3>
            </div>
            <div class="col-12 col-md-6 text-md-end mt-2 mt-md-0">
                <span class="badge bg-primary-subtle text-primary border border-primary-subtle p-2 px-3 fs-6 rounded-pill">
                    <i class="bx bx-time-five me-1"></i>Cập Nhật Mới Nhất 24/7
                </span>
            </div>
        </div>

        <!-- HERO FEATURED ARTICLE BANNER -->
        <div v-if="list_tin_tuc.length > 0" class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-dark text-white">
            <div class="row g-0 align-items-center">
                <div class="col-12 col-lg-7">
                    <img :src="newsImages[0]" class="w-100 object-fit-cover" style="height: 320px;" alt="Featured news cover">
                </div>
                <div class="col-12 col-lg-5 p-4 p-lg-5">
                    <span class="badge bg-danger p-2 px-3 rounded-pill fw-bold mb-2">🔥 TIN TIÊU ĐIỂM</span>
                    <span class="badge bg-light text-dark ms-2 fw-semibold">{{ list_tin_tuc[0].ten_game || 'eSports' }}</span>
                    <h4 class="fw-bold my-3 lh-base text-truncate-2">{{ list_tin_tuc[0].tieu_de }}</h4>
                    <p class="text-white-50 small text-truncate-3 mb-4" style="line-height: 1.6;">
                        {{ list_tin_tuc[0].noi_dung }}
                    </p>
                    <button @click="openModal(list_tin_tuc[0])" class="btn btn-primary fw-bold px-4 rounded-pill shadow-sm">
                        Đọc Chi Tiết <i class="bx bx-right-arrow-alt align-middle ms-1 fs-5"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- SEARCH & CATEGORY FILTER TABS -->
        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-body p-3 p-lg-4">
                <div class="row g-3 align-items-center">
                    <div class="col-12 col-md-5">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="bx bx-search text-muted fs-5"></i>
                            </span>
                            <input v-model="search_query" type="text" class="form-control bg-light border-start-0 ps-0" placeholder="Tìm kiếm bài viết, từ khóa...">
                        </div>
                    </div>

                    <div class="col-12 col-md-7">
                        <div class="d-flex gap-2 flex-wrap justify-content-md-end">
                            <button @click="selected_category = ''" :class="['btn', 'btn-sm', selected_category === '' ? 'btn-primary fw-bold' : 'btn-outline-primary']">Tất Cả</button>
                            <button @click="selected_category = 'Cập Nhật Game'" :class="['btn', 'btn-sm', selected_category === 'Cập Nhật Game' ? 'btn-primary fw-bold' : 'btn-outline-primary']">Cập Nhật Game</button>
                            <button @click="selected_category = 'Chuyển Nhượng'" :class="['btn', 'btn-sm', selected_category === 'Chuyển Nhượng' ? 'btn-primary fw-bold' : 'btn-outline-primary']">Chuyển Nhượng</button>
                            <button @click="selected_category = 'Sự Kiện'" :class="['btn', 'btn-sm', selected_category === 'Sự Kiện' ? 'btn-primary fw-bold' : 'btn-outline-primary']">Sự Kiện</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- MAIN CONTENT: NEWS GRID + SIDEBAR WIDGETS -->
        <div class="row g-4">
            <!-- Left Column: News Articles Grid -->
            <div class="col-12 col-lg-8">
                <div v-if="is_loading" class="text-center py-5">
                    <i class="bx bx-loader-alt bx-spin fs-1 text-primary mb-3"></i>
                    <h5 class="text-muted">Đang tải bài viết tin tức từ Backend...</h5>
                </div>

                <div v-else-if="filtered_news.length === 0" class="card border-0 shadow-sm rounded-4 p-5 text-center">
                    <i class="bx bx-news fs-1 text-muted mb-2"></i>
                    <h5 class="fw-bold text-dark">Không tìm thấy bài viết phù hợp</h5>
                    <p class="text-muted">Vui lòng thay đổi từ khóa hoặc bộ lọc danh mục.</p>
                </div>

                <div v-else class="row g-4">
                    <div v-for="(news, index) in filtered_news" :key="index" class="col-12 col-md-6">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden hover-shadow transition">
                            <div class="position-relative">
                                <img :src="newsImages[index % newsImages.length]" class="card-img-top object-fit-cover" style="height: 180px;" alt="News thumbnail">
                                <span class="position-absolute top-0 end-0 m-3 badge bg-primary border border-white shadow-sm fw-bold">
                                    {{ news.ten_game || 'eSports' }}
                                </span>
                            </div>

                            <div class="card-body p-4 d-flex flex-column justify-content-between">
                                <div>
                                    <div class="d-flex align-items-center gap-2 mb-2">
                                        <small class="text-muted"><i class="bx bx-calendar me-1 text-primary"></i>Hôm nay</small>
                                        <small class="text-muted">•</small>
                                        <small class="text-muted"><i class="bx bx-user me-1 text-primary"></i>Ban Biên Tập</small>
                                    </div>
                                    <h6 class="card-title fw-bold text-dark text-truncate-2 mb-2" :title="news.tieu_de">
                                        {{ news.tieu_de }}
                                    </h6>
                                    <p class="card-text text-muted small text-truncate-3 mb-3" style="line-height: 1.5;">
                                        {{ news.noi_dung }}
                                    </p>
                                </div>

                                <button @click="openModal(news)" class="btn btn-outline-primary w-100 fw-bold border-2">
                                    Xem Chi Tiết Bài Viết
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Sidebar Widgets -->
            <div class="col-12 col-lg-4">
                <!-- Widget 1: Hot Trending News -->
                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                    <h6 class="fw-bold text-dark mb-3 d-flex align-items-center">
                        <i class="bx bx-trending-up text-danger me-2 fs-4"></i>Bài Viết Xem Nhiều
                    </h6>

                    <div class="d-flex flex-column gap-3">
                        <div v-for="(item, idx) in list_tin_tuc.slice(0, 3)" :key="idx" @click="openModal(item)" class="d-flex gap-3 align-items-center cursor-pointer hover-opacity border-bottom pb-2">
                            <span class="fs-4 fw-bold text-primary opacity-50 me-1">0{{ idx + 1 }}</span>
                            <div>
                                <h6 class="fw-bold text-dark small mb-1 text-truncate-2" :title="item.tieu_de">
                                    {{ item.tieu_de }}
                                </h6>
                                <small class="text-muted d-block" style="font-size: 11px;">1.2k lượt xem • {{ item.ten_game || 'eSports' }}</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Widget 2: Newsletter Box -->
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-primary text-white text-center">
                    <i class="bx bx-envelope fs-1 mb-2"></i>
                    <h5 class="fw-bold mb-2">Đăng Ký Nhận Bản Tin</h5>
                    <p class="small text-white-50 mb-3">Nhận ngay thông báo tin tức hot và lịch thi đấu mới nhất hàng tuần qua email.</p>
                    
                    <div class="mb-2">
                        <input type="email" class="form-control text-center bg-white border-0 py-2" placeholder="Nhập email của bạn...">
                    </div>
                    <button class="btn btn-dark w-100 fw-bold shadow-sm">Đăng Ký Ngay</button>
                </div>
            </div>
        </div>

        <!-- MODAL NỘI DUNG BÀI VIẾT (BOOTSTRAP MODAL) -->
        <div v-if="selected_article" class="modal fade show d-block bg-dark bg-opacity-50" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
                    <div class="modal-header bg-primary text-white p-3 px-4">
                        <h5 class="modal-title fw-bold text-truncate" style="max-width: 650px;">
                            {{ selected_article.tieu_de }}
                        </h5>
                        <button @click="selected_article = null" type="button" class="btn-close btn-close-white"></button>
                    </div>

                    <div class="modal-body p-4">
                        <div class="d-flex align-items-center justify-content-between mb-3 text-muted small border-bottom pb-2">
                            <div>Chuyên mục: <strong class="text-primary">{{ selected_article.ten_game || 'eSports' }}</strong></div>
                            <div>Đăng bởi: <strong>Ban Biên Tập Rocker</strong></div>
                        </div>

                        <img :src="newsImages[0]" class="w-100 rounded-3 mb-4 object-fit-cover" style="height: 240px;" alt="Article cover">

                        <h5 class="fw-bold text-dark mb-3">{{ selected_article.tieu_de }}</h5>

                        <p class="text-dark small lh-lg" style="white-space: pre-line;">
                            {{ selected_article.noi_dung }}
                        </p>
                    </div>

                    <div class="modal-footer bg-light p-3 px-4">
                        <button @click="selected_article = null" type="button" class="btn btn-secondary fw-bold px-4">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'ClientTinTuc',
    data() {
        return {
            is_loading: true,
            list_tin_tuc: [],
            search_query: '',
            selected_category: '',
            selected_article: null,
            newsImages: [
                'https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&w=800',
                'https://images.unsplash.com/photo-1511512578047-dfb367046420?auto=format&fit=crop&w=800',
                'https://images.unsplash.com/photo-1538481199705-c710c4e965fc?auto=format&fit=crop&w=800',
                'https://images.unsplash.com/photo-1615663245857-ac93bb7c39e7?auto=format&fit=crop&w=800'
            ]
        }
    },
    computed: {
        filtered_news() {
            return this.list_tin_tuc.filter(news => {
                const query = this.search_query.toLowerCase();
                const matchQuery = !query || 
                    (news.tieu_de && news.tieu_de.toLowerCase().includes(query)) ||
                    (news.noi_dung && news.noi_dung.toLowerCase().includes(query));

                const matchCat = !this.selected_category || true;
                return matchQuery && matchCat;
            });
        }
    },
    mounted() {
        this.fetchTinTucData();
    },
    methods: {
        fetchTinTucData() {
            this.is_loading = true;
            axios.get('http://127.0.0.1:8000/api/admin/tin-tuc/get-data')
                .then(res => {
                    if (res.data.status === 1) {
                        this.list_tin_tuc = res.data.data || [];
                    }
                    this.is_loading = false;
                })
                .catch(err => {
                    console.error("Lỗi lấy danh sách tin tức:", err);
                    this.is_loading = false;
                });
        },
        openModal(news) {
            this.selected_article = news;
        }
    }
}
</script>

<style scoped></style>
