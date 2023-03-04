<script lang="ts" setup>
import { ref } from "vue";

const title = ref('Cart')

</script>
<template>
  <base-banner :title="title" />

  <div class="cart pt-[100px] pb-[70px] pr-[113px] pl-[113px]">
    <table class="table text-center cart-table" border="1">
      <thead class="thead">
        <tr>
          <th class="table-head text-center" scope="col">Images</th>
          <th class="table-head text-center" scope="col">Items</th>
          <th class="table-head text-center" scope="col">Prices</th>
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
          <td>
            <router-link to="#" class="w-full p-[20px] block cart-delete" >
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
      <base-button class="cart-pay">pay</base-button>
    </div>
  </div>
</template>
<style lang="scss" scoped> @import "@/assets/styles/page/cart/cart.scss";
</style>