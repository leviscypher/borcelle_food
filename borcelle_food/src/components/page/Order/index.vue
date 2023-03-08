<script lang="ts" setup>
import { ref } from 'vue'

const title = ref('Đặt hàng')

const tab = ref(1)
const currentTab = (tabNumber: any) => {
  tab.value = tabNumber
}
</script>
<template>
  <div class="pt-[100px] pb-[70px] pl-[100px] pr-[100px]">
    <div class="order">
      <h2 class="mb-4 font-bold text-center">Thực đơn nhà Borcelle Food</h2>
      <div class="container mx-auto mt-[50px]">
        <ul class="flex justify-center space-x-2 text-white list-none">
          <li>
            <button
              @click="currentTab(1)"
             
              class="order-btn inline-block px-4 py-2 text-center text-black border-none bg-transparent focus:outline-none"
            >
              <div class="w-[70px] h-[70px] rounded-full bg-white mb-5">
                <img
                  src="@/assets/icon/icon_pizza_active.png"
                  class="order-icon"
                  :class="[ tab === 1 ? 'active' : '' ]"
                  alt=""
                />
              </div>
              <div
                class="order-text"
                :class="[ tab === 1 ? 'active' : '' ]"
              >
                Pizza
              </div>
            </button>
          </li>
          <li>
            <button
              @click="currentTab(2)"
              class="order-btn inline-block px-4 py-2 text-center text-black border-none bg-transparent focus:outline-none"
            >
              <div class="w-[70px] h-[70px] rounded-full bg-white mb-5">
                <img
                  src="@/assets/icon/icon_khaivi_active.png"
                  class="order-icon"
                  :class="[ tab === 2 ? 'active' : '' ]"
                  alt=""
                />
              </div>
              <div
                class="order-text"
                :class="[ tab === 2 ? 'active' : '' ]"
              >
                Mì Ý
              </div>
            </button>
          </li>
          <li>
            <button
              @click="currentTab(3)"
              class="order-btn inline-block px-4 py-2 text-center text-black border-none bg-transparent focus:outline-none"
            >
              <div class="w-[70px] h-[70px] rounded-full bg-white mb-5">
                <img
                  src="@/assets/icon/icon_salad_active.png"
                  class="order-icon" :class="[ tab === 3 ? 'active' : '' ]"
                  alt=""
                />
              </div>
              <div class="order-text" :class="[ tab === 3 ? 'active' : '' ]">Salad</div>
            </button>
          </li>
          <li>
            <button
              @click="currentTab(4)"
              class="order-btn inline-block px-4 py-2 text-center text-black border-none bg-transparent focus:outline-none"
            >
              <div class="w-[70px] h-[70px] rounded-full bg-white mb-5">
                <img
                  src="@/assets/icon/icon_douong_active.png"
                  class="order-icon" :class="[ tab === 4 ? 'active' : '' ]"
                  alt=""
                />
              </div>
              <div class="order-text" :class="[ tab === 4 ? 'active' : '' ]">Đồ uống</div>
            </button>
          </li>
          <li>
            <button
              @click="currentTab(5)"
              class="order-btn inline-block px-4 py-2 text-center text-black border-none bg-transparent focus:outline-none"
            >
              <div class="w-[70px] h-[70px] rounded-full bg-white mb-5">
                <img
                  src="@/assets/icon/icon_combo_active.png"
                  class="order-icon" :class="[ tab === 5 ? 'active' : '' ]"
                  alt=""
                />
              </div>
              <div class="order-text" :class="[ tab === 5 ? 'active' : '' ]">Combo</div>
            </button>
          </li>
        </ul>
        <div class="p-3 mt-6 text-center bg-white">
          <div v-if="tab === 1">
            Tab 1 Content show Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas sunt ducimus numquam! Quam,
            perspiciatis!
          </div>
          <div v-if="tab === 2">
            Tab 2 Content show Lorem ipsum dolor sit amet consectetur, adipisicing elit. aliquam rem. Exercitationem
            corporis eius voluptatibus.
          </div>
          <div v-if="tab === 3">Tab 3 Content show Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
        </div>
      </div>
    </div>
  </div>
</template>
<style lang="scss" scoped>
@import '@/assets/styles/page/order/order.scss';
</style>