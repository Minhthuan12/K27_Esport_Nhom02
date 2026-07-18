<template>
    <div class="bg-white border-bottom py-2 px-3 shadow-sm">
        <div class="container-fluid px-3 px-lg-5">
            <ul class="nav nav-pills gap-2">
                <!-- 1. TRANG CHỦ -->
                <li class="nav-item">
                    <router-link 
                        to="/home" 
                        :class="['nav-link', 'px-3', 'py-1', isActive(['/', '/home', '/trang-chu', '/client/home']) ? 'active fw-bold' : 'text-secondary fw-semibold']">
                        Trang Chủ
                    </router-link>
                </li>

                <!-- 2. GIẢI ĐẤU -->
                <li class="nav-item">
                    <router-link 
                        to="/client/giai-dau" 
                        :class="['nav-link', 'px-3', 'py-1', isActive(['/client/giai-dau', '/giai-dau-client']) ? 'active fw-bold' : 'text-secondary fw-semibold']">
                        Giải Đấu
                    </router-link>
                </li>

                <!-- 3. LỊCH THI ĐẤU -->
                <li class="nav-item">
                    <router-link 
                        to="/client/lich-thi-dau" 
                        :class="['nav-link', 'px-3', 'py-1', isActive(['/client/lich-thi-dau']) ? 'active fw-bold' : 'text-secondary fw-semibold']">
                        Lịch Thi Đấu
                    </router-link>
                </li>

                <!-- 4. ĐỘI TUYỂN -->
                <li class="nav-item">
                    <router-link 
                        to="/client/doi-tuyen" 
                        :class="['nav-link', 'px-3', 'py-1', isActive(['/client/doi-tuyen']) ? 'active fw-bold' : 'text-secondary fw-semibold']">
                        Đội Tuyển
                    </router-link>
                </li>

                <!-- 5. TIN TỨC -->
                <li class="nav-item">
                    <router-link 
                        to="/client/tin-tuc" 
                        :class="['nav-link', 'px-3', 'py-1', isActive(['/client/tin-tuc']) ? 'active fw-bold' : 'text-secondary fw-semibold']">
                        Tin Tức
                    </router-link>
                </li>

                <!-- 6. TRÒ CHƠI -->
                <li class="nav-item">
                    <router-link 
                        to="/client/game" 
                        :class="['nav-link', 'px-3', 'py-1', isActive(['/client/game']) ? 'active fw-bold' : 'text-secondary fw-semibold']">
                        Trò Chơi
                    </router-link>
                </li>

                <!-- 7. NHÀ TÀI TRỢ -->
                <li class="nav-item">
                    <router-link 
                        to="/client/nha-tai-tro" 
                        :class="['nav-link', 'px-3', 'py-1', isActive(['/client/nha-tai-tro']) ? 'active fw-bold' : 'text-secondary fw-semibold']">
                        Nhà Tài Trợ
                    </router-link>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: 'MenuClient',
    methods: {
        isActive(paths) {
            const currentPath = this.$route.path.toLowerCase();
            return paths.some(p => p.toLowerCase() === currentPath);
        }
    }
}
</script>

<style scoped></style>
