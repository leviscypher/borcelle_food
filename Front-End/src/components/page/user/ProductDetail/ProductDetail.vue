<script lang="ts" setup>
import { ref } from 'vue'
import { Swiper, SwiperSlide } from 'swiper/vue'
import { Autoplay, Navigation } from 'swiper'
const modules = [Autoplay, Navigation]

const descriptionImg = ref('src/assets/image/bo/banner-slider2.png')
const test = ref(['Lớn', 'Vừa', 'Nhỏ'])
const changeImg = (e: any) => {
  descriptionImg.value = e.target.attributes.src.nodeValue
}
</script>
<template>
  <div class="pt-[100px] pb-[70px] pl-[100px] pr-[100px]">
    <div class="product-detail mx-auto p-10 flex gap-[50px]">
      <div class="product-detail-left">
        <div class="product-detail-left-top">
          <img
            :src="descriptionImg"
            class="product-detail-left-top-photo"
            alt=""
          />
        </div>
        <div class="product-detail-left-bottom pt-10">
          <div class="product-detail-left-bottom-description-photo gap-[10px]">
            <div class="product-detail-left-bottom-photo">
              <swiper
                :slides-per-view="4"
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
                  <div class="product-detail-left-img">
                    <img
                      src="@/assets/image/bo/bo-bit-tet-650x375.jpg"
                      class="product-detail-left-bottom-description-img"
                      alt=""
                      @click="changeImg($event)"
                    />
                  </div>
                </swiper-slide>

                <swiper-slide>
                  <div class="product-detail-left-img">
                    <img
                      src="@/assets/image/bo/banner-slider2.png"
                      class="product-detail-left-bottom-description-img"
                      alt=""
                      @click="changeImg($event)"
                    />
                  </div>
                </swiper-slide>

                <swiper-slide>
                  <div class="product-detail-left-img">
                    <img
                      src="@/assets/image/bo/cac-mon-bo-ngon-de-lam-6.jpg"
                      class="product-detail-left-bottom-description-img"
                      alt=""
                      @click="changeImg($event)"
                    />
                  </div>
                </swiper-slide>
              </swiper>
            </div>
          </div>
        </div>
      </div>
      <div class="product-detail-right">
        <h1 class="product-detail-right-title">Thịt bò sốt vang</h1>
        <div class="product-detail-right-order-price flex justify-between">
          <div class="product-detail-right-price">499đ</div>
          <base-quantity />
        </div>
        <div class="product-detail-right-option pt-16 pb-16">
          <h3 class="product-detail-right-option-title bg-[#c4c4c44d] p-4">CHỌN SIZE (BẮT BUỘC)</h3>
          <base-radio
            class="pt-5"
            :data="test"
          />
        </div>
        <div class="product-detail-right-btn">
          <base-button>Thêm vào giỏ hàng</base-button>
        </div>
      </div>
    </div>
  </div>
</template>
<style lang="scss" scoped>
@import '@/assets/styles/page/ProductDetail/ProductDetail.scss';
</style>