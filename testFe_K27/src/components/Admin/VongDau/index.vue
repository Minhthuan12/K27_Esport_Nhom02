<template>
    <div class="row">
        <!-- CARD THÊM MỚI -->
        <div class="col-lg-4">
            <div class="card border-top border-3 border-primary shadow-sm">
                <div class="card-header bg-transparent">
                    <b class="text-uppercase text-dark">Thêm Mới Vòng Đấu</b>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <label class="form-label">Tên vòng đấu</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nhập tên vòng đấu...">
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
                        <label class="form-label">Ngày bắt đầu</label>
                        <input type="date" class="form-control form-control-sm">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Ngày kết thúc</label>
                        <input type="date" class="form-control form-control-sm">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Số đội tham gia</label>
                        <input type="number" class="form-control form-control-sm" value="8">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Hình thức thi đấu</label>
                        <select class="form-select form-select-sm">
                            <option value="Nhánh thắng nhánh thua">Nhánh thắng nhánh thua</option>
                            <option value="Vòng tròn tính điểm">Vòng tròn tính điểm</option>
                            <option value="Loại trực tiếp">Loại trực tiếp</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Địa điểm</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nhập địa điểm...">
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
                    <button class="btn btn-primary btn-sm">Thêm Vòng Đấu</button>
                </div>
            </div>
        </div>

        <!-- BẢNG DANH SÁCH -->
        <div class="col-lg-8">
            <div class="card border-top border-3 border-primary shadow-sm">
                <div class="card-header bg-transparent">
                    <b class="text-uppercase text-dark">Danh Sách Vòng Đấu</b>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0 text-nowrap">
                            <thead class="table-primary text-center align-middle">
                                <tr>
                                    <th>STT</th>
                                    <th>Tên Vòng Đấu</th>
                                    <th>Giải Đấu</th>
                                    <th>Bắt Đầu</th>
                                    <th>Kết Thúc</th>
                                    <th>Số Đội</th>
                                    <th>Hình Thức</th>
                                    <th>Địa Điểm</th>
                                    <th>Trạng Thái</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(vongDau, index) in list_vong_dau" :key="vongDau.id">
                                    <td class="text-center align-middle">{{ index + 1 }}</td>
                                    <td class="align-middle">{{ vongDau.ten_vong_dau }}</td>
                                    <td class="align-middle">{{ vongDau.ten_giai_dau }}</td>
                                    <td class="text-center align-middle">{{ vongDau.ngay_bat_dau }}</td>
                                    <td class="text-center align-middle">{{ vongDau.ngay_ket_thuc }}</td>
                                    <td class="text-center align-middle">{{ vongDau.so_doi_tham_gia }}</td>
                                    <td class="align-middle">{{ vongDau.hinh_thuc_thi_dau }}</td>
                                    <td class="align-middle">{{ vongDau.dia_diem }}</td>
                                    <td class="text-center align-middle">
                                        <span v-if="vongDau.trang_thai" class="btn btn-sm btn-success">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật vòng đấu</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Tên vòng đấu</label>
                        <input type="text" class="form-control form-control-sm" value="Vòng bảng">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Chọn Giải đấu</label>
                        <select class="form-select form-select-sm">
                            <option value="1" selected>VCS Mùa Xuân 2024</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Ngày bắt đầu</label>
                        <input type="date" class="form-control form-control-sm" value="2024-01-20">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Ngày kết thúc</label>
                        <input type="date" class="form-control form-control-sm" value="2024-03-31">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Số đội tham gia</label>
                        <input type="number" class="form-control form-control-sm" value="8">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Hình thức thi đấu</label>
                        <select class="form-select form-select-sm">
                            <option value="Vòng tròn 2 lượt" selected>Vòng tròn 2 lượt</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Địa điểm</label>
                        <input type="text" class="form-control form-control-sm" value="GG Stadium TP.HCM">
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
                        Bạn có chắc chắn muốn xóa vòng đấu <strong>Vòng bảng</strong> này không?
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
            list_vong_dau: [],
            list_giai_dau: [],
        }
    },
    mounted() {
        this.loadData();
        this.loadGiaiDaus();
    },
    methods: {
        loadData() {
            axios.get('http://127.0.0.1:8000/api/admin/vong-dau/get-data')
                .then(response => {
                    this.list_vong_dau = response.data.data;
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
