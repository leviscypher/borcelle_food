<script lang="ts" setup>
defineProps({
  fullname: {
    type: String,
  },
  nickname: {
    type: String,
  },
})

const getValue = (event: Event) => {
  const value = (event.target as HTMLInputElement).value
  return value
}
</script>
<template>
  <div class="form-name my-10">
    <div class="form-group flex items-center">
      <label
        for=""
        class="w-[var(--label-width)] ml-8 font-light text-[1.4rem]"
        >Họ & Tên</label
      >
      <div class="flex-1">
        <input
          type="search"
          class="form-control"
          @input="$emit('update:fullname', getValue($event))"
        />
      </div>
    </div>
    <div class="form-group flex items-center my-10">
      <label
        for=""
        class="w-[var(--label-width)] ml-8 font-light text-[1.4rem]"
        >Nickname</label
      >
      <div class="flex-1">
        <input
          type="search"
          class="form-control"
          @input="$emit('update:nickname', getValue($event))"
        />
      </div>
    </div>
  </div>
</template>
<style></style>
