<script lang="ts" setup>
import { Swiper, SwiperSlide } from 'swiper/vue'
import { Pagination } from 'swiper'
import all from './status/all.vue'
import waitingForPayment from './status/waitingForPayment.vue'
import waitingForProgressing from './status/waitingForProgressing.vue'
import waitingForShipping from './status/waitingForShipping.vue'
import delivered from './status/delivered.vue'
import cancelled from './status/cancelled.vue'

import 'swiper/css'
import 'swiper/css/pagination'
const modules = [Pagination]
const tab = ['Tất cả đơn', 'Chờ thanh toán', 'Đang xử lý', 'Đang vận chuyển', 'Đã giao', 'Đã hủy']
</script>

<template lang="">
  <div class="order my-10 mx-8">
    <h4 class="order-heading mb-5">Đơn hàng của tôi</h4>
    <div clas="order-navbar">
      <div class="order-navbar-item w-full flex justify-between items-center bg-[#fff]"></div>
    </div>
    <div class="order-search mt-10 form-control flex justify-between items-center px-0">
      <font-awesome-icon
        icon="fa-solid fa-magnifying-glass"
        class="px-10"
      />
      <input
        type="search"
        class="flex-1 h-full outline-none mr-6 border-none"
        maxlength="400"
      />
      <button class="btn-search bg-[#fff] text-[var(--pale-yellow)] pr-[6px] pl-[16px]">Tìm đơn hàng</button>
    </div>
    <swiper
      :slides-per-view="1"
      :mousewheel="true"
      :pagination="{
        clickable: true,
        el: '.order-navbar-item',
        bulletActiveClass: 'active',
        bulletClass: 'order-navbar-list cursor-pointer py-6 px-14',
        horizontalClass: 'order-navbar-list',
        bulletElement: 'span',
        renderBullet: function (index, className) {
          return `<span class='${className}'>${tab[index]}</span>`
        },
      }"
      class="swiper"
      :modules="modules"
    >
      <swiper-slide>
        <all />
      </swiper-slide>

      <swiper-slide>
        <waitingForPayment />
      </swiper-slide>

      <swiper-slide>
        <waitingForProgressing/>
      </swiper-slide>

      <swiper-slide>
        <waitingForShipping />
      </swiper-slide>

      <swiper-slide>
        <delivered/>
      </swiper-slide>

      <swiper-slide>
        <cancelled/>
      </swiper-slide>
    </swiper>
  </div>
</template>
<style lang="scss">
.order-navbar-list {
  color: #808089;
}

.order-navbar-list.active {
  color: var(--pale-yellow) !important;
  border-bottom: 2px solid var(--pale-yellow);
}

.btn-search {
  border-top: none;
  border-right: none;
  border-bottom: none;
  border-left: 2px solid rgb(221, 221, 227);
}
</style>
