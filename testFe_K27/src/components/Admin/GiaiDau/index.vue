<template>
    <div class="row">
        <!-- CARD THÊM MỚI -->
        <div class="col-lg-4">
            <div class="card border-top border-3 border-primary shadow-sm">
                <div class="card-header bg-transparent">
                    <b class="text-uppercase text-dark">Thêm Mới Giải Đấu</b>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <label class="form-label">Tên giải đấu</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nhập tên giải đấu...">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Chọn Game</label>
                        <select class="form-select form-select-sm">
                            <option value="">-- Chọn Game --</option>
                            <option v-for="game in list_game" :key="game.id" :value="game.id">
                                {{ game.ten_game }}
                            </option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Logo</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nhập đường dẫn logo...">
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
                        <label class="form-label">Hình thức thi đấu</label>
                        <select class="form-select form-select-sm">
                            <option value="Online">Online</option>
                            <option value="Offline">Offline</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Địa điểm</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nhập địa điểm...">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Số lượng đội</label>
                        <input type="number" class="form-control form-control-sm" value="8">
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
                    <button class="btn btn-primary btn-sm">Thêm Giải Đấu</button>
                </div>
            </div>
        </div>

        <!-- BẢNG DANH SÁCH -->
        <div class="col-lg-8">
            <div class="card border-top border-3 border-primary shadow-sm">
                <div class="card-header bg-transparent">
                    <b class="text-uppercase text-dark">Danh Sách Giải Đấu</b>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0 text-nowrap">
                            <thead class="table-primary text-center align-middle">
                                <tr>
                                    <th>STT</th>
                                    <th>Logo</th>
                                    <th>Tên Giải Đấu</th>
                                    <th>Game</th>
                                    <th>Hình Thức</th>
                                    <th>Địa Điểm</th>
                                    <th>Số Đội</th>
                                    <th>Bắt Đầu</th>
                                    <th>Kết Thúc</th>
                                    <th>Trạng Thái</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(giaiDau, index) in list_giai_dau" :key="giaiDau.id">
                                    <td class="text-center align-middle">{{ index + 1 }}</td>
                                    <td class="text-center align-middle">
                                        <img :src="giaiDau.logo" width="50" class="rounded">
                                    </td>
                                    <td class="align-middle">{{ giaiDau.ten_giai_dau }}</td>
                                    <td class="align-middle">{{ giaiDau.ten_game }}</td>
                                    <td class="text-center align-middle">{{ giaiDau.hinh_thuc_thi_dau }}</td>
                                    <td class="align-middle">{{ giaiDau.dia_diem }}</td>
                                    <td class="text-center align-middle">{{ giaiDau.so_luong_doi }}</td>
                                    <td class="text-center align-middle">{{ giaiDau.ngay_bat_dau }}</td>
                                    <td class="text-center align-middle">{{ giaiDau.ngay_ket_thuc }}</td>
                                    <td class="text-center align-middle">
                                        <span v-if="giaiDau.trang_thai" class="btn btn-sm btn-success">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật giải đấu</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Tên giải đấu</label>
                        <input type="text" class="form-control form-control-sm" value="VCS Mùa Xuân 2024">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Chọn Game</label>
                        <select class="form-select form-select-sm">
                            <option value="1" selected>League of Legends</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Logo (URL)</label>
                        <input type="text" class="form-control form-control-sm" value="https://api.dicebear.com/7.x/initials/svg?seed=VCS%20M%C3%B9a%20Xu%C3%A2n%202024">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Ngày bắt đầu</label>
                        <input type="date" class="form-control form-control-sm" value="2024-01-20">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Ngày kết thúc</label>
                        <input type="date" class="form-control form-control-sm" value="2024-04-20">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Hình thức thi đấu</label>
                        <select class="form-select form-select-sm">
                            <option value="Vòng tròn + Playoff" selected>Vòng tròn + Playoff</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Địa điểm</label>
                        <input type="text" class="form-control form-control-sm" value="GG Stadium TP.HCM">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Số lượng đội</label>
                        <input type="number" class="form-control form-control-sm" value="8">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Mô tả</label>
                        <textarea class="form-control form-control-sm" rows="3">Giải vô địch Liên Minh Huyền Thoại Việt Nam mùa xuân 2024.</textarea>
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
                        Bạn có chắc chắn muốn xóa giải đấu <strong>VCS Mùa Xuân 2024</strong> này không?
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
            list_giai_dau: [],
            list_game: [],
        }
    },
    mounted() {
        this.loadData();
        this.loadGames();
    },
    methods: {
        loadData() {
            axios.get('http://127.0.0.1:8000/api/admin/giai-dau/get-data')
                .then(response => {
                    this.list_giai_dau = response.data.data;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        loadGames() {
            axios.get('http://127.0.0.1:8000/api/admin/game/get-data')
                .then(response => {
                    this.list_game = response.data.data;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
}
</script>
<style></style>
