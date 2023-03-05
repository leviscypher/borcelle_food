<script lang="ts" setup>

</script>
<template>
  <div class="payment pt-[100px] pb-[70px] pr-[113px] pl-[113px]">
    <h4 class="payment-title">Payment</h4>
    <div class="payment-order flex gap-[20px]">
      <div class="payment-product w-[80%] ">
        <div class="payment-product-top grid grid-cols-4 pb-10 mb-5">
          <div class="payment-product-row-photo-title">
            image
          </div>
          <div class="payment-product-row-name-title"> Name </div>
          <div class="payment-product-row-price-title"> Price </div>
          <div class="payment-product-row-quantity-title"> Quantity </div>
        </div>
        <div class="payment-product-row grid grid-cols-4 text-center">
          <div class="payment-product-row-photo">
            <img src="@/assets/image/blog1.jpg" class="w-[75px]" alt="Menu">
          </div>
          <div class="payment-product-row-name">Fast Food </div>
          <div class="payment-product-row-price">$90 </div>
          <div class="payment-product-row-quantity">5 </div>
        </div>
      </div>
      <div class="payment-pay w-[20%]">Order</div>
    </div>
  </div>
</template>
<style lang="scss">
@import "@/assets/styles/page/payment/payment.scss";
</style>