<template>
    <div class="row">
        <!-- CARD THÊM MỚI -->
        <div class="col-lg-4">
            <div class="card border-top border-3 border-primary shadow-sm">
                <div class="card-header bg-transparent">
                    <b class="text-uppercase text-dark">Thêm Mới Trận Đấu</b>
                </div>
                <div class="card-body">
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
                        <label class="form-label">Số lượng đội tham gia</label>
                        <input type="number" class="form-control form-control-sm" value="2">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Thời gian thi đấu</label>
                        <input type="datetime-local" class="form-control form-control-sm">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Thể thức thi đấu</label>
                        <select class="form-select form-select-sm">
                            <option value="Bo1">Bo1 (Best of 1)</option>
                            <option value="Bo3">Bo3 (Best of 3)</option>
                            <option value="Bo5">Bo5 (Best of 5)</option>
                        </select>
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
                    <button class="btn btn-primary btn-sm">Thêm Trận Đấu</button>
                </div>
            </div>
        </div>

        <!-- BẢNG DANH SÁCH -->
        <div class="col-lg-8">
            <div class="card border-top border-3 border-primary shadow-sm">
                <div class="card-header bg-transparent">
                    <b class="text-uppercase text-dark">Danh Sách Trận Đấu</b>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0 text-nowrap">
                            <thead class="table-primary text-center align-middle">
                                <tr>
                                    <th>STT</th>
                                    <th>Giải Đấu</th>
                                    <th>Vòng Đấu</th>
                                    <th>Số Đội</th>
                                    <th>Thời Gian Thi Đấu</th>
                                    <th>Thể Thức</th>
                                    <th>Trạng Thái</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(tranDau, index) in list_tran_dau" :key="tranDau.id">
                                    <td class="text-center align-middle">{{ index + 1 }}</td>
                                    <td class="align-middle">{{ tranDau.ten_giai_dau }}</td>
                                    <td class="align-middle">{{ tranDau.ten_vong_dau }}</td>
                                    <td class="text-center align-middle">{{ tranDau.so_luong_doi }}</td>
                                    <td class="text-center align-middle">{{ tranDau.thoi_gian_thi_dau }}</td>
                                    <td class="text-center align-middle">{{ tranDau.the_thuc }}</td>
                                    <td class="text-center align-middle">
                                        <span v-if="tranDau.trang_thai" class="btn btn-sm btn-success">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật trận đấu</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Chọn Vòng đấu</label>
                        <select class="form-select form-select-sm">
                            <option value="1" selected>VCS Mùa Xuân 2024 - Vòng bảng</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Số lượng đội tham gia</label>
                        <input type="number" class="form-control form-control-sm" value="2">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Thời gian thi đấu</label>
                        <input type="text" class="form-control form-control-sm" value="2024-01-20 15:00:00">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Thể thức thi đấu</label>
                        <select class="form-select form-select-sm">
                            <option value="Best of 3" selected>Best of 3</option>
                        </select>
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
                        Bạn có chắc chắn muốn xóa trận đấu này không?
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
            list_tran_dau: [],
            list_vong_dau: [],
        }
    },
    mounted() {
        this.loadData();
        this.loadVongDaus();
    },
    methods: {
        loadData() {
            axios.get('http://127.0.0.1:8000/api/admin/tran-dau/get-data')
                .then(response => {
                    this.list_tran_dau = response.data.data;
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
        }
    }
}
</script>
<style></style>
