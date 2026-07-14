<template>
    <div class="row">
        <!-- CARD THÊM MỚI -->
        <div class="col-lg-4">
            <div class="card border-top border-3 border-primary shadow-sm">
                <div class="card-header bg-transparent">
                    <b class="text-uppercase text-dark">Thêm Mới Tuyển Thủ</b>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <label class="form-label">Nickname</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nhập nickname...">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Họ và tên</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nhập họ và tên...">
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
                        <label class="form-label">Vị trí thi đấu</label>
                        <select class="form-select form-select-sm">
                            <option value="Đường trên">Đường trên</option>
                            <option value="Đi rừng">Đi rừng</option>
                            <option value="Đường giữa">Đường giữa</option>
                            <option value="Xạ thủ">Xạ thủ</option>
                            <option value="Hỗ trợ">Hỗ trợ</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Ngày sinh</label>
                        <input type="date" class="form-control form-control-sm">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Giới tính</label>
                        <select class="form-select form-select-sm">
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Quốc tịch</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nhập quốc tịch...">
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
                        <label class="form-label">Ảnh đại diện</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nhập link ảnh đại diện...">
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
                    <button class="btn btn-primary btn-sm">Thêm Tuyển Thủ</button>
                </div>
            </div>
        </div>

        <!-- BẢNG DANH SÁCH -->
        <div class="col-lg-8">
            <div class="card border-top border-3 border-primary shadow-sm">
                <div class="card-header bg-transparent">
                    <b class="text-uppercase text-dark">Danh Sách Tuyển Thủ</b>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0 text-nowrap">
                            <thead class="table-primary text-center align-middle">
                                <tr>
                                    <th>STT</th>
                                    <th>Ảnh</th>
                                    <th>Nickname</th>
                                    <th>Họ và tên</th>
                                    <th>Đội tuyển</th>
                                    <th>Vị trí</th>
                                    <th>Ngày sinh</th>
                                    <th>Giới tính</th>
                                    <th>Quốc tịch</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Trạng thái</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(tuyenThu, index) in list_tuyen_thu" :key="tuyenThu.id">
                                    <td class="text-center align-middle">{{ index + 1 }}</td>
                                    <td class="text-center align-middle">
                                        <img :src="tuyenThu.anh_dai_dien" width="50" class="rounded">
                                    </td>
                                    <td class="align-middle">{{ tuyenThu.nickname }}</td>
                                    <td class="align-middle">{{ tuyenThu.ho_va_ten }}</td>
                                    <td class="align-middle">{{ tuyenThu.ten_doi_tuyen }}</td>
                                    <td class="text-center align-middle">{{ tuyenThu.vi_tri_thi_dau }}</td>
                                    <td class="text-center align-middle">{{ tuyenThu.ngay_sinh }}</td>
                                    <td class="text-center align-middle">{{ tuyenThu.gioi_tinh }}</td>
                                    <td class="text-center align-middle">{{ tuyenThu.quoc_tich }}</td>
                                    <td class="align-middle">{{ tuyenThu.email }}</td>
                                    <td class="text-center align-middle">{{ tuyenThu.so_dien_thoai }}</td>
                                    <td class="text-center align-middle">
                                        <span v-if="tuyenThu.trang_thai" class="btn btn-sm btn-success">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật thông tin tuyển thủ</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Nickname</label>
                        <input type="text" class="form-control form-control-sm" value="Artemis">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Họ và tên</label>
                        <input type="text" class="form-control form-control-sm" value="Trần Quốc Hưng">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Chọn Đội tuyển</label>
                        <select class="form-select form-select-sm">
                            <option value="1" selected>Cerberus Esports</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Vị trí thi đấu</label>
                        <select class="form-select form-select-sm">
                            <option value="AD Carry" selected>AD Carry</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Ngày sinh</label>
                        <input type="date" class="form-control form-control-sm" value="2001-10-20">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Giới tính</label>
                        <select class="form-select form-select-sm">
                            <option value="Nam" selected>Nam</option>
                            <option value="Nữ">Nữ</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Quốc tịch</label>
                        <input type="text" class="form-control form-control-sm" value="Việt Nam">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" class="form-control form-control-sm" value="artemis@ces.vn">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Số điện thoại</label>
                        <input type="text" class="form-control form-control-sm" value="0912000001">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Ảnh đại diện (URL)</label>
                        <input type="text" class="form-control form-control-sm" value="https://i.pravatar.cc/150?u=Artemis">
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
                        Bạn có chắc chắn muốn xóa tuyển thủ <strong>Artemis</strong> này không?
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
            list_tuyen_thu: [],
            list_team: [],
        }
    },
    mounted() {
        this.loadData();
        this.loadTeams();
    },
    methods: {
        loadData() {
            axios.get('http://127.0.0.1:8000/api/admin/tuyen-thu/get-data')
                .then(response => {
                    this.list_tuyen_thu = response.data.data;
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
