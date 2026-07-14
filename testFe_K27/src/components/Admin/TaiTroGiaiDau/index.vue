<template>
    <div class="row">
        <!-- CARD THÊM MỚI -->
        <div class="col-lg-4">
            <div class="card border-top border-3 border-primary shadow-sm">
                <div class="card-header bg-transparent">
                    <b class="text-uppercase text-dark">Thêm Mới Tài Trợ Giải Đấu</b>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <label class="form-label">Chọn Nhà tài trợ</label>
                        <select class="form-select form-select-sm">
                            <option value="">-- Chọn Nhà tài trợ --</option>
                            <option v-for="sponsor in list_sponsor" :key="sponsor.id" :value="sponsor.id">
                                {{ sponsor.ten_nha_tai_tro }}
                            </option>
                        </select>
                    </div>
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
                        <label class="form-label">Tổng tiền tài trợ</label>
                        <input type="number" class="form-control form-control-sm" value="100000000">
                    </div>
                </div>
                <div class="card-footer bg-transparent text-end">
                    <button class="btn btn-primary btn-sm">Thêm Tài Trợ</button>
                </div>
            </div>
        </div>

        <!-- BẢNG DANH SÁCH -->
        <div class="col-lg-8">
            <div class="card border-top border-3 border-primary shadow-sm">
                <div class="card-header bg-transparent">
                    <b class="text-uppercase text-dark">Danh Sách Tài Trợ Giải Đấu</b>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0 text-nowrap">
                            <thead class="table-primary text-center align-middle">
                                <tr>
                                    <th>STT</th>
                                    <th>Nhà Tài Trợ</th>
                                    <th>Giải Đấu</th>
                                    <th>Tổng Tài Trợ</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(taiTro, index) in list_tai_tro" :key="taiTro.id">
                                    <td class="text-center align-middle">{{ index + 1 }}</td>
                                    <td class="align-middle">{{ taiTro.ten_nha_tai_tro }}</td>
                                    <td class="align-middle">{{ taiTro.ten_giai_dau }}</td>
                                    <td class="text-end align-middle fw-bold text-success">
                                        {{ taiTro.tong_tai_tro.toLocaleString() }} VNĐ
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật tài trợ giải đấu</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Chọn Nhà tài trợ</label>
                        <select class="form-select form-select-sm">
                            <option value="1" selected>VNG Corporation</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Chọn Giải đấu</label>
                        <select class="form-select form-select-sm">
                            <option value="1" selected>VCS Mùa Xuân 2024</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Tổng tài trợ</label>
                        <input type="number" class="form-control form-control-sm" value="1000000000">
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
                        Bạn có chắc chắn muốn xóa tài trợ của nhà tài trợ <strong>VNG Corporation</strong> cho giải đấu này không?
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
            list_tai_tro: [],
            list_sponsor: [],
            list_giai_dau: [],
        }
    },
    mounted() {
        this.loadData();
        this.loadSponsors();
        this.loadGiaiDaus();
    },
    methods: {
        loadData() {
            axios.get('http://127.0.0.1:8000/api/admin/tai-tro-giai-dau/get-data')
                .then(response => {
                    this.list_tai_tro = response.data.data;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        loadSponsors() {
            axios.get('http://127.0.0.1:8000/api/admin/nha-tai-tro/get-data')
                .then(response => {
                    this.list_sponsor = response.data.data;
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
        }
    }
}
</script>
<style></style>
