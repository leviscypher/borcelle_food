<template lang="">
  <div class="affic mb-20">
    <div class="subscribe grid grid-cols-2 defaul-width-wd mx-auto">
      <div class="subscribe-item my-auto">
        <h1 class="subscribe-title title title-sm text-white w-[700px]">Theo dõi chúng tôi để cập nhật nhiều tin tức hơn</h1>
        <p class="subscribe-description description description-width text-white">
          chũng tôi sẽ gửi đến bạn nhưng bài viết mới nhất cũng như các món ăn mới nhất của chúng tôi.
        </p>

        <div class="subscribe-item-send mt-8">
          <input
            type="text"
            placeholder="nhập email của bạn"
            class="mr-4"
          />
          <button class="bf-btn-primary mr-4">Theo dõi</button>
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
<style lang="scss" scoped>
@import '@/assets/styles/page/home/subscribe.scss';
</style>
