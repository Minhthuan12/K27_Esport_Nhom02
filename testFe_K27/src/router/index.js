import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: '/',
        component: () => import('../layout/wrapper/index.vue')
    },
    {
        path: '/doituyen',
        component: () => import('../components/Admin/DoiTuyen/index.vue')
    },
    {
        path: '/doi-tuyen',
        component: () => import('../components/Admin/DoiTuyen/index.vue')
    },
    {
        path: '/tuyen-thu',
        component: () => import('../components/Admin/TuyenThu/index.vue')
    },
    {
        path: '/thong-ke-tuyen-thu',
        component: () => import('../components/Admin/ThongSoTuyenThu/index.vue')
    },
    {
        path: '/thong-ke-doi-tuyen',
        component: () => import('../components/Admin/ThongSoDoiTuyen/index.vue')
    },
    {
        path: '/giai-dau',
        component: () => import('../components/Admin/GiaiDau/index.vue')
    },
    {
        path: '/vong-dau',
        component: () => import('../components/Admin/VongDau/index.vue')
    },
    {
        path: '/tran-dau',
        component: () => import('../components/Admin/TranDauDoi/index.vue')
    },
    {
        path: '/ket-qua-giai-dau',
        component: () => import('../components/Admin/KetQuaGiaiDau/index.vue')
    },
    {
        path: '/nha-tai-tro',
        component: () => import('../components/Admin/NhaTaiTro/index.vue')
    },
    {
        path: '/tai-tro-giai-dau',
        component: () => import('../components/Admin/TaiTroGiaiDau/index.vue')
    },
    {
        path: '/giai-thuong',
        component: () => import('../components/Admin/GiaiThuong/index.vue')
    },
    {
        path: '/tin-tuc',
        component: () => import('../components/Admin/TinTuc/index.vue')
    },
    {
        path: '/the-loai',
        component: () => import('../components/Admin/TheLoai/index.vue')
    },
    {
        path: '/nguoi-dung',
        component: () => import('../components/Admin/NguoiDung/index.vue')
    },
    {
        path: '/chuc-vu',
        component: () => import('../components/Admin/ChucVu/index.vue')
    },
    {
        path: '/game',
        component: () => import('../components/Admin/Game/index.vue')
    },
    {
        path: '/chi-tiet-tran-dau',
        component: () => import('../components/Admin/ChiTietTranDau/index.vue')
    },
    {
        path: '/chuc-nang',
        component: () => import('../components/Admin/ChucNang/index.vue')
    },
    {
        path: '/phan-quyen',
        component: () => import('../components/Admin/PhanQuyen/index.vue')
    },

    // --- BỘ THỐNG KÊ MỚI CHUẨN 7 NHÓM ---
    // NHÓM 1
    {
        path: '/thong-ke/nhom-1/cau-1',
        component: () => import('../components/Admin/ThongKe/Nhom1/Cau1.vue')
    },
    {
        path: '/thong-ke/nhom-1/cau-2',
        component: () => import('../components/Admin/ThongKe/Nhom1/Cau2.vue')
    },
    // NHÓM 2
    {
        path: '/thong-ke/nhom-2/cau-1',
        component: () => import('../components/Admin/ThongKe/Nhom2/Cau1.vue')
    },
    {
        path: '/thong-ke/nhom-2/cau-2',
        component: () => import('../components/Admin/ThongKe/Nhom2/Cau2.vue')
    },
    // NHÓM 3
    {
        path: '/thong-ke/nhom-3/cau-1',
        component: () => import('../components/Admin/ThongKe/Nhom3/Cau1.vue')
    },
    {
        path: '/thong-ke/nhom-3/cau-2',
        component: () => import('../components/Admin/ThongKe/Nhom3/Cau2.vue')
    },
    // NHÓM 4
    {
        path: '/thong-ke/nhom-4/cau-1',
        component: () => import('../components/Admin/ThongKe/Nhom4/Cau1.vue')
    },
    {
        path: '/thong-ke/nhom-4/cau-2',
        component: () => import('../components/Admin/ThongKe/Nhom4/Cau2.vue')
    },
    // NHÓM 5
    {
        path: '/thong-ke/nhom-5/cau-1',
        component: () => import('../components/Admin/ThongKe/Nhom5/Cau1.vue')
    },
    {
        path: '/thong-ke/nhom-5/cau-2',
        component: () => import('../components/Admin/ThongKe/Nhom5/Cau2.vue')
    },
    // NHÓM 6
    {
        path: '/thong-ke/nhom-6/cau-1',
        component: () => import('../components/Admin/ThongKe/Nhom6/Cau1.vue')
    },
    {
        path: '/thong-ke/nhom-6/cau-2',
        component: () => import('../components/Admin/ThongKe/Nhom6/Cau2.vue')
    },
    // NHÓM 7
    {
        path: '/thong-ke/nhom-7/cau-1',
        component: () => import('../components/Admin/ThongKe/Nhom7/Cau1.vue')
    },
    {
        path: '/thong-ke/nhom-7/cau-2',
        component: () => import('../components/Admin/ThongKe/Nhom7/Cau2.vue')
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes: routes
})

export default router