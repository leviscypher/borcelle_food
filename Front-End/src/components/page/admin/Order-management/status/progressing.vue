<script lang="ts" setup>
import { ref, onMounted } from 'vue'
import { useOrder } from '@/stores/admin'

const order = useOrder()
const data = ref([])

const order_id = ref(-1)
const status = ref(-1)
const infoStatus = ref('')

const detail = ref([])
const recipients_name = ref('')
const phone = ref(0)
const address = ref('')
const delivery_fee = ref(0)
const totalPrice = ref(0)
const isLoading = ref(false)
const reason = ref('')


onMounted(async () => {
  isLoading.value = true
  await order.fetchOrder(3)
  data.value = order.getOrder
  isLoading.value = false
})

const orderDetail = async (id: number) => {
  totalPrice.value = 0
  isLoading.value = true
  await order.fetchOrderDetail(id)
  detail.value = order.getOrderDetail
  recipients_name.value = detail.value[0].recipients_name
  phone.value = detail.value[0].phone
  address.value = detail.value[0].address
  delivery_fee.value = detail.value[0].delivery_fee
  for (let i in detail.value) {
    totalPrice.value += parseInt(detail.value[i].total)
  }
  isLoading.value = false
}

const formatPrice = (value: number) => {
  let currencySymbol = '₫'
  let formattedValue = new Intl.NumberFormat('vi-VN').format(value)
  return `${formattedValue}${currencySymbol}`
}

const updateStatus = (oid: number, st: number, info: string) => {
  order_id.value = oid
  status.value = st
  infoStatus.value = info
}

const changeStatusOrder = async () => {
  isLoading.value = true
  const statusOrder = {
    status: infoStatus.value,
    reason: reason.value
  }
  await Promise.all([order.updateStatus(order_id.value, statusOrder), order.fetchOrder(3)])
  data.value = order.getOrder
  isLoading.value = false
}
</script>

