<template>
    <div class="row">
        <!-- BỘ LỌC TỪ NGÀY - ĐẾN NGÀY -->
        <div class="col-12 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body py-3">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="input-group">
                                <span class="input-group-text fw-bold bg-success text-white">Từ ngày</span>
                                <input v-model="khoang_ngay.tu_ngay" type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="input-group">
                                <span class="input-group-text fw-bold bg-success text-white">Đến ngày</span>
                                <input v-model="khoang_ngay.den_ngay" type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <button @click="thongKe" class="btn btn-success text-white w-100 fw-bold">
                                <i class="bx bx-dollar-circle"></i> Lọc Biểu Đồ
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
                        <div class="card-header bg-success text-white py-3">
                            <h5 class="mb-0 text-white fw-bold text-uppercase fs-6">
                                <i class="bx bx-list-ol"></i> Bảng Chi Tiết Ngân Sách Tài Trợ
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive custom-scroll" style="max-height: 330px; overflow-y: auto;">
                                <table class="table table-bordered table-hover mb-0 align-middle">
                                    <thead class="table-light text-center sticky-top shadow-sm">
                                        <tr>
                                            <th>#</th>
                                            <th>Thời Gian</th>
                                            <th>Tổng Tiền Tài Trợ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(value, index) in list_data" :key="index">
                                            <td class="text-center">{{ index + 1 }}</td>
                                            <td class="text-center fw-semibold">Tháng {{ value.thang }}/{{ value.nam }}</td>
                                            <td class="text-end fw-bold text-success">{{ formatMoney(value.tong_tien_tai_tro) }} VNĐ</td>
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
                        <div class="card-header bg-success text-white py-3">
                            <h5 class="mb-0 text-white fw-bold text-uppercase fs-6">
                                <i class="bx bx-area"></i> Biểu Đồ Tăng Trưởng Dòng Tiền Tài Trợ
                            </h5>
                        </div>
                        <div class="card-body d-flex justify-content-center align-items-center" style="min-height: 350px;">
                            <div class="w-100" style="height: 320px;">
                                <Line v-if="is_load" :options="chartOptions" :data="chartData" />
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
import { Line } from 'vue-chartjs';
import { Chart as ChartJS, Title, Tooltip, Legend, LineElement, PointElement, CategoryScale, LinearScale } from 'chart.js';
import axios from 'axios';

ChartJS.register(Title, Tooltip, Legend, LineElement, PointElement, CategoryScale, LinearScale);

export default {
    name: 'Nhom2Cau1',
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
                        label: 'Tổng tiền tài trợ (VNĐ)',
                        data: [],
                        borderColor: '#198754',
                        backgroundColor: 'rgba(25, 135, 84, 0.15)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.35,
                        pointBackgroundColor: '#198754',
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
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let value = context.raw || 0;
                                return 'Tổng tiền: ' + new Intl.NumberFormat('vi-VN').format(value) + ' VNĐ';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return (value / 1000000).toLocaleString('vi-VN') + ' Tr';
                            }
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
            axios.get('http://127.0.0.1:8000/api/admin/thong-ke/nhom-2/cau-1', { params: this.khoang_ngay })
                .then((res) => {
                    this.list_data = res.data.data;
                    this.chartData.labels = res.data.array_thang;
                    this.chartData.datasets[0].data = res.data.array_tong_tien;
                    this.is_load = true;
                })
                .catch(error => {
                    console.error("Lỗi lấy dữ liệu thống kê Nhóm 2 - Câu 1:", error);
                    this.is_load = true;
                });
        },
        formatMoney(number) {
            return new Intl.NumberFormat('vi-VN').format(number);
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
