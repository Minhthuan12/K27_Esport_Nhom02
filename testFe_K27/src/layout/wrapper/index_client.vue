<template>
    <div class="wrapper bg-light min-vh-100">
        <!-- Sticky Top Bar (Gắn cố định trên cùng khi cuộn trang) -->
        <div class="sticky-top shadow-sm z-3">
            <HeaderClient></HeaderClient>
            <MenuClient></MenuClient>
        </div>
        
        <!-- Xóa bỏ margin-top: 120px mặc định của theme Admin -->
        <div class="page-wrapper mt-0 pt-0" style="margin-top: 0px !important;">
            <div class="page-content p-0">
                <slot></slot>
            </div>
        </div>

        <FooterClient></FooterClient>
    </div>
</template>

<script>
import HeaderClient from "../components/Client/HeaderClient.vue";
import MenuClient from "../components/Client/MenuClient.vue";
import FooterClient from "../components/Client/FooterClient.vue";

export default {
    name: 'ClientWrapper',
    components: {
        HeaderClient,
        MenuClient,
        FooterClient
    }
}
</script>

<style scoped></style>
