import { createRouter, createWebHistory } from "vue-router";

const routes = [
    // CLIENT ROUTES (Sử dụng client-layout)
    {
        path: '/',
        meta: { layout: 'client' },
        component: () => import('../components/Client/Home/index.vue')
    },
    {
        path: '/trang-chu',
        meta: { layout: 'client' },
        component: () => import('../components/Client/Home/index.vue')
    },
    {
        path: '/home',
        meta: { layout: 'client' },
        component: () => import('../components/Client/Home/index.vue')
    },
    {
        path: '/client/home',
        meta: { layout: 'client' },
        component: () => import('../components/Client/Home/index.vue')
    },
    {
        path: '/Client/Home',
        meta: { layout: 'client' },
        component: () => import('../components/Client/Home/index.vue')
    },
    {
        path: '/Client/Home/index.vue',
        meta: { layout: 'client' },
        component: () => import('../components/Client/Home/index.vue')
    },
    // CLIENT GIẢI ĐẤU ROUTE (VIEW THỨ 2)
    {
        path: '/client/giai-dau',
        meta: { layout: 'client' },
        component: () => import('../components/Client/GiaiDau/index.vue')
    },
    {
        path: '/client/giai-dau/index.vue',
        meta: { layout: 'client' },
        component: () => import('../components/Client/GiaiDau/index.vue')
    },
    {
        path: '/giai-dau-client',
        meta: { layout: 'client' },
        component: () => import('../components/Client/GiaiDau/index.vue')
    },
    // CLIENT LỊCH THI ĐẤU ROUTE (VIEW THỨ 3)
    {
        path: '/client/lich-thi-dau',
        meta: { layout: 'client' },
        component: () => import('../components/Client/LichThiDau/index.vue')
    },
    {
        path: '/client/lich-thi-dau/index.vue',
        meta: { layout: 'client' },
        component: () => import('../components/Client/LichThiDau/index.vue')
    },
    // CLIENT ĐỘI TUYỂN ROUTE (VIEW THỨ 4)
    {
        path: '/client/doi-tuyen',
        meta: { layout: 'client' },
        component: () => import('../components/Client/DoiTuyen/index.vue')
    },
    {
        path: '/client/doi-tuyen/index.vue',
        meta: { layout: 'client' },
        component: () => import('../components/Client/DoiTuyen/index.vue')
    },
    // CLIENT TIN TỨC ROUTE (VIEW THỨ 5)
    {
        path: '/client/tin-tuc',
        meta: { layout: 'client' },
        component: () => import('../components/Client/TinTuc/index.vue')
    },
    {
        path: '/client/tin-tuc/index.vue',
        meta: { layout: 'client' },
        component: () => import('../components/Client/TinTuc/index.vue')
    },
    // CLIENT GAME ROUTE (VIEW THỨ 6)
    {
        path: '/client/game',
        meta: { layout: 'client' },
        component: () => import('../components/Client/Game/index.vue')
    },
    {
        path: '/client/game/index.vue',
        meta: { layout: 'client' },
        component: () => import('../components/Client/Game/index.vue')
    },
    // CLIENT NHÀ TÀI TRỢ ROUTE (VIEW THỨ 7)
    {
        path: '/client/nha-tai-tro',
        meta: { layout: 'client' },
        component: () => import('../components/Client/NhaTaiTro/index.vue')
    },
    {
        path: '/client/nha-tai-tro/index.vue',
        meta: { layout: 'client' },
        component: () => import('../components/Client/NhaTaiTro/index.vue')
    },

    // ADMIN ROUTES (Tự động sử dụng default-layout / Admin Wrapper)
    {
        path: '/dashboard',
        component: () => import('../components/Admin/DashBoard/index.vue')
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