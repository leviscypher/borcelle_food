<script lang="ts" setup>
import BaseQuantity from '@/components/common/BaseQuantity.vue'
import { ref, watch } from 'vue'
import { useProduct, useCart } from '@/stores/user'

let props = defineProps<{
  products: []
}>()

const cartItem = ref([])
const quantity = ref(1)
const count = ref(0)
const loadingIndex = ref(-1)

const cartNumber = useCart()
const product = useProduct()

const showAlert = ref(false)
const message = ref('')
const alertType = ref('')

const formatPrice = (value: number) => {
  let currencySymbol = '₫'
  let formattedValue = new Intl.NumberFormat('vi-VN').format(value)
  return `${formattedValue}${currencySymbol}`
}

const getQuantity = (qty: any) => {
  quantity.value = qty
}

const addCart = async (id: Number, index: Number) => {
  loadingIndex.value = index
  await product.fetchProduct(id)
  const item = product.getProduct
  const cartData = JSON.parse(localStorage.getItem('cart'))
  const data = {
    id: item.id,
    name: item.name,
    price: item.price,
    image: item.image_path[0],
    quantity: quantity.value,
    description: item.description,
    status_id: item.status_id,
    total: item.quantity,
  }
  if (cartData) {
    handleAddCart(cartData, data)
    totalCart(cartData)
    quantity.value = 1
  } else {
    cartItem.value.push(data)
    localStorage.setItem('cart', JSON.stringify(cartItem.value))
    totalCart(cartItem.value)
    quantity.value = 1
  }
  loadingIndex.value = -1
  showAlert.value = true
  message.value = 'đã thêm sản phẩm vào giỏ hàng'
  alertType.value = 'success'
}

const totalCart = (data: any) => {
  for (let i in data) {
    count.value += data[i].quantity
  }
  cartNumber.changeCartNumber(count.value)
}

const handleAddCart = (oldCart: any, newCart: any) => {
  const existingProductIndex = oldCart.findIndex((product) => product.id === newCart.id)
  if (existingProductIndex !== -1) {
    oldCart[existingProductIndex].quantity += quantity.value
  } else {
    oldCart.push(newCart)
  }
  localStorage.setItem('cart', JSON.stringify(oldCart))
}

watch(showAlert, (val) => {
  if (val) {
    setTimeout(() => {
      showAlert.value = false
    }, 5000)
  }
})
</script>
<template>
  <div
    class="collections defaul-width-wd mx-auto"
    v-bind="$attrs"
  >
    <div class="container mx-auto">
      <div class="p-3 mt-6 text-center mb-14">
        <div class="collections-item w-full grid grid-cols-4 gap-6">
          <div
            class="collections-list mb-0 rounded-lg"
            v-for="(product, index) in props.products"
            :key="product.id"
          >
            <div
              class="collections-list-img"
              :class="loadingIndex === index ? 'opacity-[0.5] pointer-events-none' : ''"
            >
              <router-link :to="`/productdetail/${product.id}`">
                <img
                  class="w-full h-[220px] cover"
                  :src="product.image_path[0]"
                  alt=""
                />
              </router-link>
              <div
                class="collection-list--add-cart"
                v-if="product.status_id == 1"
              >
                <a
                  href=""
                  @click.prevent="addCart(product.id, index)"
                  ><font-awesome-icon icon="fa-solid fa-cart-plus" /> Add To card</a
                >
              </div>
              <div
                class="collection-out-of-stock"
                v-else
              >
                hết hàng
              </div>

              <ul class="collections-list-start flex">
                <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                <li><font-awesome-icon icon="fa-solid fa-star" /></li>
                <li><font-awesome-icon icon="fa-solid fa-star" /></li>
              </ul>
            </div>

            <div
              class="collections-list-info"
              :class="loadingIndex === index ? 'opacity-[0.5] pointer-events-none' : ''"
            >
              <h3 class="collections-list-title mt-8 text-4xl font-bold uppercase text-[var(--pale-yellow)]">
                {{ product.name }}
              </h3>
              <div class="flex items-center justify-between mb-8 mt-8">
                <p class="collections-list-price ml-6 mb-0 text-4xl text-[#fe3c3c] font-bold">
                  {{ formatPrice(product.price) }}
                </p>
                <div class="mr-[10px]">
                  <base-quantity
                    :outOfStock="product.status_id"
                    :maxOrder="parseInt(product.quantity)"
                    @quantity="getQuantity"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div v-show="showAlert">
    <div
      class="alert text-[14px] px-[20px] w-auto fixed top-[100px] z-[9999] left-[50%] translate-x-[-50%] text-center"
      :class="alertType ? 'alert-' + alertType : ''"
      role="alert"
    >
      {{ message }}
    </div>
  </div>
</template>

<style lang="scss" scoped>
@import '@/assets/styles/page/home/collections.scss';
</style>
