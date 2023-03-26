<script lang="ts" setup>
import { ref } from "vue";
import { useRouter } from 'vue-router'
const password = ref("");
const showPassword = ref(false);
const router = useRouter()

const togglePassword = () => {
    showPassword.value = !showPassword.value;
}
const toDashboard = () => {
    router.push("/admin/home")
}

</script>

<template>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="@/assets/auth/team.jpg" alt="IMG">
                </div>
                <form class="login100-form validate-form" @submit.prevent>
                    <span class="login100-form-title">
                        <b>Đăng nhập hệ thông Borcelle Food</b>
                    </span>
                        <div class="wrap-input100 validate-input">
                            <input class="input100 outline-none" type="text" placeholder="Tài khoản quản trị"
                                name="username" id="username">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class='bx bx-user'></i>
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input">
                            <input autocomplete="off" class="input100 outline-none"
                                v-bind:type="showPassword ? 'text' : 'password'" v-model="password" placeholder="Mật khẩu"
                                name="current-password" id="password-field">
                            <span toggle="#password-field" class="field-icon click-eye" @click="togglePassword">{{
                                showPassword ? 'Ẩn' : 'Hiện' }}</span>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class='bx bx-key'></i>
                            </span>
                        </div>

                        <div class="container-login100-form-btn">
                            <base-button class="btn" @click="toDashboard">Đăng nhập</base-button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</template>
<style lang="scss" scoped>
@import "@/assets/styles/admin/auth/login.scss";
</style>
