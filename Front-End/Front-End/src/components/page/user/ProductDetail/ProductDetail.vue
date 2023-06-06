<script lang="ts" setup>
import { ref, onMounted, watch } from 'vue'
import { useRoute } from 'vue-router'
import { useProduct, useCart } from '@/stores/user'
import BaseQuantity from '@/components/common/BaseQuantity.vue'

const route = useRoute()
const product = useProduct()
const image = ref([])
const defaultImage = ref('')
const productData = ref([])
const quantity = ref(1)
const count = ref(0)
const cartItem = ref([])
const showAlert = ref(false)
const message = ref('')
const alertType = ref('')
const isLoading = ref(true)
const loadImg = ref(false)

const cartNumber = useCart()

onMounted(async () => {
  isLoading.value = false
  const id = route.params.id
  await Promise.all([product.fetchProduct(id)])
  productData.value = product.getProduct
  image.value = productData.value.image_path
  defaultImage.value = productData.value.image_path[0]
  isLoading.value = true
})

const formatPrice = (value: number) => {
  let currencySymbol = '₫'
  let formattedValue = new Intl.NumberFormat('vi-VN').format(value)
  return `${formattedValue}${currencySymbol}`
}

const getQuantity = (qty: any) => {
  quantity.value = qty
}

const addCart = async (id: Number) => {
  isLoading.value = false
  await product.fetchProduct(id)
  const data = {
    id: productData.value.id,
    name: productData.value.name,
    price: productData.value.price,
    image: productData.value.image_path[0],
    quantity: quantity.value,
    description: productData.value.description,
    status_id: productData.status_id,
    total: productData.quantity
  }
  const cartData = JSON.parse(localStorage.getItem('cart'))
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
  isLoading.value = true
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

const changeImage = (index:Number) => {
  loadImg.value = true
  defaultImage.value = image.value[index]
  loadImg.value = false
}

</script>
<template>
  <div v-if="isLoading">
    <div class="pt-[100px] pb-[70px] pl-[100px] pr-[100px] bg-[#f5f5fa]" :class="loadImg ? 'opacity-[0.5] pointer-events-none' : ''">
      <div class="product-detail mx-auto p-20 flex gap-[10px]">
        <div>
          <div>
            <img
              :src="defaultImage"
              alt=""
              class="w-[400px] h-[240px]"
            />
          </div>
          <div class="pt-[10px] grid grid-cols-3 gap-4">
            <img
              v-for="(img, i) in image"
              :key="i"
              :src="img"
              alt=""
              class="w-[120px] h-[100px] cover cursor-pointer"
              @click="changeImage(i)"
            />
          </div>
        </div>
        <div>
          <h4 class="text-[30px] text-[#424c4c] font-bold uppercase">{{ productData.name }}</h4>
          <div class="flex items-center justify-between w-[300px] mt-10">
            <h4 class="text-[30px] text-[#fe3c3c] font-bold">{{ formatPrice(productData.price) }}</h4>
            <base-quantity
              :maxOrder="parseInt(productData.quantity)"
              :outOfStock="productData.status_id"
              @quantity="getQuantity"
            />
          </div>
          <div>
            <ul class="collections-list-start flex list-none pl-0 mt-[4px]">
              <li class="text-[var(--pale-yellow)]"><font-awesome-icon icon="fa-solid fa-star" /></li>
              <li class="text-[var(--pale-yellow)]"><font-awesome-icon icon="fa-solid fa-star" /></li>
              <li class="text-[var(--pale-yellow)]"><font-awesome-icon icon="fa-solid fa-star" /></li>
              <li class="text-[var(--pale-yellow)]"><font-awesome-icon icon="fa-solid fa-star" /></li>
              <li class="text-[var(--pale-yellow)]"><font-awesome-icon icon="fa-solid fa-star" /></li>
            </ul>
          </div>
          <div class="mt-10 border p-[10px] w-[300px] rounded-md">
            <p class="">
              {{ productData.description }}
            </p>
          </div>
          <div class="flex justify-end mt-10">
            <button
              class="bf-btn bf-btn-primary mt-[20px]"
              @click="addCart(productData.id)"
            >
              Thêm Vào Giỏ Hàng
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div
    class="mt-[200px] mb-[220px] text-center"
    v-if="!isLoading"
  >
    <base-load></base-load>
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
@import '@/assets/styles/page/ProductDetail/ProductDetail.scss';
</style>
