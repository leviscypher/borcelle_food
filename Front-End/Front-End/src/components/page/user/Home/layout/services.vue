<script lang="ts" setup>
import { Swiper, SwiperSlide } from 'swiper/vue'
import { Autoplay } from 'swiper'
import 'swiper/css'
const modules = [Autoplay]
</script>

<template lang="">
  <div class="services defaul-width-wd">
    <h1 class="services-title title title-sm">Các dịch vụ hỗ trợ</h1>
    <p class="services-description description">
      Cửa hàng chúng tôi bao gồm các dịch vụ hỗ trợ với các khách hàng mua hàng qua website.
    </p>

    <swiper
      :slides-per-view="3"
      :loop="true"
      :modules="modules"
      :autoplay="{
        delay: 2500,
        disableOnInteraction: false,
      }"
      id="swiper-slider"
    >
      <swiper-slide>
        <div class="services-list rounded-2xl p-14 mt-20">
          <a href="">
            <img
              class="ml-auto mr-auto"
              src="@/assets/image/service1.png"
              alt=""
            />
            <h3 class="services-list-title text-4xl font-bold mb-4 mt-4">Tăng miễn phí thực phẩm salad tươi</h3>
            <p class="services-list-description description">
              Thưc phầm tươi sống là thực phẩm chưa qua bảo quản, chưa bị hư hỏng điều này có nghĩ là nó rất tốt cho sức
              khỏe.
            </p>
          </a>
        </div>
      </swiper-slide>
      <swiper-slide>
        <div class="services-list rounded-2xl p-14 mt-20">
          <a href="">
            <img
              class="ml-auto mr-auto"
              src="@/assets/image/service2.png"
              alt=""
            />
            <h3 class="services-list-title text-4xl font-bold mb-4 mt-4">Giao hàng tận nhà</h3>
            <p class="services-list-description description">
              Chúng tôi có dịch vụ giao hàng tận nhà một cách nhanh chóng nhất.
            </p>
          </a>
        </div>
      </swiper-slide>
      <swiper-slide>
        <div class="services-list rounded-2xl p-14 mt-20">
          <a href="">
            <img
              class="ml-auto mr-auto"
              src="@/assets/image/service3.png"
              alt=""
            />
            <h3 class="services-list-title text-4xl font-bold mb-4 mt-4">Phiếu giảm giá</h3>
            <p class="services-list-description description">Tặng miễn phí các phiếu giảm giá để mua hàng.</p>
          </a>
        </div>
      </swiper-slide>
      <swiper-slide>
        <div class="services-list rounded-2xl p-14 mt-20">
          <a href="">
            <img
              class="ml-auto mr-auto"
              src="@/assets/image/service1.png"
              alt=""
            />
            <h3 class="services-list-title text-4xl font-bold mb-4 mt-4">Tăng miễn phí thực phẩm salad tươi</h3>
            <p class="services-list-description description">
              Thưc phầm tươi sống là thực phẩm chưa qua bảo quản, chưa bị hư hỏng điều này có nghĩ là nó rất tốt cho sức
              khỏe.
            </p>
          </a>
        </div>
      </swiper-slide>
      <swiper-slide>
        <div class="services-list rounded-2xl p-14 mt-20">
          <a href="">
            <img
              class="ml-auto mr-auto"
              src="@/assets/image/service2.png"
              alt=""
            />
            <h3 class="services-list-title text-4xl font-bold mb-4 mt-4">Giao hàng tận nhà</h3>
            <p class="services-list-description description">
              Chúng tôi có dịch vụ giao hàng tận nhà một cách nhanh chóng nhất.
            </p>
          </a>
        </div>
      </swiper-slide>
      <swiper-slide>
        <div class="services-list rounded-2xl p-14 mt-20">
          <a href="">
            <img
              class="ml-auto mr-auto"
              src="@/assets/image/service3.png"
              alt=""
            />
            <h3 class="services-list-title text-4xl font-bold mb-4 mt-4">Phiếu giảm giá</h3>
            <p class="services-list-description description">
              Tặng miễn phí các phiếu giảm giá để mua hàng.
            </p>
          </a>
        </div>
      </swiper-slide>
    </swiper>
  </div>
</template>

<style lang="scss" scoped>
@import '@/assets/styles/page/home/services.scss';

:deep(.swiper-wrapper) {
  display: grid !important;
  grid-template-columns: repeat(6, 1fr) !important;
  grid-column-gap: 10px !important;
}
</style>
