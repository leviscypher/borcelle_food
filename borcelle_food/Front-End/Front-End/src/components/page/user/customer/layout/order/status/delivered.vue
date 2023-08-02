<script lang="ts" setup>
import { ref, onMounted } from 'vue'
import { useOrder } from '@/stores/user'
import { useRoute } from 'vue-router'

const route = useRoute()
const order = useOrder()
const data = ref([])
const statusClass = ref(['', 'warning', 'info', 'success', 'primary', 'danger'])

const getStatusClass = (index: number) => {
  return 'text-' + statusClass.value[index]
}

onMounted(async () => {
  const id = route.params.id
  await order.fetchAll(id, 5)
  data.value = order.getAllOrder
})
</script>

<template>
  <div class="mt-10 flex">
    <h4 class="bg-white py-2 px-4 w-auto flex rounded-lg">
      số lượng:
      <p class="mb-0 ml-4 text-[var(--pale-yellow)] text-2xl font-medium">{{ data.length }}</p>
    </h4>
  </div>
  <div
    class="mt-10 bg-white p-4 flex justify-between"
    v-if="data.length > 0"
    v-for="item in data"
    :key="item.id"
  >
    <div class="flex justify-between w-full">
      <div class="flex gap-4">
        <nav>
          Đơn hàng ngày :
          <p class="mt-2 text-danger">{{ item.order_date }}</p>
        </nav>
        <nav>
          Trạng thái:
          <p
            class="mt-2"
            :class="getStatusClass(item.status_id)"
          >
            {{ item.status_name }}
          </p>
        </nav>
        <nav>
          Tên người đặt hàng:
          <p class="mt-2">{{ item.name }}</p>
        </nav>
        <nav class="w-[360px]">
          Địa chỉ nhận hàng:
          <p class="mt-2 text-[12px]">{{ item.address }}</p>
        </nav>
      </div>

      <div>
        <router-link :to="`/customer/order/detail/${item.id}`">
          <button class="border-none outline-none p-[8px] text-[10px] rounded-xl bg-info text-white mr-4">
            chi tiết đơn hàng
          </button>
        </router-link>

        <button class="border-none outline-none p-[8px] text-[10px] rounded-xl bg-danger text-white" v-if="item.status_id === 3">hủy đơn</button>
      </div>
    </div>
  </div>

  <div
    class="order-content w-full bg-[#fff] my-10"
    v-else
  >
    <div class="text-center py-24">
      <img
        class="w-[180px]"
        src="@/assets/image/empty-order.png"
        alt=""
      />
      <nav>chưa có đơn hàng</nav>
    </div>
  </div>
</template>
<style lang="scss"></style>
