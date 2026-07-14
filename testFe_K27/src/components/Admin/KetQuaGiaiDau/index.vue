<template>
    <div class="row">
        <!-- CARD THÊM MỚI -->
        <div class="col-lg-4">
            <div class="card border-top border-3 border-primary shadow-sm">
                <div class="card-header bg-transparent">
                    <b class="text-uppercase text-dark">Thêm Mới Kết Quả Giải Đấu</b>
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
                        <label class="form-label">Chọn Đội tuyển</label>
                        <select class="form-select form-select-sm">
                            <option value="">-- Chọn Đội tuyển --</option>
                            <option v-for="team in list_team" :key="team.id" :value="team.id">
                                {{ team.ten_doi_tuyen }}
                            </option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Chọn Giải thưởng</label>
                        <select class="form-select form-select-sm">
                            <option value="">-- Chọn Giải thưởng --</option>
                            <option v-for="prize in list_prize" :key="prize.id" :value="prize.id">
                                {{ prize.ten_giai_thuong }} ({{ prize.gia_tri.toLocaleString() }}đ)
                            </option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Hạng chung cuộc</label>
                        <input type="number" class="form-control form-control-sm" value="1">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Điểm tổng tích lũy</label>
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
                    <button class="btn btn-primary btn-sm">Thêm Kết Quả</button>
                </div>
            </div>
        </div>

        <!-- BẢNG DANH SÁCH -->
        <div class="col-lg-8">
            <div class="card border-top border-3 border-primary shadow-sm">
                <div class="card-header bg-transparent">
                    <b class="text-uppercase text-dark">Danh Sách Kết Quả Giải Đấu</b>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0 text-nowrap">
                            <thead class="table-primary text-center align-middle">
                                <tr>
                                    <th>STT</th>
                                    <th>Giải Đấu</th>
                                    <th>Đội Tuyển</th>
                                    <th>Giải Thưởng</th>
                                    <th>Hạng</th>
                                    <th>Tổng Điểm</th>
                                    <th>Trạng Thái</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(result, index) in list_result" :key="result.id">
                                    <td class="text-center align-middle">{{ index + 1 }}</td>
                                    <td class="align-middle">{{ result.ten_giai_dau }}</td>
                                    <td class="align-middle">{{ result.ten_doi_tuyen }}</td>
                                    <td class="align-middle">{{ result.ten_giai_thuong }}</td>
                                    <td class="text-center fw-bold text-primary align-middle">{{ result.hang }}</td>
                                    <td class="text-center align-middle">{{ result.diem_tong }}</td>
                                    <td class="text-center align-middle">
                                        <span v-if="result.trang_thai" class="btn btn-sm btn-success">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật kết quả giải đấu</h1>
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
                        <label class="form-label fw-semibold">Chọn Đội tuyển</label>
                        <select class="form-select form-select-sm">
                            <option value="5" selected>GAM Esports</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Chọn Giải thưởng</label>
                        <select class="form-select form-select-sm">
                            <option value="1" selected>Quán quân</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Hạng chung cuộc</label>
                        <input type="number" class="form-control form-control-sm" value="1">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Điểm tổng tích lũy</label>
                        <input type="number" class="form-control form-control-sm" value="100">
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
                        Bạn có chắc chắn muốn xóa kết quả của đội <strong>GAM Esports</strong> tại giải đấu này không?
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
            list_result: [],
            list_giai_dau: [],
            list_team: [],
            list_prize: [],
        }
    },
    mounted() {
        this.loadData();
        this.loadGiaiDaus();
        this.loadTeams();
        this.loadPrizes();
    },
    methods: {
        loadData() {
            axios.get('http://127.0.0.1:8000/api/admin/ket-qua-giai-dau/get-data')
                .then(response => {
                    this.list_result = response.data.data;
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
        loadTeams() {
            axios.get('http://127.0.0.1:8000/api/admin/doi-tuyen/get-data')
                .then(response => {
                    this.list_team = response.data.data;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        loadPrizes() {
            axios.get('http://127.0.0.1:8000/api/admin/giai-thuong/get-data')
                .then(response => {
                    this.list_prize = response.data.data;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
}
</script>
<style></style>
