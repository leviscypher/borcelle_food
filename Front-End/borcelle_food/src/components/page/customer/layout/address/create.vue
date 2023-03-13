<script lang="ts" setup>
import TextType from './form/TextType.vue'
import SelectType from './form/selectType.vue'
</script>

<template lang="">
  <div class="my-10 mx-8">
    <h4 class="mb-10">Tạo sổ địa chỉ</h4>
    <div class="w-full bg-[#fff]">
      <div class="w-[600px] py-10 pl-8">
        <form @submit.prevent>
          <text-type />
          <select-type />

          <div class="form-group flex">
            <label
              for=""
              class="w-[var(--label-width)] font-light text-[1.4rem] mb-0 flex items-center"
              >Địa chỉ:</label
            >
            <div class="flex-1">
              <textarea class="form-control"></textarea>
            </div>
          </div>

          <div class="form-group flex items-center">
            <label
              for=""
              class="w-[var(--label-width)] font-light text-[1.4rem] mb-0 flex items-center"
              >Loại địa chỉ:</label
            >
            <div class="flex-1 flex items-center">
              <div class="form-group mb-0 mr-10">
                <input
                  type="radio"
                  value="home"
                  id="home"
                />
                <label
                  for="home"
                  class="ml-4 text-[1.4rem] font-normal"
                  >Nhà riêng - chung cư</label
                >
              </div>

              <div class="form-group mb-0">
                <input
                  type="radio"
                  value="company"
                  id="company"
                />
                <label
                  for="company"
                  class="ml-4 text-[1.4rem] font-normal"
                  >Cơ quan - công ty</label
                >
              </div>
            </div>
          </div>

          <div class="form-group ml-[var(--label-width)]">
            <input
              type="checkbox"
              id="default"
            />
            <label
              for="default"
              class="ml-4 text-[1.4rem] font-normal"
              >đặt làm mặc định</label
            >
          </div>

          <button class="ml-[var(--label-width)] border-none py-[8px] px-[12px] rounded bg-[var(--pale-yellow)]">
            Cập nhật
          </button>
        </form>
      </div>
    </div>
  </div>
</template>

<style lang=""></style>
