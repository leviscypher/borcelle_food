<script lang="ts" setup>
import { ref } from "vue";

const title = ref('Cart')
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
<template>
  <base-banner :title="title" />

  <div class="cart pt-[100px] pb-[70px] pr-[113px] pl-[113px]">
    <table class="table text-center cart-table">
      <thead class="thead">
        <tr>
          <th class="table-head text-center" scope="col">Images</th>
          <th class="table-head text-center" scope="col">Name</th>
          <th class="table-head text-center" scope="col">Prices</th>
          <th class="table-head text-center" scope="col">Số lượng</th>
          <th class="table-head text-center" scope="col">Remove</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th class="table-item text-center" scope="row">
            <img src="@/assets/image/blog1.jpg" class="w-[75px]" alt="Menu">
          </th>
          <td class="">Burger</td>
          <td>$10.00</td>
          <td class="w-[20%]">
            <base-quantity></base-quantity>
          </td>
          <td>
            <router-link to="#" class="w-full p-[20px] block cart-delete">
              <font-awesome-icon icon="fa-solid fa-circle-xmark" />
            </router-link>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="cart-total-order text-center">
      <h2 class="cart-total-tilte">Total Order</h2>
      <div class="cart-total">
        <span>Total:</span>
        <span class="ml-[70px]">$90</span>
      </div>
      <router-link to="/payment">
        <base-button class="cart-pay">pay</base-button>
      </router-link>
    </div>
  </div>
</template>
<style lang="scss" scoped> @import "@/assets/styles/page/cart/cart.scss";
</style>