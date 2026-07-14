<template>
    <div class="row">
        <!-- CARD THÊM MỚI (TĨNH DỰA TRÊN DATA THẬT) -->
        <div class="col-lg-4">
            <div class="card border-top border-3 border-primary shadow-sm">
                <div class="card-header bg-transparent">
                    <b class="text-uppercase text-dark">Thêm Mới Chỉ số Tuyển thủ</b>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <label class="form-label">Chọn Tuyển thủ</label>
                        <select class="form-select form-select-sm">
                            <option value="">-- Chọn Tuyển thủ --</option>
                            <option v-for="player in list_player" :key="player.id" :value="player.id">
                                {{ player.nickname }} ({{ player.ho_va_ten }})
                            </option>
                        </select>
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
                        <label class="form-label">Chọn Game</label>
                        <select class="form-select form-select-sm">
                            <option value="">-- Chọn Game --</option>
                            <option v-for="game in list_game" :key="game.id" :value="game.id">
                                {{ game.ten_game }}
                            </option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Số trận thắng</label>
                        <input type="number" class="form-control form-control-sm" value="0">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Số trận hòa</label>
                        <input type="number" class="form-control form-control-sm" value="0">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Số trận thua</label>
                        <input type="number" class="form-control form-control-sm" value="0">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Số lần MVP</label>
                        <input type="number" class="form-control form-control-sm" value="0">
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
                    <button class="btn btn-primary btn-sm">Thêm Chỉ Số</button>
                </div>
            </div>
        </div>

        <!-- BẢNG DANH SÁCH CÓ CARD BAO QUANH -->
        <div class="col-lg-8">
            <div class="card border-top border-3 border-primary shadow-sm">
                <div class="card-header bg-transparent">
                    <b class="text-uppercase text-dark">Danh Sách Chỉ Số Tuyển Thủ</b>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0 text-nowrap">
                            <thead class="table-primary text-center align-middle">
                                <tr>
                                    <th>STT</th>
                                    <th>Nickname</th>
                                    <th>Đội tuyển</th>
                                    <th>Game</th>
                                    <th>Thắng</th>
                                    <th>Hòa</th>
                                    <th>Thua</th>
                                    <th>Số lần MVP</th>
                                    <th>Trạng thái</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(thongSo, index) in list_thong_so" :key="thongSo.id">
                                    <td class="text-center align-middle">{{ index + 1 }}</td>
                                    <td class="fw-bold align-middle">{{ thongSo.nickname }}</td>
                                    <td class="align-middle">{{ thongSo.ten_doi_tuyen }}</td>
                                    <td class="align-middle">{{ thongSo.ten_game }}</td>
                                    <td class="text-center align-middle"><span class="badge bg-success">{{ thongSo.so_tran_thang }}</span></td>
                                    <td class="text-center align-middle"><span class="badge bg-secondary">{{ thongSo.so_tran_hoa }}</span></td>
                                    <td class="text-center align-middle"><span class="badge bg-danger">{{ thongSo.so_tran_thua }}</span></td>
                                    <td class="text-center align-middle"><span class="badge bg-warning text-dark">{{ thongSo.so_mvp }}</span></td>
                                    <td class="text-center align-middle">
                                        <span v-if="thongSo.trang_thai" class="btn btn-sm btn-success">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật chỉ số tuyển thủ</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Chọn Tuyển thủ</label>
                        <select class="form-select form-select-sm">
                            <option value="1" selected>Artemis</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Chọn Đội tuyển</label>
                        <select class="form-select form-select-sm">
                            <option value="1" selected>Cerberus Esports</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Chọn Game</label>
                        <select class="form-select form-select-sm">
                            <option value="1" selected>League of Legends</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Số trận thắng</label>
                        <input type="number" class="form-control form-control-sm" value="15">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Số trận hòa</label>
                        <input type="number" class="form-control form-control-sm" value="0">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Số trận thua</label>
                        <input type="number" class="form-control form-control-sm" value="10">
                    </div>
                    <div class="mb-2">
                        <label class="form-label fw-semibold">Số lần MVP</label>
                        <input type="number" class="form-control form-control-sm" value="1">
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
                        Bạn có chắc chắn muốn xóa chỉ số của tuyển thủ <strong>Artemis</strong> này không?
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
            list_thong_so: [],
            list_player: [],
            list_team: [],
            list_game: [],
        }
    },
    mounted() {
        this.loadData();
        this.loadPlayers();
        this.loadTeams();
        this.loadGames();
    },
    methods: {
        loadData() {
            axios.get('http://127.0.0.1:8000/api/admin/thong-so-tuyen-thu/get-data')
                .then(response => {
                    this.list_thong_so = response.data.data;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        loadPlayers() {
            axios.get('http://127.0.0.1:8000/api/admin/tuyen-thu/get-data')
                .then(response => {
                    this.list_player = response.data.data;
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
