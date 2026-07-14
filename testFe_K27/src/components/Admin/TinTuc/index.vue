<template>
    <div class="row">
        <!-- CARD THÊM MỚI -->
        <div class="col-lg-4">
            <div class="card border-top border-3 border-primary shadow-sm">
                <div class="card-header bg-transparent">
                    <b class="text-uppercase text-dark">Thêm Mới Tin Tức</b>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <label class="form-label">Tiêu đề</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nhập tiêu đề tin tức...">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Chọn Game liên quan</label>
                        <select class="form-select form-select-sm">
                            <option value="">-- Không có --</option>
                            <option v-for="game in list_game" :key="game.id" :value="game.id">
                                {{ game.ten_game }}
                            </option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Chọn Giải đấu liên quan</label>
                        <select class="form-select form-select-sm">
                            <option value="">-- Không có --</option>
                            <option v-for="giaiDau in list_giai_dau" :key="giaiDau.id" :value="giaiDau.id">
                                {{ giaiDau.ten_giai_dau }}
                            </option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Nội dung</label>
                        <textarea class="form-control form-control-sm" rows="5" placeholder="Nhập nội dung tin tức..."></textarea>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Trạng thái</label>
                        <select class="form-select form-select-sm">
                            <option value="1">Hiển thị</option>
                            <option value="0">Tạm ẩn</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer bg-transparent text-end">
                    <button class="btn btn-primary btn-sm">Thêm Tin Tức</button>
                </div>
            </div>
        </div>

        <!-- BẢNG DANH SÁCH -->
        <div class="col-lg-8">
            <div class="card border-top border-3 border-primary shadow-sm">
                <div class="card-header bg-transparent">
                    <b class="text-uppercase text-dark">Danh Sách Tin Tức</b>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0 text-nowrap">
                            <thead class="table-primary text-center align-middle">
                                <tr>
                                    <th>STT</th>
                                    <th style="min-width: 200px;">Tiêu Đề</th>
                                    <th>Game</th>
                                    <th>Giải Đấu</th>
                                    <th style="min-width: 300px;">Nội Dung</th>
                                    <th>Trạng Thái</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(tinTuc, index) in list_tin_tuc" :key="tinTuc.id">
                                    <td class="text-center align-middle">{{ index + 1 }}</td>
                                    <td class="text-wrap align-middle" style="min-width: 200px;">{{ tinTuc.tieu_de }}</td>
                                    <td class="align-middle">{{ tinTuc.ten_game || 'Không có' }}</td>
                                    <td class="align-middle">{{ tinTuc.ten_giai_dau || 'Không có' }}</td>
                                    <td class="text-wrap align-middle" style="min-width: 300px;">{{ tinTuc.noi_dung }}</td>
                                    <td class="text-center align-middle">
                                        <span v-if="tinTuc.trang_thai" class="btn btn-sm btn-success">
                                            Hiển thị
                                        </span>
                                        <span v-else class="btn btn-sm btn-secondary">
                                            Tạm ẩn
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật tin tức</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Tiêu đề</label>
                        <input type="text" class="form-control form-control-sm" value="Giải đấu VCS Mùa Xuân 2024 chính thức công bố lịch thi đấu vòng bảng">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Chọn Game liên quan</label>
                        <select class="form-select form-select-sm">
                            <option value="1" selected>League of Legends</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Chọn Giải đấu liên quan</label>
                        <select class="form-select form-select-sm">
                            <option value="1" selected>VCS Mùa Xuân 2024</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Nội dung</label>
                        <textarea class="form-control form-control-sm" rows="5">Giải đấu thể thao điện tử VCS Mùa Xuân 2024 đã chính thức công bố lịch thi đấu vòng bảng và thể thức tranh tài. Các đội tuyển đang gấp rút chuẩn bị tập luyện để cạnh tranh ngôi vương cùng tổng trị giá giải thưởng vô cùng hấp dẫn.</textarea>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Trạng thái</label>
                        <select class="form-select form-select-sm">
                            <option value="1" selected>Hiển thị</option>
                            <option value="0">Tạm ẩn</option>
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
                        Bạn có chắc chắn muốn xóa tin tức này không?
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
            list_tin_tuc: [],
            list_game: [],
            list_giai_dau: [],
        }
    },
    mounted() {
        this.loadData();
        this.loadGames();
        this.loadGiaiDaus();
    },
    methods: {
        loadData() {
            axios.get('http://127.0.0.1:8000/api/admin/tin-tuc/get-data')
                .then(response => {
                    this.list_tin_tuc = response.data.data;
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
