<template>
    <div class="row">
        <!-- BỘ LỌC TỪ NĂM - ĐẾN NĂM -->
        <div class="col-12 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body py-3">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="input-group">
                                <span class="input-group-text fw-bold bg-warning text-dark">Từ năm</span>
                                <input v-model="khoang_nam.tu_nam" type="number" min="2000" max="2100" class="form-control"
                                    placeholder="Ví dụ: 2020">
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="input-group">
                                <span class="input-group-text fw-bold bg-warning text-dark">Đến năm</span>
                                <input v-model="khoang_nam.den_nam" type="number" min="2000" max="2100" class="form-control"
                                    placeholder="Ví dụ: 2026">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <button @click="thongKe" class="btn btn-warning text-dark w-100 fw-bold">
                                <i class="bx bx-bar-chart"></i> Lọc Biểu Đồ
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
                        <div class="card-header bg-warning text-dark py-3">
                            <h5 class="mb-0 text-dark fw-bold text-uppercase fs-6">
                                <i class="bx bx-trophy"></i> Bảng Thống Kê Tất Cả Nhà Tài Trợ
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive custom-scroll" style="max-height: 330px; overflow-y: auto;">
                                <table class="table table-bordered table-hover mb-0 align-middle">
                                    <thead class="table-light text-center sticky-top shadow-sm">
                                        <tr>
                                            <th>#</th>
                                            <th>Nhà Tài Trợ</th>
                                            <th>Số Giải</th>
                                            <th>Tổng Tiền Tài Trợ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(value, index) in list_data" :key="index">
                                            <td class="text-center fw-bold">{{ index + 1 }}</td>
                                            <td class="fw-bold text-dark">{{ value.ten_nha_tai_tro }}</td>
                                            <td class="text-center fw-semibold text-primary">{{ value.so_giai_tai_tro }} giải</td>
                                            <td class="text-end fw-bold text-success">{{ formatMoney(value.tong_tien_tai_tro) }} VNĐ</td>
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
                        <div class="card-header bg-warning text-dark py-3">
                            <h5 class="mb-0 text-dark fw-bold text-uppercase fs-6">
                                <i class="bx bx-bar-chart-alt-2"></i> Biểu Đồ Ngân Sách Các Nhà Tài Trợ
                            </h5>
                        </div>
                        <div class="card-body d-flex justify-content-center align-items-center" style="min-height: 350px;">
                            <div class="w-100" style="height: 320px;">
                                <Bar v-if="is_load" :options="chartOptions" :data="chartData" />
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
import { Bar } from 'vue-chartjs';
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js';
import axios from 'axios';

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale);

export default {
    name: 'Nhom2Cau2',
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
                        label: 'Tổng ngân sách tài trợ (VNĐ)',
                        data: [],
                        backgroundColor: '#ffc107',
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
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let value = context.raw || 0;
                                return 'Tổng tài trợ: ' + new Intl.NumberFormat('vi-VN').format(value) + ' VNĐ';
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
            axios.get('http://127.0.0.1:8000/api/admin/thong-ke/nhom-2/cau-2', { params: this.khoang_nam })
                .then((res) => {
                    this.list_data = res.data.data;
                    this.chartData.labels = res.data.array_nha_tai_tro;
                    this.chartData.datasets[0].data = res.data.array_tong_tien;
                    this.is_load = true;
                })
                .catch(error => {
                    console.error("Lỗi lấy dữ liệu thống kê Nhóm 2 - Câu 2:", error);
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
    background: #ffc107;
    border-radius: 4px;
}
.sticky-top {
    position: sticky;
    top: 0;
    z-index: 10;
}
</style>
