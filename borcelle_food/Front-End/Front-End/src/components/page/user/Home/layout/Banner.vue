<script lang="ts" setup>
import { Swiper, SwiperSlide } from 'swiper/vue'
import { Autoplay, Navigation } from 'swiper'
import 'swiper/css'
import 'swiper/css/navigation'

const modules = [Autoplay, Navigation]
</script>
<template>
  <div>
    <!-- BANNER -->
    <div class="banner defaul-width-wd">
      <div class="banner-content">
        <img
          src="@/assets/image/shape2.png"
          alt=""
        />

        <h1 class="banner-content-title title">Nhận Đồ Ăn bằng cách đặt hàng trực tuyến</h1>

        <p class="bannaer__content-description description">
          Nhà hàng đôi khi được gọi là quán ăn là nơi bán thức ăn đã nấu chín cho công chúng và là nơi mọi người ngồi ăn. Đó cũng là nơi mọi người đến để tận hưởng thời gian và ăn một bữa ăn.
        </p>

        <div class="banner-content-search">
          <input
            type="text"
            placeholder="Tìm kiếm tên món ăn..."
            class="mr-4"
          />
          <button class="bf-btn-primary mr-4">Tìm kiếm ngay</button>
        </div>

        <img
          src="@/assets/image/shape1.png"
          alt=""
        />
      </div>

      <!-- <div class="banner-slides">
        <div class="banner-slider"> -->
      <swiper
        :slides-per-view="1"
        :navigation="{
          nextEl: '.banner-silder-navigate-next',
          prevEl: '.banner-silder-navigate-prev',
        }"
        :loop="true"
        class="mx-0"
        :autoplay="{
          delay: 2500,
          disableOnInteraction: false,
        }"
        :modules="modules"
      >
        <swiper-slide>
          <div class="banner-slider-item">
            <img
              src="@/assets/image/banner-slider1.png"
              alt=""
            />
          </div>
        </swiper-slide>

        <swiper-slide>
          <div class="banner-slider-item">
            <img
              src="@/assets/image/bo/banner-slider2.png"
              alt=""
            />
          </div>
        </swiper-slide>

        <swiper-slide>
          <div class="banner-slider-item">
            <img
              src="@/assets/image/banner-slider3.png"
              alt=""
            />
          </div>
        </swiper-slide>
      </swiper>
      <!-- </div> -->
      <!-- </div> -->

      <div class="banner-slider-navigate z-10">
        <div class="banner-silder-navigate-prev">
          <font-awesome-icon icon="fa-solid fa-arrow-left" />
        </div>
        <div class="banner-silder-navigate-next">
          <font-awesome-icon icon="fa-solid fa-arrow-right" />
        </div>
      </div>
    </div>
    <!-- END BANNER -->
  </div>
</template>

<style lang="scss" scoped>
@import '@/assets/styles/page/home/banner.scss';
</style>
