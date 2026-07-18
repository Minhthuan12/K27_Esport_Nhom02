<template>
    <div class="row">
        <!-- BỘ LỌC TỪ NGÀY - ĐẾN NGÀY -->
        <div class="col-12 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body py-3">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="input-group">
                                <span class="input-group-text fw-bold bg-warning text-dark">Từ ngày</span>
                                <input v-model="khoang_ngay.tu_ngay" type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="input-group">
                                <span class="input-group-text fw-bold bg-warning text-dark">Đến ngày</span>
                                <input v-model="khoang_ngay.den_ngay" type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <button @click="thongKe" class="btn btn-warning text-dark w-100 fw-bold">
                                <i class="bx bx-news"></i> Lọc Biểu Đồ
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
                        <div class="card-header bg-warning text-dark py-3">
                            <h5 class="mb-0 text-dark fw-bold text-uppercase fs-6">
                                <i class="bx bx-paper-plane"></i> Bảng Tin Tức Đăng Theo Tháng
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive custom-scroll" style="max-height: 330px; overflow-y: auto;">
                                <table class="table table-bordered table-hover mb-0 align-middle">
                                    <thead class="table-light text-center sticky-top shadow-sm">
                                        <tr>
                                            <th>#</th>
                                            <th>Thời Gian</th>
                                            <th>Số Lượng Bài Viết</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(value, index) in list_data" :key="index">
                                            <td class="text-center fw-bold">{{ index + 1 }}</td>
                                            <td class="text-center fw-semibold text-dark">Tháng {{ value.thang }}/{{ value.nam }}</td>
                                            <td class="text-center fw-bold text-danger">{{ value.so_bai_viet }} bài</td>
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
                        <div class="card-header bg-warning text-dark py-3">
                            <h5 class="mb-0 text-dark fw-bold text-uppercase fs-6">
                                <i class="bx bx-line-chart font-22"></i> Biểu Đồ Xu Hướng Đăng Bài Theo Tháng
                            </h5>
                        </div>
                        <div class="card-body d-flex justify-content-center align-items-center" style="min-height: 350px;">
                            <div class="w-100" style="height: 320px;">
                                <Line v-if="is_load" :options="chartOptions" :data="chartData" />
                                <div v-else class="text-center text-muted py-5">
                                    <i class="bx bx-loader-alt bx-spin fs-1 d-block mb-2 text-warning"></i>
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
import { Line } from 'vue-chartjs';
import { Chart as ChartJS, Title, Tooltip, Legend, LineElement, PointElement, CategoryScale, LinearScale } from 'chart.js';
import axios from 'axios';

ChartJS.register(Title, Tooltip, Legend, LineElement, PointElement, CategoryScale, LinearScale);

export default {
    name: 'Nhom6Cau1',
    components: {
        Line
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
                        label: 'Số lượng bài viết tin tức',
                        data: [],
                        borderColor: '#ffc107',
                        backgroundColor: 'rgba(255, 193, 7, 0.2)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.35,
                        pointBackgroundColor: '#d39e00',
                        pointRadius: 4
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
            axios.get('http://127.0.0.1:8000/api/admin/thong-ke/nhom-6/cau-1', { params: this.khoang_ngay })
                .then((res) => {
                    this.list_data = res.data.data;
                    this.chartData.labels = res.data.array_thang;
                    this.chartData.datasets[0].data = res.data.array_so_bai;
                    this.is_load = true;
                })
                .catch(error => {
                    console.error("Lỗi lấy dữ liệu thống kê Nhóm 6 - Câu 1:", error);
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
    background: #ffc107;
    border-radius: 4px;
}
.sticky-top {
    position: sticky;
    top: 0;
    z-index: 10;
}
</style>
