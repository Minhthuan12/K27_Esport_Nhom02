<template>
    <div class="row">
        <!-- BỘ LỌC TỪ NĂM - ĐẾN NĂM -->
        <div class="col-12 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body py-3">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="input-group">
                                <span class="input-group-text fw-bold bg-purple text-white">Từ năm</span>
                                <input v-model="khoang_nam.tu_nam" type="number" min="2000" max="2100" class="form-control"
                                    placeholder="Ví dụ: 2020">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="input-group">
                                <span class="input-group-text fw-bold bg-purple text-white">Đến năm</span>
                                <input v-model="khoang_nam.den_nam" type="number" min="2000" max="2100" class="form-control"
                                    placeholder="Ví dụ: 2026">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <button @click="thongKe" class="btn btn-purple text-white w-100 fw-bold">
                                <i class="bx bx-id-card"></i> Lọc Biểu Đồ
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
                        <div class="card-header bg-purple text-white py-3">
                            <h5 class="mb-0 text-white fw-bold text-uppercase fs-6">
                                <i class="bx bx-shield-quarter"></i> Bảng Phân Phối Chức Vụ Người Dùng
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive custom-scroll" style="max-height: 330px; overflow-y: auto;">
                                <table class="table table-bordered table-hover mb-0 align-middle">
                                    <thead class="table-light text-center sticky-top shadow-sm">
                                        <tr>
                                            <th>#</th>
                                            <th>Tên Chức Vụ</th>
                                            <th>Số Lượng Tài Khoản</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(value, index) in list_data" :key="index">
                                            <td class="text-center fw-bold">{{ index + 1 }}</td>
                                            <td class="fw-bold text-dark">{{ value.ten_chuc_vu }}</td>
                                            <td class="text-center fw-bold text-primary">{{ value.so_luong_tai_khoan }} người</td>
                                        </tr>
                                        <tr v-if="list_data.length === 0">
                                            <td colspan="3" class="text-center text-muted py-4">Không có dữ liệu trong khoảng năm chọn.</td>
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
                        <div class="card-header bg-purple text-white py-3">
                            <h5 class="mb-0 text-white fw-bold text-uppercase fs-6">
                                <i class="bx bx-bar-chart-square"></i> Biểu Đồ Cột Cơ Cấu Tài Khoản Theo Vai Trò
                            </h5>
                        </div>
                        <div class="card-body d-flex justify-content-center align-items-center" style="min-height: 350px;">
                            <div class="w-100" style="height: 320px;">
                                <Bar v-if="is_load" :options="chartOptions" :data="chartData" />
                                <div v-else class="text-center text-muted py-5">
                                    <i class="bx bx-loader-alt bx-spin fs-1 d-block mb-2 text-purple"></i>
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
    name: 'Nhom7Cau2',
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
                        label: 'Số lượng tài khoản',
                        data: [],
                        backgroundColor: '#6f42c1',
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
                            stepSize: 1
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
            axios.get('http://127.0.0.1:8000/api/admin/thong-ke/nhom-7/cau-2', { params: this.khoang_nam })
                .then((res) => {
                    this.list_data = res.data.data;
                    this.chartData.labels = res.data.array_chuc_vu;
                    this.chartData.datasets[0].data = res.data.array_so_tk;
                    this.is_load = true;
                })
                .catch(error => {
                    console.error("Lỗi lấy dữ liệu thống kê Nhóm 7 - Câu 2:", error);
                    this.is_load = true;
                });
        }
    }
}
</script>

<style scoped>
.bg-purple {
    background-color: #6f42c1 !important;
}
.btn-purple {
    background-color: #6f42c1 !important;
    border-color: #6f42c1 !important;
}
.text-purple {
    color: #6f42c1 !important;
}
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
    background: #6f42c1;
    border-radius: 4px;
}
.sticky-top {
    position: sticky;
    top: 0;
    z-index: 10;
}
</style>
