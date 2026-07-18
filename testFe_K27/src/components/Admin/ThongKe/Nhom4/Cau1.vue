<template>
    <div class="row">
        <!-- BỘ LỌC TỪ NGÀY - ĐẾN NGÀY -->
        <div class="col-12 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body py-3">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="input-group">
                                <span class="input-group-text fw-bold bg-secondary text-white">Từ ngày</span>
                                <input v-model="khoang_ngay.tu_ngay" type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="input-group">
                                <span class="input-group-text fw-bold bg-secondary text-white">Đến ngày</span>
                                <input v-model="khoang_ngay.den_ngay" type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <button @click="thongKe" class="btn btn-secondary text-white w-100 fw-bold">
                                <i class="bx bx-user"></i> Lọc Biểu Đồ
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- HIỂN THỊ DỮ LIỆU BẢNG & BIỂU ĐỒ -->
        <div class="col-12">
            <div class="row">
                <!-- Bảng bên trái (Cuộn dọc kéo lên xuống) -->
                <div class="col-lg-5 mb-3">
                    <div class="card shadow-sm h-100">
                        <div class="card-header bg-secondary text-white py-3">
                            <h5 class="mb-0 text-white fw-bold text-uppercase fs-6">
                                <i class="bx bx-target-lock"></i> Bảng Phân Phối Vị Trí Thi Đấu
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive custom-scroll" style="max-height: 330px; overflow-y: auto;">
                                <table class="table table-bordered table-hover mb-0 align-middle">
                                    <thead class="table-light text-center sticky-top shadow-sm">
                                        <tr>
                                            <th>#</th>
                                            <th>Vị Trí Thi Đấu</th>
                                            <th>Số Lượng Tuyển Thủ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(value, index) in list_data" :key="index">
                                            <td class="text-center fw-bold">{{ index + 1 }}</td>
                                            <td class="fw-bold text-dark">{{ value.vi_tri_thi_dau }}</td>
                                            <td class="text-center fw-bold text-secondary">{{ value.so_luong_tuyen_thu }} tuyển thủ</td>
                                        </tr>
                                        <tr v-if="list_data.length === 0">
                                            <td colspan="3" class="text-center text-muted py-4">Không có dữ liệu trong khoảng ngày chọn.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Biểu đồ bên phải -->
                <div class="col-lg-7 mb-3">
                    <div class="card shadow-sm h-100">
                        <div class="card-header bg-secondary text-white py-3">
                            <h5 class="mb-0 text-white fw-bold text-uppercase fs-6">
                                <i class="bx bx-pie-chart-alt"></i> Biểu Đồ Tròn Cơ Cấu Vị Trí Thi Đấu
                            </h5>
                        </div>
                        <div class="card-body d-flex justify-content-center align-items-center" style="min-height: 350px;">
                            <div class="w-100" style="height: 320px;">
                                <Pie v-if="is_load" :options="chartOptions" :data="chartData" />
                                <div v-else class="text-center text-muted py-5">
                                    <i class="bx bx-loader-alt bx-spin fs-1 d-block mb-2 text-secondary"></i>
                                    Đang tải dữ liệu biểu đồ...
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Pie } from 'vue-chartjs';
import { Chart as ChartJS, Title, Tooltip, Legend, ArcElement } from 'chart.js';
import axios from 'axios';

ChartJS.register(Title, Tooltip, Legend, ArcElement);

export default {
    name: 'Nhom4Cau1',
    components: {
        Pie
    },
    data() {
        return {
            khoang_ngay: {
                tu_ngay: '2020-01-01',
                den_ngay: '2026-12-31'
            },
            is_load: false,
            list_data: [],
            chartData: {
                labels: [],
                datasets: [
                    {
                        label: 'Số lượng tuyển thủ',
                        data: [],
                        backgroundColor: [
                            '#0d6efd',
                            '#198754',
                            '#ffc107',
                            '#dc3545',
                            '#0dcaf0',
                            '#6f42c1'
                        ]
                    }
                ]
            },
            chartOptions: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'right'
                    }
                }
            }
        }
    },
    mounted() {
        this.thongKe();
    },
    methods: {
        thongKe() {
            this.is_load = false;
            axios.get('http://127.0.0.1:8000/api/admin/thong-ke/nhom-4/cau-1', { params: this.khoang_ngay })
                .then((res) => {
                    this.list_data = res.data.data;
                    this.chartData.labels = res.data.array_vi_tri;
                    this.chartData.datasets[0].data = res.data.array_so_luong;
                    this.is_load = true;
                })
                .catch(error => {
                    console.error("Lỗi lấy dữ liệu thống kê Nhóm 4 - Câu 1:", error);
                    this.is_load = true;
                });
        }
    }
}
</script>

<style scoped>
.input-group-text {
    min-width: 90px;
    justify-content: center;
}
.custom-scroll::-webkit-scrollbar {
    width: 6px;
}
.custom-scroll::-webkit-scrollbar-track {
    background: #f1f1f1;
}
.custom-scroll::-webkit-scrollbar-thumb {
    background: #6c757d;
    border-radius: 4px;
}
.sticky-top {
    position: sticky;
    top: 0;
    z-index: 10;
}
</style>
