<template>
    <div class="row">
        <!-- CARD THÊM MỚI -->
        <div class="col-lg-4">
            <div class="card border-top border-3 border-primary shadow-sm">
                <div class="card-header bg-transparent">
                    <b class="text-uppercase text-dark">Thêm Mới Giải Thưởng</b>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <label class="form-label">Tên giải thưởng</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nhập tên giải thưởng...">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Giá trị giải thưởng</label>
                        <input type="number" class="form-control form-control-sm" value="5000000">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Phân loại giải thưởng</label>
                        <select class="form-select form-select-sm">
                            <option value="1">Cá nhân (MVP, Player...)</option>
                            <option value="0">Đồng đội (Team...)</option>
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
                    <button class="btn btn-primary btn-sm">Thêm Giải Thưởng</button>
                </div>
            </div>
        </div>

        <!-- BẢNG DANH SÁCH -->
        <div class="col-lg-8">
            <div class="card border-top border-3 border-primary shadow-sm">
                <div class="card-header bg-transparent">
                    <b class="text-uppercase text-dark">Danh Sách Giải Thưởng</b>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0 text-nowrap">
                            <thead class="table-primary text-center align-middle">
                                <tr>
                                    <th>STT</th>
                                    <th>Tên Giải Thưởng</th>
                                    <th>Giá Trị</th>
                                    <th>Phân Loại</th>
                                    <th>Trạng Thái</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(giaiThuong, index) in list_giai_thuong" :key="giaiThuong.id">
                                    <td class="text-center align-middle">{{ index + 1 }}</td>
                                    <td class="align-middle">{{ giaiThuong.ten_giai_thuong }}</td>
                                    <td class="text-end align-middle fw-bold text-success">
                                        {{ giaiThuong.gia_tri.toLocaleString() }} VNĐ
                                    </td>
                                    <td class="text-center align-middle">
                                        <span v-if="giaiThuong.is_ca_nhan" class="badge bg-info text-dark">
                                            Cá nhân
                                        </span>
                                        <span v-else class="badge bg-secondary">
                                            Đồng đội
                                        </span>
                                    </td>
                                    <td class="text-center align-middle">
                                        <span v-if="giaiThuong.trang_thai" class="btn btn-sm btn-success">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật giải thưởng</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Tên giải thưởng</label>
                        <input type="text" class="form-control form-control-sm" value="Quán quân">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Giá trị giải thưởng</label>
                        <input type="number" class="form-control form-control-sm" value="50000000">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Phân loại giải thưởng</label>
                        <select class="form-select form-select-sm">
                            <option value="1">Cá nhân (MVP, Player...)</option>
                            <option value="0" selected>Đồng đội (Team...)</option>
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
                        Bạn có chắc chắn muốn xóa giải thưởng <strong>Quán quân</strong> này không?
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
            list_giai_thuong: [],
        }
    },
    mounted() {
        this.loadData();
    },
    methods: {
        loadData() {
            axios.get('http://127.0.0.1:8000/api/admin/giai-thuong/get-data')
                .then(response => {
                    this.list_giai_thuong = response.data.data;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
}
</script>
<style></style>
