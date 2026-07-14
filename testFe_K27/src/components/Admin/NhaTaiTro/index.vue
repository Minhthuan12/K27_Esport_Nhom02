<template>
    <div class="row">
        <!-- CARD THÊM MỚI -->
        <div class="col-lg-4">
            <div class="card border-top border-3 border-primary shadow-sm">
                <div class="card-header bg-transparent">
                    <b class="text-uppercase text-dark">Thêm Mới Nhà Tài Trợ</b>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <label class="form-label">Tên nhà tài trợ</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nhập tên nhà tài trợ...">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Logo</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nhập đường dẫn logo...">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Tên người đại diện</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nhập tên người đại diện...">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Số điện thoại đại diện</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nhập số điện thoại...">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Email đại diện</label>
                        <input type="email" class="form-control form-control-sm" placeholder="Nhập email...">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Website</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nhập website...">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Mô tả</label>
                        <textarea class="form-control form-control-sm" rows="3" placeholder="Nhập mô tả..."></textarea>
                    </div>
                </div>
                <div class="card-footer bg-transparent text-end">
                    <button class="btn btn-primary btn-sm">Thêm Nhà Tài Trợ</button>
                </div>
            </div>
        </div>

        <!-- BẢNG DANH SÁCH -->
        <div class="col-lg-8">
            <div class="card border-top border-3 border-primary shadow-sm">
                <div class="card-header bg-transparent">
                    <b class="text-uppercase text-dark">Danh Sách Nhà Tài Trợ</b>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0 text-nowrap">
                            <thead class="table-primary text-center align-middle">
                                <tr>
                                    <th>STT</th>
                                    <th>Logo</th>
                                    <th>Tên Nhà Tài Trợ</th>
                                    <th>Người Đại Diện</th>
                                    <th>Số Điện Thoại</th>
                                    <th>Email</th>
                                    <th>Website</th>
                                    <th style="min-width: 250px;">Mô tả</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(nhaTaiTro, index) in list_nha_tai_tro" :key="nhaTaiTro.id">
                                    <td class="text-center align-middle">{{ index + 1 }}</td>
                                    <td class="text-center align-middle">
                                        <img :src="nhaTaiTro.logo" width="50" class="rounded">
                                    </td>
                                    <td class="align-middle">{{ nhaTaiTro.ten_nha_tai_tro }}</td>
                                    <td class="align-middle">{{ nhaTaiTro.ten_nguoi_dai_dien }}</td>
                                    <td class="text-center align-middle">{{ nhaTaiTro.so_dien_thoai_dai_dien }}</td>
                                    <td class="align-middle">{{ nhaTaiTro.email_dai_dien }}</td>
                                    <td class="align-middle">
                                        <a :href="nhaTaiTro.website" target="_blank">{{ nhaTaiTro.website }}</a>
                                    </td>
                                    <td class="text-wrap align-middle" style="min-width: 250px;">{{ nhaTaiTro.mo_ta }}</td>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật nhà tài trợ</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Tên nhà tài trợ</label>
                        <input type="text" class="form-control form-control-sm" value="VNG Corporation">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Logo (URL)</label>
                        <input type="text" class="form-control form-control-sm" value="https://api.dicebear.com/7.x/initials/svg?seed=VNG%20Corporation">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Tên người đại diện</label>
                        <input type="text" class="form-control form-control-sm" value="Lê Hồng Minh">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Số điện thoại đại diện</label>
                        <input type="text" class="form-control form-control-sm" value="02839623888">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Email đại diện</label>
                        <input type="email" class="form-control form-control-sm" value="contact@vng.com.vn">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Website</label>
                        <input type="text" class="form-control form-control-sm" value="https://vng.com.vn">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Mô tả</label>
                        <textarea class="form-control form-control-sm" rows="3">Nhà phát hành game và công ty công nghệ hàng đầu Việt Nam.</textarea>
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
                        Bạn có chắc chắn muốn xóa nhà tài trợ <strong>VNG Corporation</strong> này không?
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
            list_nha_tai_tro: [],
        }
    },
    mounted() {
        this.loadData();
    },
    methods: {
        loadData() {
            axios.get('http://127.0.0.1:8000/api/admin/nha-tai-tro/get-data')
                .then(response => {
                    this.list_nha_tai_tro = response.data.data;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
}
</script>
<style></style>
