<script lang="ts" setup>
const emit = defineEmits(['changeFormRegister'])

const handleClick = () => {
  emit('changeFormRegister')
}
</script>

<template>
  <form
    id="form-login"
    class="flex justify-center flex-col w-3/4 mx-auto"
    @submit.prevent="submit"
  >
    <div class="form-group">
      <input
        type="text"
        placeholder="tên tài khoản"
        class="form-input w-full text-[1.6rem] py-3 outline-none relative pl-2 pr-2"
      />
      <small class="inline-block text-[red]"></small>
    </div>

    <div class="form-group relative mt-6">
      <input
        type="password"
        placeholder="mật khẩu"
        class="form-input w-full text-[1.6rem] py-3 outline-none relative pl-2 pr-2"
      />
      <span
        class="form-show-pass absolute right-0 translate-y-2/4 text-[1.4rem] cursor-pointer text-[var(--pale-yellow)]"
        >Hiện</span
      >
      <small class="inline-block text-[red]"></small>
    </div>

    <div class="form-group mt-6">
      <button
        class="w-full bg-[var(--pale-yellow)] border-none text-[var(--white)] font-medium text-[1.8rem] py-6 rounded mt-10 hover:opacity-[0.6]"
      >
        Đăng nhập
      </button>

      <div class="form-group mt-16">
        <a
          class="form-fogot text-[1.4rem]"
          href
          >Quên mật khẩu?</a
        >
        <p class="mt-2">
          Chưa có tài khoản?
          <a
            href=""
            class="form-register-link"
            @click.prevent="handleClick"
            >Tạo tài khoản.</a
          >
        </p>
      </div>
    </div>
  </form>
</template>
<style lang="scss" scoped>
.form-input {
  border: none;
  border-bottom: 1px solid #000 !important;
}

.form-fogot,
.form-register-link {
  text-decoration: none;
  cursor: pointer;
}
</style>
