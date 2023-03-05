<script lang="ts" setup>
import { ref } from "vue";

const quantity = ref(1)
const maxQuantity = 100

const decrement = () => {
  if (quantity.value > 1) {
    quantity.value--;
  }
}
const increment = () => {
  if (quantity.value < maxQuantity) {
    quantity.value++;
  }
}
const limitQuantity = (event: any) => {
  if (event.target.value > maxQuantity) {
    quantity.value = maxQuantity;
  } else if (event.target.value < 1) {
    quantity.value = 1;
  }
}
</script>
<template lang="">
<div class="quantity-number flex items-center justify-center">
  <base-button class="quantity-reduce m-0" @click="decrement">
    <font-awesome-icon icon="fa-solid fa-minus" />
  </base-button>
  <div class="pr-4 pl-4">
    <input type="number" :value="quantity" :v-model="quantity" @input="limitQuantity" class="quantity-quantity" min="1" max="100">
  </div>
  <base-button class="quantity-increase m-0" @click="increment">
    <font-awesome-icon icon="fa-solid fa-plus" />
  </base-button>
</div>
</template>

<style lang="scss" scoped>
@import "@/assets/styles/common/base-quantity.scss";
</style>
