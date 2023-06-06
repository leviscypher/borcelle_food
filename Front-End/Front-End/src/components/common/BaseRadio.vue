<script lang="ts" setup>

let props = defineProps<{
  data: any
}>()


</script>
<template>
  <div class="flex gap-[20px]" v-bind="$attrs">
    <label class="inline-flex items-center" v-for="(data,index) in props.data" :key="index">
      <input
        type="radio"
        class="form-radio text-indigo-600"
        name="gender"
        value="male"
      />
      <span class="ml-2">{{ data }}</span>
    </label>
  </div>
</template>