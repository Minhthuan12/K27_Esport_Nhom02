<template>
    <nav class="navbar navbar-expand-lg bg-white border-bottom py-2 px-3">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand fw-bold fs-4 text-primary me-4 d-flex align-items-center" href="/home">
                <i class="bx bx-joystick text-primary me-1 fs-3"></i>Rocker
            </a>

            <!-- Search Bar -->
            <div class="d-none d-md-flex me-auto" style="width: 320px;">
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0">
                        <i class="bx bx-search text-muted"></i>
                    </span>
                    <input type="text" class="form-control bg-light border-start-0 ps-0" placeholder="Tìm kiếm giải đấu, đội tuyển...">
                </div>
            </div>

            <!-- Right Action Icons & User Profile -->
            <div class="d-flex align-items-center gap-3 ms-auto">
                <button class="btn btn-light rounded-circle p-2 text-secondary border-0 d-flex align-items-center justify-content-center">
                    <i class="bx bx-grid-alt fs-5"></i>
                </button>
                
                <div class="position-relative">
                    <button class="btn btn-light rounded-circle p-2 text-secondary border-0 d-flex align-items-center justify-content-center">
                        <i class="bx bx-bell fs-5"></i>
                    </button>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger border border-white" style="font-size: 10px;">2</span>
                </div>

                <div class="position-relative">
                    <button class="btn btn-light rounded-circle p-2 text-secondary border-0 d-flex align-items-center justify-content-center">
                        <i class="bx bx-message-rounded-dots fs-5"></i>
                    </button>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger border border-white" style="font-size: 10px;">4</span>
                </div>

                <div class="vr my-2"></div>

                <!-- User Info -->
                <div class="d-flex align-items-center gap-2">
                    <div class="text-end d-none d-sm-block">
                        <div class="fw-bold fs-6 lh-1 text-dark">Pauline Seitz</div>
                        <small class="text-muted text-uppercase" style="font-size: 10px;">WEB DESIGNER</small>
                    </div>
                    <img src="https://i.pravatar.cc/150?u=pauline" class="rounded-circle border border-2 border-primary" width="38" height="38" alt="Avatar">
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name: 'HeaderClient'
}
</script>

<style scoped></style>
