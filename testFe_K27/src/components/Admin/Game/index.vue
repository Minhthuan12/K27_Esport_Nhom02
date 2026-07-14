<template>
    <div class="row">
        <!-- CARD THÊM MỚI -->
        <div class="col-lg-4">
            <div class="card border-top border-3 border-primary shadow-sm">
                <div class="card-header bg-transparent">
                    <b class="text-uppercase text-dark">Thêm Mới Trò Chơi</b>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <label class="form-label">Tên game</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nhập tên game...">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Nhà phát hành</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nhập nhà phát hành...">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Logo</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nhập đường dẫn logo...">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Chọn Thể loại</label>
                        <select class="form-select form-select-sm">
                            <option value="">-- Chọn Thể loại --</option>
                            <option v-for="cat in list_cat" :key="cat.id" :value="cat.id">
                                {{ cat.ten_loai }}
                            </option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Mô tả</label>
                        <textarea class="form-control form-control-sm" rows="3" placeholder="Nhập mô tả game..."></textarea>
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
                    <button class="btn btn-primary btn-sm">Thêm Game</button>
                </div>
            </div>
        </div>

        <!-- BẢNG DANH SÁCH -->
        <div class="col-lg-8">
            <div class="card border-top border-3 border-primary shadow-sm">
                <div class="card-header bg-transparent">
                    <b class="text-uppercase text-dark">Danh Sách Trò Chơi</b>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0 text-nowrap">
                            <thead class="table-primary text-center align-middle">
                                <tr>
                                    <th>STT</th>
                                    <th>Logo</th>
                                    <th>Tên Game</th>
                                    <th>Nhà Phát Hành</th>
                                    <th>Thể Loại</th>
                                    <th style="min-width: 250px;">Mô Tả</th>
                                    <th>Trạng Thái</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(game, index) in list_game" :key="game.id">
                                    <td class="text-center align-middle">{{ index + 1 }}</td>
                                    <td class="text-center align-middle">
                                        <img :src="game.logo" width="50" class="rounded">
                                    </td>
                                    <td class="align-middle">{{ game.ten_game }}</td>
                                    <td class="align-middle">{{ game.nha_phat_hanh }}</td>
                                    <td class="align-middle">
                                        <span class="badge bg-info text-dark">{{ game.ten_loai }}</span>
                                    </td>
                                    <td class="text-wrap align-middle" style="min-width: 250px;">{{ game.mo_ta }}</td>
                                    <td class="text-center align-middle">
                                        <span v-if="game.trang_thai" class="btn btn-sm btn-success">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật trò chơi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Tên game</label>
                        <input type="text" class="form-control form-control-sm" value="League of Legends">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Nhà phát hành</label>
                        <input type="text" class="form-control form-control-sm" value="Riot Games">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Logo (URL)</label>
                        <input type="text" class="form-control form-control-sm" value="https://api.dicebear.com/7.x/identicon/svg?seed=League%20of%20Legends">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Chọn Thể loại</label>
                        <select class="form-select form-select-sm">
                            <option value="1" selected>MOBA</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Mô tả</label>
                        <textarea class="form-control form-control-sm" rows="3">Trò chơi MOBA phổ biến nhất thế giới.</textarea>
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
                        Bạn có chắc chắn muốn xóa trò chơi <strong>League of Legends</strong> này không?
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
            list_game: [],
            list_cat: [],
        }
    },
    mounted() {
        this.loadData();
        this.loadCats();
    },
    methods: {
        loadData() {
            axios.get('http://127.0.0.1:8000/api/admin/game/get-data')
                .then(response => {
                    this.list_game = response.data.data;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        loadCats() {
            axios.get('http://127.0.0.1:8000/api/admin/the-loai/get-data')
                .then(response => {
                    this.list_cat = response.data.data;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
}
</script>
<style></style>
