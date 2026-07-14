<template>
    <div class="row">
        <!-- CỘT 1: DANH SÁCH CHỨC VỤ -->
        <div class="col-lg-4 col-md-12 mb-3">
            <div class="card border-top border-3 border-info shadow-sm h-100">
                <div class="card-header bg-transparent py-3">
                    <h6 class="text-uppercase fw-bold text-dark mb-0">DANH SÁCH CHỨC VỤ</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0 align-middle">
                            <thead class="table-primary text-center">
                                <tr>
                                    <th style="width: 50px;">#</th>
                                    <th>Tên Chức Vụ</th>
                                    <th style="width: 110px;">Cấp Quyền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(role, index) in list_role" :key="role.id" 
                                    :class="{'table-info fw-bold': selected_role && selected_role.id === role.id}">
                                    <td class="text-center">{{ index + 1 }}</td>
                                    <td>
                                        <span class="text-info fw-semibold">{{ role.ten_chuc_vu }}</span>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-info btn-sm text-white px-2 py-1" @click="selectRole(role)">
                                            Phân Quyền
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- CỘT 2: DANH SÁCH CHỨC NĂNG -->
        <div class="col-lg-4 col-md-12 mb-3">
            <div class="card border-top border-3 border-primary shadow-sm h-100">
                <div class="card-header bg-transparent py-3">
                    <h6 class="text-uppercase fw-bold text-dark mb-0">DANH SÁCH CHỨC NĂNG</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0 align-middle">
                            <thead class="table-primary text-center">
                                <tr>
                                    <th style="width: 50px;">#</th>
                                    <th>Tên Chức Năng</th>
                                    <th style="width: 110px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(func, index) in list_func" :key="func.id">
                                    <td class="text-center">{{ index + 1 }}</td>
                                    <td>{{ func.ten_chuc_nang }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-primary btn-sm px-2 py-1" 
                                                :disabled="!selected_role"
                                                @click="grantPermission(func)">
                                            Cấp Quyền
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- CỘT 3: QUYỀN ĐÃ CẤP -->
        <div class="col-lg-4 col-md-12 mb-3">
            <div class="card border-top border-3 border-success shadow-sm h-100">
                <div class="card-header bg-transparent py-3">
                    <h6 class="text-uppercase fw-bold text-dark mb-0">
                        QUYỀN ĐÃ CẤP <span v-if="selected_role">- {{ selected_role.ten_chuc_vu }}</span>
                    </h6>
                </div>
                <div class="card-body">
                    <div v-if="!selected_role" class="text-center py-5 text-muted">
                        <i class="bx bx-shield-quarter fs-1 d-block mb-2"></i>
                        Vui lòng chọn chức vụ bên cột trái để xem quyền đã cấp.
                    </div>
                    <div v-else>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover mb-0 align-middle">
                                <thead class="table-primary text-center">
                                    <tr>
                                        <th style="width: 50px;">#</th>
                                        <th>Tên Chức Năng</th>
                                        <th style="width: 80px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(permission, index) in current_permissions" :key="permission.id">
                                        <td class="text-center">{{ index + 1 }}</td>
                                        <td>{{ permission.ten_chuc_nang }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-danger btn-sm px-2 py-1" @click="revokePermission(permission)">
                                                Xóa
                                            </button>
                                        </td>
                                    </tr>
                                    <tr v-if="current_permissions.length === 0">
                                        <td colspan="3" class="text-center text-muted py-4">Chưa được cấp quyền nào.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    data() {
        return {
            list_permission: [],
            list_role: [],
            list_func: [],
            selected_role: null,
            current_permissions: [],
        }
    },
    mounted() {
        this.loadRoles();
        this.loadFuncs();
        this.loadPermissions();
    },
    methods: {
        loadRoles() {
            axios.get('http://127.0.0.1:8000/api/admin/chuc-vu/get-data')
                .then(response => {
                    this.list_role = response.data.data;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        loadFuncs() {
            axios.get('http://127.0.0.1:8000/api/admin/chuc-nang/get-data')
                .then(response => {
                    this.list_func = response.data.data;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        loadPermissions() {
            axios.get('http://127.0.0.1:8000/api/admin/phan-quyen/get-data')
                .then(response => {
                    this.list_permission = response.data.data;
                    this.updateCurrentPermissions();
                })
                .catch(error => {
                    console.error(error);
                });
        },
        selectRole(role) {
            this.selected_role = role;
            this.updateCurrentPermissions();
        },
        updateCurrentPermissions() {
            if (!this.selected_role) {
                this.current_permissions = [];
                return;
            }
            this.current_permissions = this.list_permission.filter(p => p.id_chuc_vu === this.selected_role.id);
        },
        grantPermission(func) {
            if (!this.selected_role) return;
            const exists = this.list_permission.some(p => p.id_chuc_vu === this.selected_role.id && p.id_chuc_nang === func.id);
            if (exists) {
                alert("Quyền này đã được cấp rồi!");
                return;
            }
            const newPerm = {
                id: Date.now(),
                id_chuc_vu: this.selected_role.id,
                ten_chuc_vu: this.selected_role.ten_chuc_vu,
                id_chuc_nang: func.id,
                ten_chuc_nang: func.ten_chuc_nang
            };
            this.list_permission.push(newPerm);
            this.updateCurrentPermissions();
        },
        revokePermission(permission) {
            this.list_permission = this.list_permission.filter(p => p.id !== permission.id);
            this.updateCurrentPermissions();
        }
    }
}
</script>
<style></style>
