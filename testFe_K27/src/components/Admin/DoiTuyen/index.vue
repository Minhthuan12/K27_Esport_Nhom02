<template>
    <div class="row">
        <!-- CARD THÊM MỚI -->
        <div class="col-lg-4">
            <div class="card border-top border-3 border-primary shadow-sm">
                <div class="card-header bg-transparent">
                    <b class="text-uppercase text-dark">Thêm Mới Đội Tuyển</b>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <label class="form-label">Tên đội tuyển</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nhập tên đội tuyển...">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Tên viết tắt</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nhập tên viết tắt...">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Logo</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nhập đường dẫn logo...">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Người quản lý</label>
                        <select class="form-select form-select-sm">
                            <option value="">-- Chọn người quản lý --</option>
                            <option v-for="user in list_user" :key="user.id" :value="user.id">
                                {{ user.ho_va_ten }} ({{ user.email }})
                            </option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Mô tả</label>
                        <textarea class="form-control form-control-sm" rows="3" placeholder="Nhập mô tả..."></textarea>
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
                    <button class="btn btn-primary btn-sm">Thêm Đội Tuyển</button>
                </div>
            </div>
        </div>

        <!-- BẢNG DANH SÁCH -->
        <div class="col-lg-8">
            <div class="card border-top border-3 border-primary shadow-sm">
                <div class="card-header bg-transparent">
                    <b class="text-uppercase text-dark">Danh Sách Đội Tuyển</b>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0 text-nowrap">
                            <thead class="table-primary text-center align-middle">
                                <tr>
                                    <th>STT</th>
                                    <th>Logo</th>
                                    <th>Tên đội tuyển</th>
                                    <th>Tên viết tắt</th>
                                    <th>Người quản lý</th>
                                    <th style="min-width: 250px;">Mô tả</th>
                                    <th>Trạng thái</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(doiTuyen, index) in list_doi_tuyen" :key="doiTuyen.id">
                                    <td class="text-center align-middle">{{ index + 1 }}</td>
                                    <td class="text-center align-middle">
                                        <img :src="doiTuyen.logo" width="50" class="rounded">
                                    </td>
                                    <td class="align-middle">{{ doiTuyen.ten_doi_tuyen }}</td>
                                    <td class="text-center align-middle">{{ doiTuyen.ten_viet_tat }}</td>
                                    <td class="align-middle">{{ doiTuyen.ho_va_ten }}</td>
                                    <td class="text-wrap align-middle" style="min-width: 250px;">{{ doiTuyen.mo_ta }}</td>
                                    <td class="text-center align-middle">
                                        <span v-if="doiTuyen.trang_thai" class="btn btn-sm btn-success">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật thông tin đội tuyển</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Tên đội tuyển</label>
                        <input type="text" class="form-control form-control-sm" value="Cerberus Esports">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Tên viết tắt</label>
                        <input type="text" class="form-control form-control-sm" value="CES">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Logo (URL)</label>
                        <input type="text" class="form-control form-control-sm" value="https://api.dicebear.com/7.x/initials/svg?seed=Cerberus%20Esports">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Người quản lý</label>
                        <select class="form-select form-select-sm">
                            <option value="1" selected>Nguyễn Quốc Bảo</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Mô tả</label>
                        <textarea class="form-control form-control-sm" rows="3">Đội tuyển Esport chuyên nghiệp tại Việt Nam.</textarea>
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
                        Bạn có chắc chắn muốn xóa đội tuyển <strong>Cerberus Esports</strong> này không?
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
            list_doi_tuyen: [],
            list_user: [],
        }
    },
    mounted() {
        this.loadData();
        this.loadUsers();
    },
    methods: {
        loadData() {
            axios.get('http://127.0.0.1:8000/api/admin/doi-tuyen/get-data')
                .then(response => {
                    this.list_doi_tuyen = response.data.data;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        loadUsers() {
            axios.get('http://127.0.0.1:8000/api/admin/nguoi-dung/get-data')
                .then(response => {
                    this.list_user = response.data.data;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
}
</script>
<style></style>
