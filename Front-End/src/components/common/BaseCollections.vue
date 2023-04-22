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
    <form class="w-full max-w-[35rem] mx-auto">
      <div class="flex w-[37rem]">
        <input
          class="collections-search"
          type="text"
          placeholder="Tìm kiếm..."
        />
        <base-button class="collections-btn-seacrch m-0"><i class='bx bx-search'></i></base-button>
      </div>
    </form>

    <div class="container mx-auto mt-[50px]">
      <div class="p-3 mt-6 text-center">
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

    <div class="collections-more flex justify-center">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item">
            <a
              class="page-link"
              href="#"
              aria-label="Previous"
            >
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <li class="page-item">
            <a
              class="page-link"
              href="#"
              >1</a
            >
          </li>
          <li class="page-item">
            <a
              class="page-link"
              href="#"
              >2</a
            >
          </li>
          <li class="page-item">
            <a
              class="page-link"
              href="#"
              >3</a
            >
          </li>
          <li class="page-item">
            <a
              class="page-link"
              href="#"
              aria-label="Next"
            >
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</template>

<style lang="scss" scoped>
@import '@/assets/styles/page/home/collections.scss';

</style>
