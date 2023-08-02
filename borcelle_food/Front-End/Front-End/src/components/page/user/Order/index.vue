<script lang="ts" setup>
import { ref } from 'vue'
import { onMounted, computed } from 'vue'
import { useProduct, useCategory } from '@/stores/user'

import Pagination from '@/components/common/Pagination.vue'

const products = useProduct()
const category = useCategory()
const isLoading = ref(true)
const dropdown = ref(false)
const title = ref('Đặt hàng')
const searchValue = ref('')

onMounted(async () => {
  isLoading.value = true
  await Promise.all([products.fetchProducts(), category.fetchCategories()])
  isLoading.value = false
})

const getProduct = computed(() => {
  return products.getProducts
})

const getCategories = computed(() => {
  return category.getCategories
})

const changePage = async (number: number) => {
  isLoading.value = true
  await products.fetchProducts(number)
  isLoading.value = false
}

const handleDropdow = () => {
  dropdown.value = !dropdown.value
}

const search = async () => {
  isLoading.value = true
  await products.searchData(searchValue.value)
  products.getProducts
  isLoading.value = false
}

const searchCategory = async (category_id: Number) => {
  isLoading.value = true
  await products.searchCategory(category_id)
  products.getProducts
  isLoading.value = false
}

const getAll = async () => {
  isLoading.value = true
  await Promise.all([products.fetchProducts()])
  getProduct
  isLoading.value = false
}
</script>
<template>
  <div
    v-if="!isLoading"
    class="bg-[#f3f4f6]"
  >
    <base-banner :title="title" />
    <form class="w-[800px] z-10 mt-[60px] mx-auto mb-[40px]">
      <div class="flex">
        <!-- category -->
        <button
          @click="handleDropdow"
          id="dropdown-button"
          data-dropdown-toggle="dropdown"
          class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-lg font-medium text-center border-none bg-[var(--pale-yellow)] relative rounded-tl-lg rounded-bl-lg"
          type="button"
        >
          Danh mục sản phẩm
          <svg
            aria-hidden="true"
            class="w-4 h-4 ml-1"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
              clip-rule="evenodd"
            ></path>
          </svg>

          <div
            id="dropdown"
            class="w-[400px] h-[200px] bg-[#f4907c] absolute bottom-0 left-0 translate-y-[105%] rounded-md overflow-y-scroll pb-[40px]"
            :class="dropdown ? '' : 'hidden'"
          >
            <ul class="list-none pl-0 text-2xl">
              <li class="p-[14px] duration-500 rounded-md hover:bg-[#ffbe00] text-white" @click="getAll">Tất cả</li>
              <li
                v-for="category in getCategories"
                :key="category.id"
                class="p-[14px] duration-500 rounded-md hover:bg-[#ffbe00] text-white"
                @click="searchCategory(category.id)"
              >
                {{ category.name }}
              </li>
            </ul>
          </div>
        </button>

        <!-- search  -->
        <div class="relative w-full">
          <input
            type="search"
            id="search-dropdown"
            class="block p-2.5 w-full z-20 text-2xl rounded-r-lg border-l-[var(--pale-yellow)]-50 border-l-2 border border-[var(--pale-yellow)]-300"
            v-model="searchValue"
            placeholder="Nhập tên món ăn..."
          />
          <button
            type="button"
            class="absolute top-0 right-0 px-5 h-full text-xl font-medium text-white bg-[var(--pale-yellow)] rounded-r-lg hover:bg-[var(--khaki)] focus:outline-none border-none outline-none"
            @click="search"
          >
            tìm kiếm
          </button>
        </div>
      </div>
    </form>
    <div v-if="getProduct.data.length">
      <div class="pb-[20px] pl-[100px] pr-[100px]">
        <div class="order bg-[#fff] rounded-2xl">
          <base-collections :products="getProduct.data" />
        </div>

        <pagination
          :data="getProduct"
          @paginate="changePage"
        />
      </div>
    </div>
    <div
      v-else
      class="mx-auto my-40 w-[800px] h-[400px] bg-[var(--pale-yellow)] z-[999] flex items-center justify-center rounded-lg"
    >
      <h1>Không Tìm Thấy Sản Phẩm Nào</h1>
    </div>
  </div>

  <div
    class="mt-[200px] mb-[220px] text-center"
    v-if="isLoading"
  >
    <base-load></base-load>
  </div>
</template>
<style lang="scss" scoped>
@import '@/assets/styles/page/order/order.scss';
</style>
