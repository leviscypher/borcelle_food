<template lang="">
  <div class="services defaul-width-wd">
    <h1 class="services-title title title-sm">What Restant Services</h1>
    <p class="services-description description">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
      magna aliqua.
    </p>

    <div class="services-item grid gap-4 grid-cols-3">
      <div class="services-list rounded-2xl p-14 mt-20">
        <a href="">
          <img
            class="ml-auto mr-auto"
            src="@/assets/image/service1.png"
            alt=""
          />
          <h3 class="services-list-title text-4xl font-bold mb-4 mt-4">Fresh Healthy Food</h3>
          <p class="services-list-description description">
            Fresh food is food which has not been preserved and has not spoiled yet. Fo vegetables and fruits, this
            means.
          </p>
        </a>
      </div>

      <div class="services-list rounded-2xl p-14 active mt-20">
        <a href="">
          <img
            class="ml-auto mr-auto"
            src="@/assets/image/service2.png"
            alt=""
          />
          <h3 class="services-list-title active text-4xl font-bold mb-4 mt-4">Discount Voucher</h3>
          <p class="services-list-description active description">
            Fresh food is food which has not been preserved and has not spoiled yet. Fo vegetables and fruits, this
            means.
          </p>
        </a>
      </div>

      <div class="services-list rounded-2xl p-14 mt-20">
        <a href="">
          <img
            class="ml-auto mr-auto"
            src="@/assets/image/service3.png"
            alt=""
          />
          <h3 class="services-list-title text-4xl font-bold mb-4 mt-4">Free Fast Home Delivery</h3>
          <p class="services-list-description description">
            Fresh food is food which has not been preserved and has not spoiled yet. Fo vegetables and fruits, this
            means.
          </p>
        </a>
      </div>
    </div>
  </div>
</template>
<script>
export default {}
</script>
<style lang="scss">
@import '@/assets/styles/page/home/services.scss';
</style>
