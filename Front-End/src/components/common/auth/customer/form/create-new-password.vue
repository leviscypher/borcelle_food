<script lang="ts" setup>
import { reactive, ref } from 'vue';

const newPassword = ref("")
const error = reactive({
    errorNewPassword: '',
})

const login = (e: any) => {
    e.preventDefault()
    if (newPassword.value == '') {
        error.errorNewPassword = "Chưa nhập tên tài khoản"
    } else {
        error.errorNewPassword = ""
    }
}
</script>
<template>
    <form class="row w-[576px] m-0 m-auto pt-[100px] pb-[70px] pl-[50px] pr-[50px] mt-[15px] mb-[15px] bg-white">
        <h3 class="text-center pb-10">Tạo mật khẩu mới</h3>
        <p class="pb-10 text-center text-[17px]">Vui lòng tạo mật khẩu mới</p>
        <div class="form-group">
            <label class="control-label">Tạo mật khẩu mới mới</label>
            <input class="form-control border-black text-[16px]" type="text" placeholder="Mật khẩu mới">
            <small class="inline-block text-[red]">{{ error.errorNewPassword }}</small>

        </div>
        <div class="flex gap-[50px]">
            <router-link to="/" class="w-[50%] m-0 rounded-[5px] decoration-none text-black come-back">Quay
                lại</router-link>
            <base-button class="w-[50%] m-0 rounded-[5px]" @click="login">Tìm kiếm</base-button>
        </div>
    </form>
</template>
<style lang="scss">
[type=text]:focus:focus,
[type=password]:focus {
    border: 1px solid #ccc !important;
    box-shadow: none;
}

.come-back {
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: var(--light-gray-with-blue-tint);

    &:hover {
        text-decoration: none;
    }
}
</style>