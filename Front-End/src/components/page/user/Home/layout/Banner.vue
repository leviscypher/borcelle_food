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

        <h1 class="banner-content-title title">Get Restant Food by Ordering Online</h1>

        <p class="bannaer__content-description description">
          A restaurant sometimes known as a diner is a place where cooked food is sold to the public, and where people
          sit down to eat it. It is also a place where people go to enjoy the time and to eat a meal.
        </p>

        <div class="banner-content-search">
          <input
            type="text"
            placeholder="Enter food name"
            class="mr-4"
          />
          <button class="bf-btn-primary mr-4">Search Now</button>
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
