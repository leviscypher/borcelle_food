<script lang="ts" setup>
import { ref } from 'vue'
import { Swiper, SwiperSlide } from 'swiper/vue'
import { Pagination } from 'swiper'

import { useOrder } from '@/stores/user'

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

const order = useOrder()
const showModel = ref(false)
const order_id = ref(-1)
const reason = ref('')
const updateSuccess = ref(false)

const ModalOn = (id) => {
  showModel.value = true
  order_id.value = id
}

const confirm = async () => {
  const data = {
    reason: reason.value
  }
  await order.updateStatus(order_id.value, data)
  showModel.value = false
  updateSuccess.value = true
}
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
        <all :statusUpdate="updateSuccess" @cancelled="ModalOn" />
      </swiper-slide>

      <swiper-slide>
        <waitingForPayment />
      </swiper-slide>

      <swiper-slide>
        <waitingForProgressing :statusUpdate="updateSuccess" @cancelled="ModalOn"/>
      </swiper-slide>

      <swiper-slide>
        <waitingForShipping />
      </swiper-slide>

      <swiper-slide>
        <delivered />
      </swiper-slide>

      <swiper-slide>
        <cancelled :statusUpdate="updateSuccess"/>
      </swiper-slide>
    </swiper>
  </div>

  <div
    class="fixed w-full h-[100vh] top-0 left-0 bottom-0 right-0 bg-gray-500 bg-opacity-50 z-[99] flex items-center"
    v-if="showModel"
  >
    <div class="z-[999] w-[400px] bg-white mx-auto rounded-lg">
      <div class="p-[20px]">
        <div class="flex items-center">
          <font-awesome-icon
            icon="fa-sharp fa-light fa-triangle-exclamation"
            class="text-3xl text-danger"
          />
          <h4 class="mb-0 ml-4">Hủy Đơn hàng</h4>
        </div>
        <div class="form-group mt-[20px] py-[10px]">
          <input
            type="text"
            class="form-control"
            placeholder="lý do hủy đơn?"
            v-model="reason"
          />
        </div>
        <p class="text-2xl mt-6">bạn có chắc hủy đơn hàng này?</p>
        <div class="flex justify-end mt-8">
          <button
            class="btn-info border-none px-[18px] py-[10px] mr-[10px] rounded-xl text-xl hover"
            @click="confirm"
          >
            Xác nhận
          </button>
          <button
            class="btn-primary border-none px-[18px] py-[10px] mr-[10px] rounded-xl text-xl hover"
            @click="showModel = false"
          >
            Hủy
          </button>
        </div>
      </div>
    </div>
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
