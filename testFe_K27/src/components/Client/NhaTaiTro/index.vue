<template>
    <div class="container-fluid px-3 px-lg-5 pt-2 mt-0 mb-4">
        <!-- BREADCRUMB & PAGE TITLE HEADER -->
        <div class="row align-items-center mb-3">
            <div class="col-12 col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="/trang-chu" class="text-decoration-none">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Nhà tài trợ</li>
                    </ol>
                </nav>
                <h3 class="fw-bold text-dark mb-0 d-flex align-items-center">
                    <i class="bx bx-dollar-circle text-primary me-2 fs-2"></i>Nhà Tài Trợ & Đối Tác Chiến Lược
                </h3>
            </div>
            <div class="col-12 col-md-6 text-md-end mt-2 mt-md-0">
                <span class="badge bg-primary-subtle text-primary border border-primary-subtle p-2 px-3 fs-6 rounded-pill">
                    <i class="bx bx-award me-1"></i>{{ list_nha_tai_tro.length }} Thương Hiệu Đồng Hành
                </span>
            </div>
        </div>

        <!-- HERO SPONSORS BANNER -->
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-primary text-white">
            <div class="card-body p-4 p-lg-5 text-center">
                <h2 class="fw-bold mb-3">Tri Ân Các Nhà Tài Trợ & Đối Tác</h2>
                <p class="lead text-white-50 mx-auto mb-4" style="max-width: 700px;">
                    Sự đồng hành của các tập đoàn và thương hiệu hàng đầu thế giới chính là nền tảng vững chắc nâng tầm quy mô giải đấu eSports chuyên nghiệp.
                </p>
                <button class="btn btn-white text-primary btn-lg fw-bold px-4 rounded-pill shadow-sm">
                    <i class="bx bx-handshake me-2 fs-4 align-middle"></i>Trở Thành Đối Tác Tài Trợ
                </button>
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
                            <input v-model="search_query" type="text" class="form-control bg-light border-start-0 ps-0" placeholder="Nhập tên nhà tài trợ, thương hiệu...">
                        </div>
                    </div>

                    <div class="col-12 col-md-6 text-md-end">
                        <button @click="search_query = ''" class="btn btn-outline-secondary fw-semibold">
                            <i class="bx bx-refresh me-1"></i>Đặt Lại Tìm Kiếm
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- SPONSORS GRID (DỮ LIỆU TỪ BACKEND BE) -->
        <div v-if="is_loading" class="text-center py-5">
            <i class="bx bx-loader-alt bx-spin fs-1 text-primary mb-3"></i>
            <h5 class="text-muted">Đang tải danh sách nhà tài trợ từ Backend...</h5>
        </div>

        <div v-else-if="filtered_sponsors.length === 0" class="card border-0 shadow-sm rounded-4 p-5 text-center">
            <i class="bx bx-buildings fs-1 text-muted mb-2"></i>
            <h5 class="fw-bold text-dark">Không tìm thấy nhà tài trợ phù hợp</h5>
            <p class="text-muted">Vui lòng thử lại với tên nhà tài trợ khác.</p>
        </div>

        <div v-else class="row g-4">
            <div v-for="(sponsor, index) in filtered_sponsors" :key="index" class="col-12 col-sm-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center hover-shadow transition position-relative">
                    <span class="position-absolute top-0 end-0 m-3 badge bg-warning text-dark border shadow-xs fw-bold">
                        🥇 Đối Tác Kim Cương
                    </span>

                    <!-- Sponsor Logo Image -->
                    <div class="my-3 d-flex justify-content-center align-items-center" style="height: 80px;">
                        <img v-if="sponsor.logo" :src="sponsor.logo" class="object-fit-contain rounded-3" style="max-width: 100px; max-height: 70px;" :alt="sponsor.ten_nha_tai_tro">
                        <div v-else class="bg-primary-subtle text-primary rounded-circle d-inline-flex p-4 border border-2 border-primary shadow-xs">
                            <i class="bx bx-buildings fs-1"></i>
                        </div>
                    </div>

                    <h5 class="fw-bold text-dark mb-1 text-truncate" :title="sponsor.ten_nha_tai_tro">
                        {{ sponsor.ten_nha_tai_tro }}
                    </h5>
                    <p class="text-muted small text-truncate-2 mb-3" style="line-height: 1.5;">
                        {{ sponsor.mo_ta || 'Đối tác chiến lược đồng hành cùng hệ thống giải đấu eSports quy mô lớn.' }}
                    </p>

                    <div class="bg-light p-3 rounded-3 mb-3 d-flex justify-content-around text-center">
                        <div>
                            <small class="text-muted d-block" style="font-size: 11px;">Đại Diện</small>
                            <span class="fw-bold text-dark fs-6 text-truncate d-block" style="max-width: 80px;">{{ sponsor.ten_nguoi_dai_dien || 'Đối tác' }}</span>
                        </div>
                        <div class="border-start border-end px-3">
                            <small class="text-muted d-block" style="font-size: 11px;">Giải Đồng Hành</small>
                            <span class="fw-bold text-primary fs-6">{{ 3 + (index % 4) }} Giải</span>
                        </div>
                        <div>
                            <small class="text-muted d-block" style="font-size: 11px;">Hợp Tác</small>
                            <span class="fw-bold text-success fs-6">Chính Thức</span>
                        </div>
                    </div>

                    <button @click="openModal(sponsor)" class="btn btn-outline-primary w-100 fw-bold">
                        Xem Chi Tiết Tài Trợ
                    </button>
                </div>
            </div>
        </div>

        <!-- MODAL CHI TIẾT NHÀ TÀI TRỌ (BOOTSTRAP MODAL) -->
        <div v-if="selected_sponsor" class="modal fade show d-block bg-dark bg-opacity-50" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
                    <div class="modal-header bg-primary text-white p-3 px-4">
                        <h5 class="modal-title fw-bold d-flex align-items-center">
                            <i class="bx bx-buildings me-2 fs-4"></i>{{ selected_sponsor.ten_nha_tai_tro }}
                        </h5>
                        <button @click="selected_sponsor = null" type="button" class="btn-close btn-close-white"></button>
                    </div>

                    <div class="modal-body p-4">
                        <div class="text-center mb-4">
                            <div class="my-3 d-flex justify-content-center align-items-center">
                                <img v-if="selected_sponsor.logo" :src="selected_sponsor.logo" class="object-fit-contain rounded-3" style="max-width: 150px; max-height: 100px;" :alt="selected_sponsor.ten_nha_tai_tro">
                                <div v-else class="bg-primary-subtle text-primary p-4 rounded-circle d-inline-flex">
                                    <i class="bx bx-buildings fs-1"></i>
                                </div>
                            </div>
                            <h4 class="fw-bold text-dark mb-1">{{ selected_sponsor.ten_nha_tai_tro }}</h4>
                            <span class="badge bg-warning text-dark border">Đối Tác Kim Cương Đồng Hành</span>
                        </div>

                        <h6 class="fw-bold text-dark mb-2">Thông Tin Liên Hệ & Mô Tả</h6>
                        <ul class="list-group list-group-flush border-top border-bottom mb-3">
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="text-muted">Người đại diện:</span>
                                <strong class="text-dark">{{ selected_sponsor.ten_nguoi_dai_dien }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="text-muted">Số điện thoại:</span>
                                <strong class="text-dark">{{ selected_sponsor.so_dien_thoai_dai_dien }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="text-muted">Email liên hệ:</span>
                                <strong class="text-primary">{{ selected_sponsor.email_dai_dien }}</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span class="text-muted">Website chính thức:</span>
                                <a :href="selected_sponsor.website" target="_blank" class="fw-bold text-decoration-none">{{ selected_sponsor.website }}</a>
                            </li>
                        </ul>

                        <p class="text-muted small" style="line-height: 1.6;">
                            {{ selected_sponsor.mo_ta }}
                        </p>
                    </div>

                    <div class="modal-footer bg-light p-3 px-4">
                        <button @click="selected_sponsor = null" type="button" class="btn btn-secondary fw-bold px-4">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'ClientNhaTaiTro',
    data() {
        return {
            is_loading: true,
            list_nha_tai_tro: [],
            search_query: '',
            selected_sponsor: null
        }
    },
    computed: {
        filtered_sponsors() {
            return this.list_nha_tai_tro.filter(s => {
                const query = this.search_query.toLowerCase();
                return !query || (s.ten_nha_tai_tro && s.ten_nha_tai_tro.toLowerCase().includes(query));
            });
        }
    },
    mounted() {
        this.fetchNhaTaiTroData();
    },
    methods: {
        fetchNhaTaiTroData() {
            this.is_loading = true;
            axios.get('http://127.0.0.1:8000/api/admin/nha-tai-tro/get-data')
                .then(res => {
                    if (res.data.status === 1) {
                        this.list_nha_tai_tro = res.data.data || [];
                    }
                    this.is_loading = false;
                })
                .catch(err => {
                    console.error("Lỗi lấy danh sách nhà tài trợ:", err);
                    this.is_loading = false;
                });
        },
        openModal(sponsor) {
            this.selected_sponsor = sponsor;
        }
    }
}
</script>

<style scoped></style>
