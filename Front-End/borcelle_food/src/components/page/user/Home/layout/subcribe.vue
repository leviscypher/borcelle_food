<template lang="">
  <div class="affic mb-20">
    <div class="subscribe grid grid-cols-2 defaul-width-wd mx-auto">
      <div class="subscribe-item my-auto">
        <h1 class="subscribe-title title title-sm text-white w-[700px]">Subscribe News Letter for Get Update</h1>
        <p class="subscribe-description description description-width text-white">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do tempor incididunt ut labore et dolore magna
          aliqua.
        </p>

        <div class="subscribe-item-send mt-8">
          <input
            type="text"
            placeholder="Enter your email"
            class="mr-4"
          />
          <button class="bf-btn-primary mr-4">Subscribe</button>
        </div>
      </div>
      <div class="subscribe-image my-20 flex justify-end">
        <img
          src="@/assets/image/subscribe-main.png"
          alt=""
        />
      </div>
    </div>
  </div>
</template>
<script>
export default {}
</script>
<style lang="scss">
@import '@/assets/styles/page/home/subscribe.scss';
</style>
