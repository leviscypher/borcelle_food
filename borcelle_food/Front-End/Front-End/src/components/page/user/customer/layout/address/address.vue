<script lang="ts" setup>
import { ref, onMounted, watch } from 'vue'
import { useRoute } from 'vue-router'
import { useAddress } from '@/stores/user'

const address = useAddress()
const route = useRoute()
const address_id = ref(-1)

const addressData = ref([])
const confirm = ref(false)
const indexDel = ref(-1)
const user_id = ref(-1)

const showAlert = ref(false)
const message = ref('')
const alertType = ref('')

onMounted(async () => {
  const id = route.params.id
  user_id.value = id
  await address.fetchAddress(id)
  addressData.value = address.getAddress
})

const confirmDel = (id: Number, index: Number) => {
  address_id.value = id
  indexDel.value = index
  confirm.value = true
}

const doNotDelete = () => {
  confirm.value = false
}

const delAddress = async () => {
  await address.fetchDelete(address_id.value)
  addressData.value.splice(indexDel.value, 1)
  confirm.value = false
  showAlert.value = true
  message.value = 'xóa thành công'
  alertType.value = 'success'
}

watch(showAlert, (val) => {
  if (val) {
    setTimeout(() => {
      showAlert.value = false
    }, 5000)
  }
})

const activeAddress = async (id: number) => {
  await address.updateActive(id, { user_id: user_id.value })
  await address.fetchAddress(user_id.value)
  addressData.value = address.getAddress
  showAlert.value = true
  message.value = 'đổi thành công'
  alertType.value = 'success'
}
</script>

<template lang="">
  <div class="address my-10 mx-8">
    <h4>Số địa chỉ</h4>
    <router-link
      :to="`/customer/address/create/${user_id}`"
      class="no-underline"
    >
      <div
        class="address-create w-full h-[80px] bg-[#fff] flex items-center justify-center cursor-pointer mt-10 border-dashed border-[1px] border-[#d8d8d8]"
      >
        <font-awesome-icon
          icon="fa-solid fa-plus"
          class="text-[4rem] font-normal opacity-[0.6] mr-6"
        />
        <p class="text-[var(--pale-yellow)] text-[1.8rem]">Thêm địa chỉ mới</p>
      </div>
    </router-link>
  </div>

  <div
    class="bg-white rounded-lg my-4 mx-8 border-[1px] flex justify-between"
    v-for="(item, i) in addressData"
    :key="item.id"
  >
    <div class="py-[20px] px-[10px]">
      <div class="flex">
        <h4>{{ item.fullname }}</h4>
        <div v-if="item.isActive === 1">
          <p class="text-[#67c06c] ml-[18px]">
            <font-awesome-icon icon="fa-solid fa-check" />
            địa chỉ mặc định
          </p>
        </div>
      </div>
      <div>
        <div class="flex">
          <h4 class="text-[#9b92a2]">địa chỉ:</h4>
          <p class="ml-4 text-[#fe583c]">{{ item.address }}</p>
        </div>
        <div class="flex">
          <h4 class="text-[#9b92a2]">điện thoại:</h4>
          <p class="ml-4 text-[#fe583c]">{{ item.phone }}</p>
        </div>
      </div>
    </div>

    <div class="mt-[10px] mr-[20px]">
      <div class="flex">
        <div
          v-if="item.isActive === 0"
          class="mr-[10px]"
        >
          <button
            @click="activeAddress(item.id)"
            class="border-none text-2xl p-[5px] rounded-lg text-white bg-[#6ea8fe] hover:bg-[#febd00]"
          >
            Đặt làm mặc định
          </button>
        </div>
        <router-link
          :to="`/customer/address/edit/${item.id}`"
          class="text-3xl no-underline"
          >chỉnh sửa</router-link
        >
      </div>
      <div
        class="mt-10 flex items-center justify-end cursor-pointer"
        v-if="item.isActive === 0"
      >
        <font-awesome-icon
          icon="fa-solid fa-trash-can"
          class="text-2xl hover:text-[#fe583c]"
          @click="confirmDel(item.id, i)"
        />
      </div>
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
          <h4 class="mb-0 ml-4">Xóa địa chỉ</h4>
        </div>
        <p class="text-2xl mt-6 ml-10">bạn có chắc muốn xóa địa chỉ này?</p>
        <div class="flex justify-end mt-8">
          <button
            class="bg-[#0dcaf0] text-white border-none px-[18px] py-[10px] mr-[10px] rounded-xl text-xl hover:bg-green-300"
            @click="delAddress"
          >
            Xác nhận
          </button>
          <button
            class="bg-[#0b5ed7] text-white border-none px-[18px] py-[10px] mr-[10px] rounded-xl text-xl hover:bg-sky-400"
            @click="doNotDelete"
          >
            Hủy
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

<style lang="scss" scoped></style>
