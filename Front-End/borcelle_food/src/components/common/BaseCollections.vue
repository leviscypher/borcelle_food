<script lang="ts" setup>
import BaseQuantity from '@/components/common/BaseQuantity.vue'
import { ref } from 'vue'
const tab = ref(1)
let props = defineProps<{
  data: any
}>()
const currentTab = (tabNumber: any) => {
  tab.value = tabNumber
}
</script>
<template>
  <div
    class="collections defaul-width-wd mx-auto mt-72 mb-20"
    v-bind="$attrs"
  >
    <h2 class="mb-4 font-bold text-center">Thực đơn nhà Borcelle Food</h2>
    <div class="container mx-auto mt-[50px]">
      <ul class="flex justify-center space-x-2 text-white list-none">
        <li>
          <button
            @click="currentTab(1)"
            class="collections-btn inline-block px-4 py-2 text-center text-black border-none bg-transparent focus:outline-none"
          >
            <div class="w-[70px] h-[70px] rounded-full bg-white mb-5">
              <img
                src="@/assets/icon/icon_pizza_active.png"
                class="collections-icon"
                :class="[tab === 1 ? 'active' : '']"
                alt=""
              />
            </div>
            <div
              class="collections-text"
              :class="[tab === 1 ? 'active' : '']"
            >
              Pizza
            </div>
          </button>
        </li>
        <li>
          <button
            @click="currentTab(2)"
            class="collections-btn inline-block px-4 py-2 text-center text-black border-none bg-transparent focus:outline-none"
          >
            <div class="w-[70px] h-[70px] rounded-full bg-white mb-5">
              <img
                src="@/assets/icon/icon_khaivi_active.png"
                class="collections-icon"
                :class="[tab === 2 ? 'active' : '']"
                alt=""
              />
            </div>
            <div
              class="collections-text"
              :class="[tab === 2 ? 'active' : '']"
            >
              Mì Ý
            </div>
          </button>
        </li>
        <li>
          <button
            @click="currentTab(3)"
            class="collections-btn inline-block px-4 py-2 text-center text-black border-none bg-transparent focus:outline-none"
          >
            <div class="w-[70px] h-[70px] rounded-full bg-white mb-5">
              <img
                src="@/assets/icon/icon_salad_active.png"
                class="collections-icon"
                :class="[tab === 3 ? 'active' : '']"
                alt=""
              />
            </div>
            <div
              class="collections-text"
              :class="[tab === 3 ? 'active' : '']"
            >
              Salad
            </div>
          </button>
        </li>
        <li>
          <button
            @click="currentTab(4)"
            class="collections-btn inline-block px-4 py-2 text-center text-black border-none bg-transparent focus:outline-none"
          >
            <div class="w-[70px] h-[70px] rounded-full bg-white mb-5">
              <img
                src="@/assets/icon/icon_douong_active.png"
                class="collections-icon"
                :class="[tab === 4 ? 'active' : '']"
                alt=""
              />
            </div>
            <div
              class="collections-text"
              :class="[tab === 4 ? 'active' : '']"
            >
              Đồ uống
            </div>
          </button>
        </li>
        <li>
          <button
            @click="currentTab(5)"
            class="collections-btn inline-block px-4 py-2 text-center text-black border-none bg-transparent focus:outline-none"
          >
            <div class="w-[70px] h-[70px] rounded-full bg-white mb-5">
              <img
                src="@/assets/icon/icon_combo_active.png"
                class="collections-icon"
                :class="[tab === 5 ? 'active' : '']"
                alt=""
              />
            </div>
            <div
              class="collections-text"
              :class="[tab === 5 ? 'active' : '']"
            >
              Combo
            </div>
          </button>
        </li>
      </ul>
      <div class="p-3 mt-6 text-center">
        <div v-if="tab === 1">
          <div class="collections-item w-full grid grid-cols-4 gap-6 mt-20 mb-10">
            <div class="collections-list">
              <div class="collections-list-img">
                <router-link :to="props.data">
                  <img
                    class="w-full cover"
                    src="@/assets/image/1.jpg"
                    alt=""
                  />
                </router-link>
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/2.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/3.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/4.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/5.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/6.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/7.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/8.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div v-if="tab === 2">
          <div class="collections-item w-full grid grid-cols-4 gap-6 mt-20 mb-10">
            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/1.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/2.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/3.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/4.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/5.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/6.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/7.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/8.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div v-if="tab === 3">
          <div class="collections-item w-full grid grid-cols-4 gap-6 mt-20 mb-10">
            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/1.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/2.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/3.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/4.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/5.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/6.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/7.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/8.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div v-if="tab === 4">
          <div class="collections-item w-full grid grid-cols-4 gap-6 mt-20 mb-10">
            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/1.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/2.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/3.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/4.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/5.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/6.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/7.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/8.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div v-if="tab === 5">
          <div class="collections-item w-full grid grid-cols-4 gap-6 mt-20 mb-10">
            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/1.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/2.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/3.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/4.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/5.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/6.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/7.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>

            <div class="collections-list">
              <div class="collections-list-img">
                <img
                  class="w-full cover"
                  src="@/assets/image/8.jpg"
                  alt=""
                />
                <div class="collection-list--add-cart">
                  <a href=""><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a>
                </div>
                <ul class="collections-list-start flex">
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                  <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                </ul>
              </div>
              <div class="collections-list-info">
                <h3 class="collections-list-title mt-8 ml-8 text-3xl font-medium">Dark Chocolate Cake</h3>
                <div class="flex items-center justify-between mb-8 mt-8">
                  <p class="collections-list-price ml-8 text-3xl font-medium">$25</p>
                  <base-quantity />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="collections-more text-center">
      <a
        class="no-underline font-medium inline-block text-4xl"
        href=""
        >View More Colletction</a
      >
    </div>
  </div>
</template>

<style lang="scss">
@import '@/assets/styles/page/home/collections.scss';
</style>
