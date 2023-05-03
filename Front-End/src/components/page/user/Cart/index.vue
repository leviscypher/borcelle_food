<script lang="ts" setup>
import { ref, onMounted, watch } from 'vue'
import { useRouter } from 'vue-router'
import { useUserInfo, useCart } from '@/stores/user'
import BaseQuantity from '@/components/common/BaseQuantity.vue'

const router = useRouter()
const user = useUserInfo()
const cartNumber = useCart()

const title = ref('Giỏ hàng')
const cartData = ref([])
const totalMonney = ref(0)
const total = ref(0)
const quantity = ref(0)
const confirm = ref(false)
const confirmAll = ref(false)
const indexDel = ref(-1)

const showAlert = ref(false)
const message = ref('')
const alertType = ref('')

onMounted(() => {
  cartData.value = JSON.parse(localStorage.getItem('cart'))
  for (let i in cartData.value) {
    totalMonney.value += cartData.value[i].quantity * cartData.value[i].price
    total.value += cartData.value[i].quantity
  }
})

const formatPrice = (value: number) => {
  let currencySymbol = '₫'
  let formattedValue = new Intl.NumberFormat('vi-VN').format(value)
  return `${formattedValue}${currencySymbol}`
}

const payment = async () => {
  let checkLogin = localStorage.getItem('token')
  if (checkLogin) {
    await user.userSuccess()
    const status = user.getStatus
    if (status == 401) {
      showAlert.value = true
      message.value = 'đã có lỗi xảy ra vui lòng thử lại sau'
      alertType.value = 'danger'
    } else {
      router.push('/payment')
    }
  } else {
    showAlert.value = true
    message.value = 'vui lòng đăng nhập để truy cập'
    alertType.value = 'danger'
  }
}

watch(showAlert, (val) => {
  if (val) {
    setTimeout(() => {
      showAlert.value = false
    }, 5000)
  }
})

const confirmDelCart = (i: Number) => {
  indexDel.value = i
  confirm.value = true
}

const confirmDelAll = () => {
  confirmAll.value = true
}

const delCart = () => {
  const items = JSON.parse(localStorage.getItem('cart'))
  cartData.value.splice(indexDel.value, 1)
  items.splice(indexDel.value, 1)
  localStorage.setItem('cart', JSON.stringify(items))
  if (items.length == 0) {
    localStorage.removeItem('cart')
  }
  totalCart(cartData.value)
  confirm.value = false
  showAlert.value = true
  message.value = 'xóa thành công'
  alertType.value = 'success'
}

const delAll = () => {
  cartData.value = []
  localStorage.removeItem('cart')
  totalCart(cartData.value)
  showAlert.value = true
  message.value = 'xóa thành công'
  alertType.value = 'success'
  confirmAll.value = false
}

const doNotDelete = () => {
  confirm.value = false
  confirmAll.value = false
}

const totalCart = (data: any) => {
  let c = 0
  for (let i in data) {
    c += data[i].quantity
  }
  cartNumber.changeCartNumber(c)
}

const getQuantity = (qty: any) => {
  quantity.value = qty
}

const updateCart = (i: Number) => {
  const oldCart = JSON.parse(localStorage.getItem('cart'))
  const existingProductIndex = oldCart.findIndex((product) => product.id === i)
  oldCart[existingProductIndex].quantity = quantity.value > 10 ? 10 : quantity.value
  localStorage.setItem('cart', JSON.stringify(oldCart))
  cartData.value = oldCart
  totalCart(oldCart)
}

watch(cartData, (val) => {
  let m = 0
  if(val) {
    val.forEach(item => {
      m += item.price * item.quantity
    })
    totalMonney.value = m
  }
})

