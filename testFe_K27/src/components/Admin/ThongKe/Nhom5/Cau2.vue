<template>
    <div class="row">
        <!-- BỘ LỌC TỪ NĂM - ĐẾN NĂM -->
        <div class="col-12 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body py-3">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="input-group">
                                <span class="input-group-text fw-bold bg-success text-white">Từ năm</span>
                                <input v-model="khoang_nam.tu_nam" type="number" min="2000" max="2100" class="form-control"
                                    placeholder="Ví dụ: 2020">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="input-group">
                                <span class="input-group-text fw-bold bg-success text-white">Đến năm</span>
                                <input v-model="khoang_nam.den_nam" type="number" min="2000" max="2100" class="form-control"
                                    placeholder="Ví dụ: 2026">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <button @click="thongKe" class="btn btn-success text-white w-100 fw-bold">
                                <i class="bx bx-bar-chart-square"></i> Lọc Biểu Đồ
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- HIỂN THỊ DỮ LIỆU BẢNG & BIỂU ĐỒ -->
        <div class="col-12">
            <div class="row">
                <!-- Bảng bên trái -->
                <div class="col-lg-5 mb-3">
                    <div class="card shadow-sm h-100">
                        <div class="card-header bg-success text-white py-3">
                            <h5 class="mb-0 text-white fw-bold text-uppercase fs-6">
                                <i class="bx bx-list-check"></i> Bảng Ván Thắng & Trận Đấu
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive custom-scroll" style="max-height: 330px; overflow-y: auto;">
                                <table class="table table-bordered table-hover mb-0 align-middle">
                                    <thead class="table-light text-center sticky-top shadow-sm">
                                        <tr>
                                            <th>#</th>
                                            <th>Tên Đội Tuyển</th>
                                            <th>Số Trận</th>
                                            <th>Tổng Ván Thắng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(value, index) in list_data" :key="index">
                                            <td class="text-center fw-bold">{{ index + 1 }}</td>
                                            <td class="fw-bold text-dark">{{ value.ten_doi_tuyen }}</td>
                                            <td class="text-center fw-semibold text-primary">{{ value.so_tran_thi_dau }} trận</td>
                                            <td class="text-center fw-bold text-success">{{ value.tong_van_thang }} ván</td>
                                        </tr>
                                        <tr v-if="list_data.length === 0">
                                            <td colspan="4" class="text-center text-muted py-4">Không có dữ liệu trong khoảng năm chọn.</td>
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
                        <div class="card-header bg-success text-white py-3">
                            <h5 class="mb-0 text-white fw-bold text-uppercase fs-6">
                                <i class="bx bx-bar-chart-alt-2"></i> Biểu Đồ Cột Trận Đấu & Ván Thắng
                            </h5>
                        </div>
                        <div class="card-body d-flex justify-content-center align-items-center" style="min-height: 350px;">
                            <div class="w-100" style="height: 320px;">
                                <Bar v-if="is_load" :options="chartOptions" :data="chartData" />
                                <div v-else class="text-center text-muted py-5">
                                    <i class="bx bx-loader-alt bx-spin fs-1 d-block mb-2 text-success"></i>
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
import { Bar } from 'vue-chartjs';
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js';
import axios from 'axios';

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale);

export default {
    name: 'Nhom5Cau2',
    components: {
        Bar
    },
    data() {
        return {
            khoang_nam: {
                tu_nam: 2020,
                den_nam: 2026
            },
            is_load: false,
            list_data: [],
            chartData: {
                labels: [],
                datasets: [
                    {
                        label: 'Số trận thi đấu',
                        data: [],
                        backgroundColor: '#0d6efd',
                        borderRadius: 4
                    },
                    {
                        label: 'Tổng ván thắng',
                        data: [],
                        backgroundColor: '#198754',
                        borderRadius: 4
                    }
                ]
            },
            chartOptions: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 5
                        }
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
            axios.get('http://127.0.0.1:8000/api/admin/thong-ke/nhom-5/cau-2', { params: this.khoang_nam })
                .then((res) => {
                    this.list_data = res.data.data;
                    this.chartData.labels = res.data.array_doi;
                    this.chartData.datasets[0].data = res.data.array_so_tran;
                    this.chartData.datasets[1].data = res.data.array_van_thang;
                    this.is_load = true;
                })
                .catch(error => {
                    console.error("Lỗi lấy dữ liệu thống kê Nhóm 5 - Câu 2:", error);
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
    background: #198754;
    border-radius: 4px;
}
.sticky-top {
    position: sticky;
    top: 0;
    z-index: 10;
}
</style>
