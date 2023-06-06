<script lang="ts" setup>
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'
import { useOrder } from '@/stores/user'

const order = useOrder()
const route = useRoute()

const data = ref([])
const recipients_name = ref('')
const phone = ref(0)
const address = ref('')
const delivery_fee = ref(0)
const totalPrice = ref(0)

const isLoading = ref(false)

onMounted(async () => {
  isLoading.value = true
  const id = route.params.id
  if (id) {
    await order.fetchOrderDetail(id)
    data.value = order.getOrderDetail
    recipients_name.value = data.value[0].recipients_name
    phone.value = data.value[0].phone
    address.value = data.value[0].address
    delivery_fee.value = parseInt(data.value[0].delivery_fee)
    for (let i in data.value) {
      totalPrice.value += parseInt(data.value[i].total)
    }
  }
  isLoading.value = false
})

const formatPrice = (value:Number) => {
  let currencySymbol = '₫'
  let formattedValue = new Intl.NumberFormat('vi-VN').format(value)
  return `${formattedValue}${currencySymbol}`
}
</script>

<template>
  <div
    class="mx-auto"
    v-if="!isLoading"
  >
    <div class="p-[20px]">
      <div class="flex items-center">
        <h4 class="mb-0 ml-4">chi tiết đơn hàng</h4>
      </div>
      <div class="mt-10 bg-white rounded-xl py-6 px-4 grid grid-cols-3 gap-2">
        <div
          class="border h-[200px rounded-xl py-6 px-4"
          v-for="item in data"
          :key="item.id"
        >
          <div class="flex">
            <div>
              <img
                :src="item.product_image"
                alt=""
                class="w-[140px] rounded-xl"
              />
            </div>
            <div class="ml-10">
              <h4 class="">{{ item.product_name }}</h4>
              <h4 class="flex">
                <nav class="text-[var(--pale-yellow)] mr-4">Số lượng:</nav>
                {{ item.quantity }}
              </h4>
              <h4 class="flex">
                <nav class="text-[var(--pale-yellow)] mr-4">Giá tiền:</nav>
                {{ formatPrice(item.price) }}
              </h4>
              <h4 class="flex">
                <nav class="text-[var(--pale-yellow)] mr-4">Tổng tiền:</nav>
                {{ formatPrice(item.total) }}
              </h4>
            </div>
          </div>
          <p class="mt-10 mb-0">
            {{ item.description }}
          </p>
        </div>
      </div>

      <div class="bg-white px-[20px] py-[10px] mt-10 rounded-xl">
        <div class="">
          <div class="flex">
            <h4 class="text-[var(--pale-yellow)]">Người đặt hàng:</h4>
            <h4 class="ml-4">{{ recipients_name }}</h4>
          </div>

          <div class="flex">
            <h4 class="text-[var(--pale-yellow)]">Số điện thoại:</h4>
            <h4 class="ml-4">{{ phone }}</h4>
          </div>

          <div class="flex">
            <h4 class="text-[var(--pale-yellow)]">Địa chỉ:</h4>
            <h4 class="ml-4 flex-1">{{ address }}</h4>
          </div>
        </div>

        <div class="flex">
          <h4 class="text-[var(--pale-yellow)]">phí vận chuyển:</h4>
          <h4 class="ml-4 flex-1">{{ formatPrice(delivery_fee) }}</h4>
        </div>

        <div class="flex">
          <h4 class="text-[var(--pale-yellow)]">tổng đơn hàng:</h4>
          <h4 class="ml-4 flex-1">{{ formatPrice(totalPrice) }}</h4>
        </div>

        <div class="mt-10 flex gap-4">
          <h4>tổng tiền:</h4>
          <h4 class="text-danger">{{ formatPrice(totalPrice + delivery_fee) }}</h4>
        </div>
      </div>
    </div>
  </div>

  <div
    class="flex items-center justify-center h-[400px]"
    v-if="isLoading"
  >
    <base-load></base-load>
  </div>
</template>
