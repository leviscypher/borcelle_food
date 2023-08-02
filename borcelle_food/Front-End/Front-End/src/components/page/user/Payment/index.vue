<script lang="ts" setup>
import { ref, onMounted, watch } from 'vue'
import { useUserInfo, useAddress, useOrder } from '@/stores/user'

const title = ref('Thanh Toán')


const userInfo = useUserInfo()
const address = useAddress()
const order = useOrder()

const user = ref({})
const user_id = ref(0)
const addressData = ref({})
const cartData = ref([])

const totalMonney = ref(0)
const total = ref(0)
const delivery_fee = ref(8000)

const showAlert = ref(false)
const message = ref('')
const alertType = ref('')


onMounted(async () => {
  cartData.value = JSON.parse(localStorage.getItem('cart'))
  for (let i in cartData.value) {
    totalMonney.value += cartData.value[i].quantity * cartData.value[i].price
    total.value += cartData.value[i].quantity
  }
  await userInfo.fetchUser()
  user_id.value = userInfo.getUser.id
  await address.fetchAddressActive(user_id.value)
  addressData.value = address.getAddressActive
})

const formatPrice = (value: number) => {
  let currencySymbol = '₫'
  let formattedValue = new Intl.NumberFormat('vi-VN').format(value)
  return `${formattedValue}${currencySymbol}`
}

const orderProduct = async () => {
  const order_details = []
  for(let i in cartData.value) {
    const data = {
      product_id: cartData.value[i].id,
      quantity: cartData.value[i].quantity
    }

    order_details.push(data)
  }
  const dataOrder = {
    address_id:  addressData.value.id,
    delivery_fee: delivery_fee.value,
    order_details
  }

  await order.fetchCreate(user_id.value, dataOrder)
  if(order.getStatus === 201) {
    localStorage.removeItem('cart')
    showAlert.value = true
    message.value = 'đã mua hàng thành công'
    alertType.value = 'success'
    location.href = '/'
  } else {
    showAlert.value = true
    message.value = 'đặt hàng không thành công'
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
</script>
<template>
  <base-banner :title="title" />
  <div class="w-full bg-[#f5f5fa]">
    <div class="w-[1280px] mx-auto py-[80px] grid grid-cols-3 gap-8">
      <div class="col-span-2">
        <div class="item bg-white p-[20px]">
          <h3>Chọn hình thức giao hàng</h3>

          <div class="radio-inputs my-[20px]">
            <label>
              <input
                class="radio-input"
                type="radio"
                name="engine"
                :value="8000"
                v-model="delivery_fee"
                checked
              />
              <span class="radio-tile">
                <span class="radio-label"> Giao tiết kiệm </span>
              </span>
            </label>
            <label>
              <input
                class="radio-input"
                type="radio"
                name="engine"
                :value="12000"
                v-model="delivery_fee"
              />
              <span class="radio-tile">
                <span class="radio-label">Giao nhanh</span>
              </span>
            </label>
            <label>
              <input
                class="radio-input"
                type="radio"
                name="engine"
                :value="15000"
                v-model="delivery_fee"
              />
              <span class="radio-tile">
                <span class="radio-label">Giao siêu tốc</span>
              </span>
            </label>
          </div>

          <div>
            <div class="bg-white w-full rouded-lg p-[20px] mb-[16px] flex">
              <h4 class="flex items-center flex-1">Tất cả</h4>
              <div class="w-[300px] flex justify-between">
                <h4>Giá tiền</h4>
                <h4 class="">Số lượng</h4>
                <h4 class="mr-5">Thành tiền</h4>
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
                  <div class="flex w-[300px] justify-between">
                    <div>
                      <p class="mb-0 text-3xl text-[#fe583c] font-bold">{{ formatPrice(item.price) }}</p>
                    </div>
                    <div>
                      <p class="mb-0 text-4xl text-[#fe583c] font-bold">{{ item.quantity }}x</p>
                    </div>
                    <div>
                      <p class="mb-0 text-3xl text-[#fe583c] font-bold">
                        {{ formatPrice(item.price * item.quantity) }}
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="bg-white p-[20px] mt-[10px]">
          <h3>chọn hình thức thanh toán</h3>
          <div class="container mt-10">
            <form>
              <label>
                <input
                  type="radio"
                  name="radio"
                  checked
                />
                <span class="text-[16px]"> Thanh toán khi nhận hàng </span>
              </label>
              <label>
                <input
                  type="radio"
                  name="radio"
                  disabled
                />
                <span class="text-[16px]"
                  >Thanh toán bằng thẻ quốc tế Visa, Master, JCB
                  <p class="text-[red] mb-0 ml-[5px]">(chưa hỗ trợ)</p></span
                >
              </label>
              <label>
                <input
                  type="radio"
                  name="radio"
                  disabled
                />
                <span class="text-[16px]"
                  >Thanh toán bằng ví MoMo
                  <p class="text-[red] mb-0 ml-[5px]">(chưa hỗ trợ)</p></span
                >
              </label>
            </form>
          </div>
        </div>
      </div>

      <div class="col-span-1">
        <div>
          <div
            class="bg-white rounded-xl mb-10"
            v-if="addressData.id"
          >
            <div>
              <div class="mx-10 py-[10px] flex justify-between items-center">
                <h4 class="mb-0">Giao tới</h4>
                <router-link
                  :to="`/customer/address/${user_id}`"
                  class="text-2xl no-underline"
                  >Thay đổi</router-link
                >
              </div>
              <div class="mx-10 py-[10px] flex justify-between items-center">
                <nav class="">
                  <div class="flex mb-8">
                    <h4 class="mr-4 text-[#fe583c]">người nhận hàng:</h4>
                    <h4 class="mr-4">{{ addressData.fullname }}</h4>
                  </div>
                  <div class="flex">
                    <h4 class="text-[#fe583c] mr-4">số điện thoại:</h4>
                    <h4>{{ addressData.phone }}</h4>
                  </div>
                </nav>
              </div>
              <div class="mx-10 py-[10px] flex justify-between items-center">
                <h4 class="mr-4 text-[#fe583c] w-[80px]">Địa chỉ:</h4>
                <p class="text-2xl">{{ addressData.address }}.</p>
              </div>
            </div>
          </div>

          <div
            class="bg-white rounded-xl mb-10 py-[10px] text-center"
            v-else
          >
            <h4 class="">Không có địa chỉ nhận hàng</h4>
            <router-link
              :to="`/customer/address/${user_id}`"
              class="no-underline text-4xl py-[10px] block"
              >Thêm địa chỉ</router-link
            >
          </div>
        </div>

        <div class="bg-white rounded-xl">
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
              <p class="pb-0 text-2xl">Phí giao hàng</p>
              <p class="pb-0 text-2xl">{{ formatPrice(delivery_fee) }}</p>
            </nav>

            <nav class="flex justify-between mx-10 py-[10px]">
              <h1 class="text-[#fe583c]">Tổng</h1>
              <p class="text-4xl text-[#fe583c]">{{ formatPrice(totalMonney + delivery_fee) }}</p>
            </nav>
          </div>
        </div>

        <div class="mt-10">
          <button
            class="w-full py-[10px] border-none text-2xl text-white font-medium bg-[var(--pale-yellow)] rounded hover:bg-[#ff424e] duration-200"
            :class="!addressData.id ? 'pointer-events-none bg-gray-300' :''"
            @click="orderProduct"
          >
            Đặt hàng ({{ total }})
          </button>
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
<style lang="scss">
@import '@/assets/styles/page/payment/payment.scss';
</style>
