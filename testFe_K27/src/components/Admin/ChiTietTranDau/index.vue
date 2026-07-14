<template>
    <div class="row">
        <!-- CARD THÊM MỚI -->
        <div class="col-lg-4">
            <div class="card border-top border-3 border-primary shadow-sm">
                <div class="card-header bg-transparent">
                    <b class="text-uppercase text-dark">Thêm Chi Tiết Trận Đấu</b>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <label class="form-label">Chọn Giải đấu</label>
                        <select class="form-select form-select-sm">
                            <option value="">-- Chọn Giải đấu --</option>
                            <option v-for="giaiDau in list_giai_dau" :key="giaiDau.id" :value="giaiDau.id">
                                {{ giaiDau.ten_giai_dau }}
                            </option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Chọn Vòng đấu</label>
                        <select class="form-select form-select-sm">
                            <option value="">-- Chọn Vòng đấu --</option>
                            <option v-for="vongDau in list_vong_dau" :key="vongDau.id" :value="vongDau.id">
                                {{ vongDau.ten_giai_dau }} - {{ vongDau.ten_vong_dau }}
                            </option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Chọn Trận đấu</label>
                        <select class="form-select form-select-sm">
                            <option value="">-- Chọn Trận đấu --</option>
                            <option v-for="tranDau in list_tran_dau" :key="tranDau.id" :value="tranDau.id">
                                {{ tranDau.ten_giai_dau }} - {{ tranDau.ten_vong_dau }} ({{ tranDau.thoi_gian_thi_dau }})
                            </option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Chọn Đội tuyển tham gia</label>
                        <select class="form-select form-select-sm">
                            <option value="">-- Chọn Đội tuyển --</option>
                            <option v-for="team in list_team" :key="team.id" :value="team.id">
                                {{ team.ten_doi_tuyen }}
                            </option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Điểm số trận đấu</label>
                        <input type="number" class="form-control form-control-sm" value="0">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Trạng thái</label>
                        <select class="form-select form-select-sm">
                            <option value="1">Hoạt động</option>
                            <option value="0">Tạm khóa</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer bg-transparent text-end">
                    <button class="btn btn-primary btn-sm">Thêm Chi Tiết</button>
                </div>
            </div>
        </div>

        <!-- BẢNG DANH SÁCH -->
        <div class="col-lg-8">
            <div class="card border-top border-3 border-primary shadow-sm">
                <div class="card-header bg-transparent">
                    <b class="text-uppercase text-dark">Danh Sách Chi Tiết Trận Đấu</b>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0 text-nowrap">
                            <thead class="table-primary text-center align-middle">
                                <tr>
                                    <th>STT</th>
                                    <th>Giải Đấu</th>
                                    <th>Vòng Đấu</th>
                                    <th>Thời Gian Thi Đấu</th>
                                    <th>Đội Tuyển</th>
                                    <th>Điểm Số</th>
                                    <th>Trạng Thái</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(detail, index) in list_detail" :key="detail.id">
                                    <td class="text-center align-middle">{{ index + 1 }}</td>
                                    <td class="align-middle">{{ detail.ten_giai_dau }}</td>
                                    <td class="align-middle">{{ detail.ten_vong_dau }}</td>
                                    <td class="text-center align-middle">{{ detail.thoi_gian_thi_dau }}</td>
                                    <td class="align-middle fw-bold">{{ detail.ten_doi_tuyen }}</td>
                                    <td class="text-center align-middle fw-bold text-primary">{{ detail.diem_so_tran_dau }}</td>
                                    <td class="text-center align-middle">
                                        <span v-if="detail.trang_thai" class="btn btn-sm btn-success">
                                            Hoạt động
                                        </span>
                                        <span v-else class="btn btn-sm btn-secondary">
                                            Tạm khóa
                                        </span>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button class="btn btn-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#exampleModal">Cập nhật</button>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#XoaModal">Xóa</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL CẬP NHẬT -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật chi tiết trận đấu</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Chọn Giải đấu</label>
                        <select class="form-select form-select-sm">
                            <option value="1" selected>VCS Mùa Xuân 2024</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Chọn Vòng đấu</label>
                        <select class="form-select form-select-sm">
                            <option value="1" selected>Vòng bảng</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Chọn Trận đấu</label>
                        <select class="form-select form-select-sm">
                            <option value="1" selected>VCS Mùa Xuân 2024 - Vòng bảng (2024-01-20 15:00:00)</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Chọn Đội tuyển</label>
                        <select class="form-select form-select-sm">
                            <option value="5" selected>GAM Esports</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Điểm số trận đấu</label>
                        <input type="number" class="form-control form-control-sm" value="2">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Trạng thái</label>
                        <select class="form-select form-select-sm">
                            <option value="1" selected>Hoạt động</option>
                            <option value="0">Tạm khóa</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary btn-sm px-3">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL XÓA -->
    <div class="modal fade" id="XoaModal" tabindex="-1" aria-labelledby="XoaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="XoaModalLabel">Xác nhận xóa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        Bạn có chắc chắn muốn xóa chi tiết trận đấu này của đội <strong>GAM Esports</strong> không?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-sm">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    data() {
        return {
            list_detail: [],
            list_giai_dau: [],
            list_vong_dau: [],
            list_tran_dau: [],
            list_team: [],
        }
    },
    mounted() {
        this.loadData();
        this.loadGiaiDaus();
        this.loadVongDaus();
        this.loadTranDaus();
        this.loadTeams();
    },
    methods: {
        loadData() {
            axios.get('http://127.0.0.1:8000/api/admin/chi-tiet-tran-dau/get-data')
                .then(response => {
                    this.list_detail = response.data.data;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        loadGiaiDaus() {
            axios.get('http://127.0.0.1:8000/api/admin/giai-dau/get-data')
                .then(response => {
                    this.list_giai_dau = response.data.data;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        loadVongDaus() {
            axios.get('http://127.0.0.1:8000/api/admin/vong-dau/get-data')
                .then(response => {
                    this.list_vong_dau = response.data.data;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        loadTranDaus() {
            axios.get('http://127.0.0.1:8000/api/admin/tran-dau/get-data')
                .then(response => {
                    this.list_tran_dau = response.data.data;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        loadTeams() {
            axios.get('http://127.0.0.1:8000/api/admin/doi-tuyen/get-data')
                .then(response => {
                    this.list_team = response.data.data;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
}
</script>
<style></style>
