<template>
    <div class="row">
        <!-- CARD THÊM MỚI -->
        <div class="col-lg-4">
            <div class="card border-top border-3 border-primary shadow-sm">
                <div class="card-header bg-transparent">
                    <b class="text-uppercase text-dark">Thêm Mới Thể Loại</b>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <label class="form-label">Tên thể loại</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nhập tên thể loại game...">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Mô tả</label>
                        <textarea class="form-control form-control-sm" rows="3" placeholder="Nhập mô tả thể loại..."></textarea>
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
                    <button class="btn btn-primary btn-sm">Thêm Thể Loại</button>
                </div>
            </div>
        </div>

        <!-- BẢNG DANH SÁCH -->
        <div class="col-lg-8">
            <div class="card border-top border-3 border-primary shadow-sm">
                <div class="card-header bg-transparent">
                    <b class="text-uppercase text-dark">Danh Sách Thể Loại</b>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0 text-nowrap">
                            <thead class="table-primary text-center align-middle">
                                <tr>
                                    <th>STT</th>
                                    <th>Tên Thể Loại</th>
                                    <th style="min-width: 250px;">Mô Tả</th>
                                    <th>Trạng Thái</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(theLoai, index) in list_the_loai" :key="theLoai.id">
                                    <td class="text-center align-middle">{{ index + 1 }}</td>
                                    <td class="align-middle">{{ theLoai.ten_loai }}</td>
                                    <td class="text-wrap align-middle" style="min-width: 250px;">{{ theLoai.mo_ta }}</td>
                                    <td class="text-center align-middle">
                                        <span v-if="theLoai.trang_thai" class="btn btn-sm btn-success">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật thể loại</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Tên thể loại</label>
                        <input type="text" class="form-control form-control-sm" value="MOBA">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Mô tả</label>
                        <textarea class="form-control form-control-sm" rows="3">Thể loại đấu trường trực tuyến nhiều người chơi.</textarea>
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
                        Bạn có chắc chắn muốn xóa thể loại <strong>MOBA</strong> này không?
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
            list_the_loai: [],
        }
    },
    mounted() {
        this.loadData();
    },
    methods: {
        loadData() {
            axios.get('http://127.0.0.1:8000/api/admin/the-loai/get-data')
                .then(response => {
                    this.list_the_loai = response.data.data;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
}
</script>
<style></style>