<template>
  <h1 class="my-[30px]">Tất cả đơn hàng:</h1>
  <table id="sampleTable">
    <thead>
      <tr>
        <th
          class="text-center"
          width="10"
        >
          <input
            type="checkbox"
            id="all"
          />
        </th>
        <th class="text-center">ID</th>
        <th class="text-center">Người đặt hàng</th>
        <th class="text-center">Số điện thoại</th>
        <th class="text-center">Địa chỉ</th>
        <th class="text-center">Tình trạng</th>
        <th class="text-center">Chức năng</th>
      </tr>
    </thead>
    <tbody>
      <tr
        v-for="item in data.data"
        :key="item.id"
      >
        <td width="10">
          <input
            type="checkbox"
            name="check1"
            value="1"
          />
        </td>
        <td class="text-center">{{ item.id }}</td>
        <td class="text-center">{{ item.name }}</td>
        <td class="text-center">{{ item.phone }}</td>
        <td class="text-center">{{ item.address }}</td>
        <td class="text-center">
          <nav class="text-[#2859cb]">{{ item.status_name }}</nav>
        </td>
        <td class="flex gap-4 items-center justify-center">
          <button
            class="border-none outline-none focus:outline-none py-[4px] px-[8px] rounded-lg bg-[var(--pale-yellow)] text-white hover:bg-[var(--khaki)]"
            data-bs-toggle="modal"
            data-bs-target="#exampleModal"
            @click="updateStatus(item.id, item.status_id, 'shipping')"
          >
            <font-awesome-icon :icon="['fas', 'square-check']" />
          </button>

          <button
            class="border-none outline-none focus:outline-none py-[4px] px-[8px] rounded-lg bg-info text-white"
            data-bs-toggle="modal"
            data-bs-target="#exampleModal-detail"
            @click="orderDetail(item.id)"
          >
            <font-awesome-icon :icon="['fas', 'circle-info']" />
          </button>

          <button
            class="border-none outline-none focus:outline-none py-[4px] px-[8px] rounded-lg text-[#f5a7a0]"
            data-bs-toggle="modal"
            data-bs-target="#exampleModal"
            @click="updateStatus(item.id, item.status_id, 'cancelled')"
          >
            <font-awesome-icon :icon="['fas', 'trash']" />
          </button>
        </td>
      </tr>
    </tbody>
  </table>

  <!-- model -->
  <div
    class="modal modals"
    id="exampleModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content w-[380px] h-auto mx-auto">
        <div class="bg-white mx-auto rounded-lg py-[20px]">
          <div class="flex items-center">
            <font-awesome-icon
              icon="fa-sharp fa-light fa-triangle-exclamation"
              class="text-3xl"
              :class="infoStatus === 'cancelled' ? 'text-danger' : 'text-info'"
            />
            <h4 class="mb-0 ml-4">{{ infoStatus === 'cancelled' ? 'xác nhận hủy đơn hàng' : 'xác nhận đơn hàng' }}</h4>
          </div>
          <div
            v-if="infoStatus === 'cancelled'"
            class="form-group my-[18px]"
          >
            <input
              type="text"
              placeholder="lý do hủy"
              class="form-control"
              v-model="reason"
            />
          </div>
          <p
            class="text-2xl mt-6 ml-10"
            v-if="status === 3 && infoStatus === 'shipping'"
          >
            xác nhận đơn hàng và vận chuyển?
          </p>
          <p
            class="text-2xl mt-6 ml-10"
            v-if="infoStatus === 'cancelled'"
          >
            xác nhận hủy đơn hàng này
          </p>
          <div class="flex justify-end mt-8">
            <button
              class="btn-info border-none px-[18px] py-[10px] mr-[10px] rounded-xl text-xl hover focus:outline-none"
              data-bs-dismiss="modal"
              @click="changeStatusOrder"
            >
              Xác nhận
            </button>

            <button
              class="btn-primary border-none px-[18px] py-[10px] mr-[10px] rounded-xl text-xl hover focus:outline-none"
              data-bs-dismiss="modal"
            >
              Hủy
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- model detail -->
  <div
    class="modal modals"
    id="exampleModal-detail"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content w-[680px]">
        <div
          class="bg-white rounded-lg py-[20px] h-[480px] overflow-y-scroll"
          v-if="!isLoading"
        >
          <div class="flex items-center">
            <h1 class="mb-0 ml-14">chi tiết đơn hàng</h1>
          </div>
          <div class="w-full my-[40px] flex items-center flex-col">
            <div
              class="w-[90%] h-[140px] border rounded-lg p-4 flex gap-[20px] mb-[10px]"
              v-for="item in detail"
              :key="item.id"
            >
              <div class="flex gap-4 items-center w-[50%]">
                <img
                  :src="item.product_image"
                  class="w-[100px] h-[100px] cover rounded-md"
                  alt=""
                />
                <div>
                  <h2 class="mb-[10px] tracking-[1px]">{{ item.product_name }}</h2>
                  <h4 class="text-[var(--pale-yellow)] font-bold flex gap-4">
                    Số lương:
                    <p class="text-[#fe8184]">{{ item.quantity }}</p>
                  </h4>
                  <h4 class="text-[var(--pale-yellow)] font-bold flex gap-4">
                    Gía tiền:
                    <p class="text-[#fe8184]">{{ formatPrice(item.price) }}</p>
                  </h4>
                  <h4 class="text-[var(--pale-yellow)] font-bold flex gap-4">
                    Tổng tiền:
                    <p class="text-[#fe8184]">{{ formatPrice(item.total) }}</p>
                  </h4>
                </div>
              </div>
              <div class="w-[50%] leading-8 text-ellipsis overflow-y-scroll">
                <p class="text-[14px] text-[#1f2667]">
                  {{ item.description }}
                </p>
              </div>
            </div>
          </div>

          <div class="w-[90%] ml-[38px] border rounded-lg p-4">
            <div>
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

        <div
          class="h-[480px] flex items-center justify-center"
          v-if="isLoading"
        >
          <base-load></base-load>
        </div>

        <div class="flex justify-end mr-[40px] mb-[20px]">
          <button
            class="btn-primary border-none px-[18px] py-[10px] mr-[10px] rounded-xl text-xl hover focus:outline-none"
            data-bs-dismiss="modal"
          >
            Hủy
          </button>
        </div>
      </div>
    </div>
  </div>

  <div
    v-if="isLoading"
    class="flex justify-center items-center my-[40px]"
  >
    <base-load></base-load>
  </div>
</template>

<style scoped>
@import '@/assets/styles/admin/admin.scss';

th {
  font-size: 14px !important;
  background-color: #eeeeee;
  color: #000;
  vertical-align: middle;
}

td {
  vertical-align: middle !important;
}
</style>