</script>
<template>
  <base-banner :title="title" />
  <div>
    <div
      class="w-full bg-[#f5f5fa]"
      v-if="cartData"
    >
      <div class="w-[1280px] mx-auto py-[80px] grid grid-cols-3 gap-8">
        <div class="col-span-2">
          <div class="bg-white w-full rouded-lg p-[20px] mb-[16px] flex">
            <h4 class="flex items-center flex-1">
              Tất cả
            </h4>
            <div class="w-[400px] flex justify-between">
              <h4>Giá tiền</h4>
              <h4 class="">Số lượng</h4>
              <h4 class="">Thành tiền</h4>
              <h4 class="mr-5">Xóa</h4>
            </div>
          </div>
          <div class="item bg-white p-[20px]">
            <div
              class="w-full border rounded-lg mb-[8px]"
              v-for="(item, i) in cartData"
              :key="item.id"
            >
              <div class="p-[10px] flex">
                <div class="flex flex-1">
                  <router-link :to="`/productdetail/${item.id}`">
                    <img
                      :src="item.image"
                      alt=""
                      class="w-[100px] h-[80px] cover rounded-xl"
                    />
                  </router-link>
                  <div class="ml-[8px] text-ellipsis overflow-hidden mr-[10px]">
                    <h4>{{ item.name }}</h4>
                    <p class="mb-0">{{ item.description }}</p>
                  </div>
                </div>
                <div class="flex items-center w-[400px] justify-between">
                  <div>
                    <p class="mb-0 text-xl text-[#fe583c] font-bold">{{ formatPrice(item.price) }}</p>
                  </div>
                  <div>
                    <base-quantity
                      :outOfStock="item.status_id"
                      :maxOrder="parseInt(item.total)"
                      :value="item.quantity"
                      @quantity="getQuantity"
                      @click="updateCart(item.id)"
                    />
                  </div>
                  <div>
                    <p class="mb-0 text-xl text-[#fe583c] font-bold">{{ formatPrice(item.price * item.quantity) }}</p>
                  </div>
                  <div>
                    <button
                      class="border-none p-[10px] bg-[#fe583c] text-white rounded-lg"
                      @click="confirmDelCart(i)"
                    >
                      <font-awesome-icon icon="fa-solid fa-trash-can" />
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="mt-[20px] flex justify-end">
              <button
                class="btn btn-danger p-[10px] my-[20px] mx-[10px] text-xl"
                @click="confirmDelAll"
              >
                Xóa tất cả
              </button>
            </div>
          </div>
        </div>
        <div class="col-span-1">
          <div class="bg-white mt-[80px] rounded-xl">
            <div class="border-b-[1px]">
              <nav class="flex justify-between mx-10 py-[10px]">
                <p class="pb-0 text-2xl">Tạm tính</p>
                <p class="pb-0 text-2xl">{{ formatPrice(totalMonney) }}</p>
              </nav>

              <nav class="flex justify-between mx-10 py-[10px]">
                <p class="pb-0 text-2xl">Giảm giả</p>
                <p class="pb-0 text-2xl">{{ formatPrice(0) }}</p>
              </nav>

              <nav class="flex justify-between mx-10 py-[10px]">
                <h1 class="text-[#fe583c]">Tổng</h1>
                <p class="text-4xl text-[#fe583c]">{{ formatPrice(totalMonney) }}</p>
              </nav>
            </div>
          </div>

          <div class="mt-10">
            <button class="w-full py-[10px] border-none text-2xl text-white font-medium bg-[var(--pale-yellow)] rounded hover:bg-[#ff424e] duration-200" @click="payment">Mua hàng</button>
          </div>
        </div>
      </div>
    </div>

    <div
      v-else
      class="w-[1280px] mx-auto py-[200px] bg-[var(--pale-yellow)] text-center my-[40px] text-white rounded-xl"
    >
      <h1>không có sản phẩm nào</h1>
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

  <div
    v-if="confirm"
    class="fixed w-full h-[100vh] top-0 left-0 bottom-0 right-0 bg-gray-500 bg-opacity-50 z-[99] flex items-center"
  >
    <div class="z-[999] w-[400px] bg-white mx-auto rounded-lg">
      <div class="p-[20px]">
        <div class="flex items-center">
          <font-awesome-icon
            icon="fa-sharp fa-light fa-triangle-exclamation"
            class="text-3xl text-danger"
          />
          <h4 class="mb-0 ml-4">Xóa sản phẩm</h4>
        </div>
        <p class="text-2xl mt-6 ml-10">bạn có chắc muốn xóa sản phẩm này?</p>
        <div class="flex justify-end mt-8">
          <button
            class="btn-info border-none px-[18px] py-[10px] mr-[10px] rounded-xl text-xl hover"
            @click="delCart"
          >
            Xác nhận
          </button>
          <button
            class="btn-primary border-none px-[18px] py-[10px] mr-[10px] rounded-xl text-xl hover"
            @click="doNotDelete"
          >
            Hủy
          </button>
        </div>
      </div>
    </div>
  </div>

  <div
    v-if="confirmAll"
    class="fixed w-full h-[100vh] top-0 left-0 bottom-0 right-0 bg-gray-500 bg-opacity-50 z-[99] flex items-center"
  >
    <div class="z-[999] w-[400px] bg-white mx-auto rounded-lg">
      <div class="p-[20px]">
        <div class="flex items-center">
          <font-awesome-icon
            icon="fa-sharp fa-light fa-triangle-exclamation"
            class="text-3xl text-danger"
          />
          <h4 class="mb-0 ml-4">Xóa sản phẩm</h4>
        </div>
        <p class="text-2xl mt-6 ml-10">bạn có chắc muốn xóa tất cả sản phẩm?</p>
        <div class="flex justify-end mt-8">
          <button
            class="btn-info border-none px-[18px] py-[10px] mr-[10px] rounded-xl text-xl hover"
            @click="delAll"
          >
            Xác nhận
          </button>
          <button
            class="btn-primary border-none px-[18px] py-[10px] mr-[10px] rounded-xl text-xl hover"
            @click="doNotDelete"
          >
            Hủy
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
<style lang="scss" scoped>
@import '@/assets/styles/page/cart/cart.scss';

.alert {
  animation: slide-in-down 0.5s ease;
}

@keyframes slide-in-down {
  0% {
    transform: translateY(-100%);
  }
  100% {
    transform: translateY(0%);
  }
}
</style>
