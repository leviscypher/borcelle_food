<template lang="">
  <div class="blogs defaul-width-wd mx-auto my-40">
    <h1 class="blogs-title title title-sm text-center">Blog thường xuyên của chúng tôi</h1>
    <p class="blogs-description description-width description mx-auto text-center mt-4">
      Nơi cập nhật những thông tin về các món ăn mới nhất của chúng tôi, cũng như các món ăn được yêu thích nhất.
    </p>
    <div class="blogs-content grid grid-cols-3 gap-4 mt-20">
      <div class="blogs-content-item">
        <div class="blogs-content-img">
          <router-link to="/detailpage">
            <img
              class="w-full h-[300px] contain"
              src="@/assets/image/blog1.jpg"
              alt=""
            />
          </router-link>
          <span class="blogs-content-date">01 tháng 5 năm 2020</span>
        </div>
        <router-link
          to="/detailpage"
          class="no-underline text-[var(--dark)]"
        >
          <h3 class="blogs-content-title block text-4xl font-medium my-10 mx-10">Tóm tắt về cách làm mì ống</h3>
        </router-link>
        <p class="blogs-content-description description ml-10 mr-4 mb-40">
          Mỳ ống là một trong những món ăn của cửa hàng chúng tôi, hôm nay chúng tôi sẽ chia sẻ ....
        </p>
        <router-link
          to="/detailpage"
          class="blogs-content-btn bf-btn-primary no-underline"
          >Đọc thêm</router-link
        >
      </div>

      <div class="blogs-content-item">
        <div class="blogs-content-img">
          <router-link to="/detailpage">
            <img
              class="w-full h-[300px] contain"
              src="@/assets/image/blog2.jpg"
              alt=""
            />
          </router-link>
          <span class="blogs-content-date">01 tháng 5 năm 2020</span>
        </div>
        <router-link
          to="/detailpage"
          class="no-underline text-[var(--dark)]"
        >
          <h3 class="blogs-content-title block text-4xl font-medium my-10 mx-10">Giới thiệu về món salad Tôm trộn</h3>
        </router-link>
        <p class="blogs-content-description description ml-10 mr-4 mb-40">
         Salad tôm là món ăn được rất nhiều người yêu thích tại cửa hàng chúng tôi, trong bài viết này chũng tôi sẽ giới thiệu ....
        </p>
        <router-link
          to="/detailpage"
          class="blogs-content-btn bf-btn-primary no-underline"
          >Đọc thêm</router-link
        >
      </div>

      <div class="blogs-content-item">
        <div class="blogs-content-img">
          <router-link to="/detailpage">
            <img
              class="w-full h-[300px] contain"
              src="@/assets/image/blog3.jpg"
              alt=""
            />
          </router-link>
          <span class="blogs-content-date">01 tháng 5 năm 2020</span>
        </div>
        <router-link
          to="/detailpage"
          class="no-underline text-[var(--dark)]"
        >
          <h3 class="blogs-content-title block text-4xl font-medium my-10 mx-10">Giới thiệu về món bánh mỳ kẹp thịt bò</h3>
        </router-link>
        <p class="blogs-content-description description ml-10 mr-4 mb-40">
          một trong số các món ăn được đặt nhiều nhất trên website cũng như cửa hàng của chúng tôi, hôm nay tôi ....
        </p>
        <router-link
          to="/detailpage"
          class="blogs-content-btn bf-btn-primary no-underline"
          >Đọc thêm</router-link
        >
      </div>
    </div>
    <div class="blogs-more text-center">
      <a
        class="no-underline font-medium inline-block text-4xl text-[var(--dark)] hover:text-[var(--pale-yellow)]"
        href=""
        >xem nhiều bài viết khác
      </a>
    </div>
  </div>
</template>
<script>
export default {}
</script>
<style lang="scss" scoped>
@import '@/assets/styles/page/home/blogs.scss';
</style>
