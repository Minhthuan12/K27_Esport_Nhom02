<template>
    <div class="row">
        <!-- CARD THÊM MỚI -->
        <div class="col-lg-4">
            <div class="card border-top border-3 border-primary shadow-sm">
                <div class="card-header bg-transparent">
                    <b class="text-uppercase text-dark">Thêm Mới Người Dùng</b>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <label class="form-label">Họ và tên</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nhập họ và tên...">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control form-control-sm" placeholder="Nhập email...">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nhập số điện thoại...">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nhập địa chỉ...">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Ảnh đại diện</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nhập link ảnh đại diện...">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Chọn Chức vụ</label>
                        <select class="form-select form-select-sm">
                            <option value="">-- Chọn Chức vụ --</option>
                            <option v-for="role in list_role" :key="role.id" :value="role.id">
                                {{ role.ten_chuc_vu }}
                            </option>
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
                    <button class="btn btn-primary btn-sm">Thêm Người Dùng</button>
                </div>
            </div>
        </div>

        <!-- BẢNG DANH SÁCH -->
        <div class="col-lg-8">
            <div class="card border-top border-3 border-primary shadow-sm">
                <div class="card-header bg-transparent">
                    <b class="text-uppercase text-dark">Danh Sách Người Dùng</b>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0 text-nowrap">
                            <thead class="table-primary text-center align-middle">
                                <tr>
                                    <th>STT</th>
                                    <th>Ảnh</th>
                                    <th>Họ và Tên</th>
                                    <th>Email</th>
                                    <th>Số Điện Thoại</th>
                                    <th style="min-width: 200px;">Địa Chỉ</th>
                                    <th>Chức Vụ</th>
                                    <th>Trạng Thái</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(nguoiDung, index) in list_nguoi_dung" :key="nguoiDung.id">
                                    <td class="text-center align-middle">{{ index + 1 }}</td>
                                    <td class="text-center align-middle">
                                        <img :src="nguoiDung.anh_dai_dien" width="50" class="rounded">
                                    </td>
                                    <td class="align-middle">{{ nguoiDung.ho_va_ten }}</td>
                                    <td class="align-middle">{{ nguoiDung.email }}</td>
                                    <td class="text-center align-middle">{{ nguoiDung.so_dien_thoai }}</td>
                                    <td class="text-wrap align-middle" style="min-width: 200px;">{{ nguoiDung.dia_chi }}
                                    </td>
                                    <td class="align-middle">
                                        <span class="badge bg-info text-dark w-100">{{ nguoiDung.ten_chuc_vu }}</span>
                                    </td>
                                    <td class="text-center align-middle">
                                        <span v-if="nguoiDung.trang_thai" class="btn btn-sm btn-success">
                                            Hoạt động
                                        </span>
                                        <span v-else class="btn btn-sm btn-secondary">
                                            Tạm khóa
                                        </span>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button class="btn btn-primary btn-sm me-1" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            Cập nhật</button>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#XoaModal">Xóa</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL CẬP NHẬT NGƯỜI DÙNG -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật thông tin người dùng</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Họ và tên</label>
                        <input type="text" class="form-control form-control-sm" value="Phạm Ngọc Hân">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" class="form-control form-control-sm" value="han.pham@gmail.com" disabled>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Số điện thoại</label>
                        <input type="text" class="form-control form-control-sm" value="0981000020">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Địa chỉ</label>
                        <input type="text" class="form-control form-control-sm" value="Lâm Đồng">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Ảnh đại diện (URL)</label>
                        <input type="text" class="form-control form-control-sm"
                            value="https://i.pravatar.cc/150?u=han.pham%40gmail.com">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Chức vụ</label>
                        <select class="form-select form-select-sm">
                            <option value="1">Quản trị viên</option>
                            <option value="2">Quản lý giải đấu</option>
                            <option value="3">Trọng tài</option>
                            <option value="4">Phóng viên</option>
                            <option value="5" selected>Thành viên</option>
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


    <!-- MODAL XÓA NGƯỜI DÙNG -->
    <div class="modal fade" id="XoaModal" tabindex="-1" aria-labelledby="XoaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="XoaModalLabel">Xác nhận xóa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        Bạn có chắc chắn muốn xóa người dùng <strong> Phạm Ngọc Hân </strong> này không?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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
            list_nguoi_dung: [],
            list_role: [],
        }
    },
    mounted() {
        this.loadData();
        this.loadRoles();
    },
    methods: {
        loadData() {
            axios.get('http://127.0.0.1:8000/api/admin/nguoi-dung/get-data')
                .then(response => {
                    this.list_nguoi_dung = response.data.data;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        loadRoles() {
            axios.get('http://127.0.0.1:8000/api/admin/chuc-vu/get-data')
                .then(response => {
                    this.list_role = response.data.data;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
}
</script>
<style></style>
