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
    // GROUP 2 ROUTES
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
    // GROUP 3 ROUTES
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
    // GROUP 4 ROUTES
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
    // GROUP 5 ROUTES
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
]

const router = createRouter({
    history: createWebHistory(),
    routes: routes
})

export default router