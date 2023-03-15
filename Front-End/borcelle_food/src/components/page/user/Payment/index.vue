<script lang="ts" setup>
</script>
<template>
  <div class="payment pt-[100px] pb-[70px] pr-[113px] pl-[113px]">
    <h4 class="payment-title">Payment</h4>
    <div class="payment-order flex gap-[20px]">
      <div class="payment-product w-[75%]">
        <div class="payment-product-top grid grid-cols-4 pb-10 mb-5">
          <div class="payment-product-row-photo-title">image</div>
          <div class="payment-product-row-name-title">Name</div>
          <div class="payment-product-row-price-title">Price</div>
          <div class="payment-product-row-quantity-title">Quantity</div>
        </div>
        <div class="payment-product-row grid grid-cols-4 text-center">
          <div class="payment-product-row-photo">
            <img
              src="@/assets/image/blog1.jpg"
              class="w-[75px]"
              alt="Menu"
            />
          </div>
          <div class="payment-product-row-name">Fast Food</div>
          <div class="payment-product-row-price">$90</div>
          <div class="payment-product-row-quantity">5</div>
        </div>
      </div>
      <div class="payment-pay w-[25%]">
        <div class="payment-pay-top mb-10">
          <h3 class="payment-pay-tilte">Giao tới</h3>
          <div class="payment-pay flex justify-between">
            <p class="payment-pay-name w-full text-left overflow-hidden"><strong>fdfds sdfds Tạ Quang Thắng </strong></p>
            |
            <p class="payment-pay-phone w-full text-right overflow-hidden"><strong> 0987654321 </strong></p>
          </div>
          <p class="payment-pay-address">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Itaque non est velit, officiis debitis alias animi
            in fuga ex ullam aut beatae maxime odit officia laboriosam expedita minus nisi atque?
          </p>
        </div>
        <div class="payment-pay-bottom mt-5 mb-5">
          <div class="payment-pay-provisional flex justify-between">
            <div class="payment-pay-provisional-text">Tạm Tính:</div>
            <div class="payment-pay-provisional-number">$90</div>
          </div>
          <div class="payment-pay-total-money flex justify-between pt-10">
            <div class="payment-pay-total-money-text">Tạm Tính:</div>
            <h1 class="payment-pay-total-money-number">$90</h1>
          </div>
        </div>
        <base-button class="payment-pay-purchase">Mua hàng</base-button>
      </div>
    </div>
  </div>
</template>
<style lang="scss">
@import '@/assets/styles/page/payment/payment.scss';
</style>