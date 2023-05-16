<script lang="ts" setup>
import { ref, onMounted, reactive, watch } from 'vue'
import { useAddress } from '@/stores/user'
import { useRoute } from 'vue-router'

const addressData = reactive({
  fullname: '',
  company: '',
  phone: '',
  delivery_address: '',
  address_type: 0,
  isActive: 0,
  city_id: 2,
  district_id: 0,
  ward_id: 0,
})

const errorAddress = reactive({
  fullname: '',
  phone: '',
})

const showAlert = ref(false)
const message = ref('')
const alertType = ref('')

const address = useAddress()
const route = useRoute()
const city = ref([])
const district = ref([])
const district_id = ref(0)
const ward = ref([])
const user_id = ref(0)

onMounted(async () => {
  const id = route.params.id
  user_id.value = id
  await Promise.all([address.fetchAddressCreate(id), address.fetchCity(), address.fetchDistrict(2)])
  addressData.fullname = address.getAddressCreate.name
  addressData.phone = address.getAddressCreate.phone
  city.value = address.getCity
  district.value = address.getDistrict
  district_id.value = district.value[0].id
  await address.fetchWard(district_id.value)
  ward.value = address.getWard
})

const changeDistrict = async (event: any) => {
  const id = event.target.value
  await address.fetchWard(id)
  ward.value = address.getWard
}

const checkCity = async (event: any) => {
  if (event.target.value != 2) {
    event.target.value = 2
    showAlert.value = true
    message.value = 'Hiện tại chúng tôi chỉ hỗ trợ khu vực hà nội'
    alertType.value = 'danger'
  }
}

const validate = () => {
  let valid = true
  if (!addressData.fullname) {
    errorAddress.fullname = 'Họ và tên không được để trông'
    valid = false
  }

  if (!addressData.phone) {
    errorAddress.phone = 'Số điện thoại không được để trống'
    valid = false
  } else if (!phoneVn(addressData.phone)) {
    errorAddress.phone = 'Số điện thoại không hợp lệ'
    valid = false
  }

  return valid
}

const phoneVn = (phone: number) => {
  const vietnamesePhoneNumberRegex = /^(0|\+84)\d{9,10}$/
  return vietnamesePhoneNumberRegex.test(phone.toString())
}

watch(showAlert, (val) => {
  if (val) {
    setTimeout(() => {
      showAlert.value = false
    }, 5000)
  }
})

watch(errorAddress, (val) => {
  if (val) {
    setTimeout(() => {
      ;(errorAddress.fullname = ''), (errorAddress.phone = '')
    }, 3000)
  }
})

const addData = async () => {
  if (validate()) {
    await address.fetchCreate(user_id.value, addressData)
    showAlert.value = true
    message.value = 'Thêm thành công'
    alertType.value = 'success'
  }
}
</script>

<template lang="">
  <div class="my-10 mx-8">
    <h4 class="mb-10">Tạo sổ địa chỉ</h4>
    <div class="w-full bg-[#fff]">
      <div class="w-[600px] py-10 pl-8">
        <form @submit.prevent>
          <div class="form-group flex item-center mb-8">
            <label
              for=""
              class="w-[var(--label-width)] font-light text-[1.4rem] mb-0 flex items-center"
              >Họ và Tên:</label
            >
            <div class="flex-1">
              <input
                type="text"
                class="form-control"
                placeholder="nhập tên"
                maxlength="255"
                v-model="addressData.fullname"
                @input="errorAddress.fullname"
              />
              <transition name="slide-fade">
                <small
                  v-if="errorAddress.fullname"
                  class="inline-block text-[red] text-[13px]"
                  >{{ errorAddress.fullname }}</small
                >
              </transition>
            </div>
          </div>

          <div class="form-group flex item-center mb-8">
            <label
              for=""
              class="w-[var(--label-width)] font-light text-[1.4rem] mb-0 flex items-center"
              >Tên công ty:</label
            >
            <div class="flex-1">
              <input
                type="text"
                class="form-control"
                placeholder="nhập tên công ty"
                maxlength="255"
              />
            </div>
          </div>

          <div class="form-group flex item-center mb-8">
            <label
              for=""
              class="w-[var(--label-width)] font-light text-[1.4rem] mb-0 flex items-center"
              >Số điện thoai:</label
            >
            <div class="flex-1">
              <input
                type="text"
                class="form-control"
                placeholder="nhập số điện thoại"
                maxlength="10"
                v-model="addressData.phone"
                @input="errorAddress.phone"
              />
              <transition name="slide-fade">
                <small
                  v-if="errorAddress.phone"
                  class="inline-block text-[red] text-[13px]"
                  >{{ errorAddress.phone }}</small
                >
              </transition>
            </div>
          </div>

          <div class="form-group flex item-center mb-8">
            <label
              for=""
              class="w-[var(--label-width)] font-light text-[1.4rem] mb-0 flex items-center"
              >Tỉnh/Thành phố:</label
            >
            <div class="flex-1">
              <select
                name=""
                class="form-control"
                @change="checkCity"
              >
                <option
                  :value="item.id"
                  v-for="item in city"
                  :key="item.id"
                  :selected="item.id == 2"
                >
                  {{ item.name }}
                </option>
              </select>
            </div>
          </div>

          <div class="form-group flex item-center mb-8">
            <label
              for=""
              class="w-[var(--label-width)] font-light text-[1.4rem] mb-0 flex items-center"
              >Quận huyện:</label
            >
            <div class="flex-1">
              <select
                name=""
                class="form-control"
                @change="changeDistrict"
                v-model="addressData.district_id"
              >
                <option
                  :value="item.id"
                  v-for="item in district"
                  :key="item.id"
                >
                  {{ item.name }}
                </option>
              </select>
            </div>
          </div>

          <div class="form-group flex item-center mb-8">
            <label
              for=""
              class="w-[var(--label-width)] font-light text-[1.4rem] mb-0 flex items-center"
              >Phường xã:</label
            >
            <div class="flex-1">
              <select
                name=""
                class="form-control"
                v-model="addressData.ward_id"
              >
                <option
                  :value="item.id"
                  v-for="item in ward"
                  :key="item.id"
                >
                  {{ item.name }}
                </option>
              </select>
            </div>
          </div>

          <div class="form-group flex">
            <label
              for=""
              class="w-[var(--label-width)] font-light text-[1.4rem] mb-0 flex items-center"
              >Địa chỉ:</label
            >
            <div class="flex-1">
              <textarea
                class="form-control"
                v-model="addressData.delivery_address"
                placeholder="đỉa chị cụ thể (ngõ, ngách, số nhà)"
              ></textarea>
            </div>
          </div>

          <div class="form-group flex items-center">
            <label
              for=""
              class="w-[var(--label-width)] font-light text-[1.4rem] mb-0 flex items-center"
              >Loại địa chỉ:</label
            >
            <div class="flex-1 flex items-center">
              <div class="form-group mb-0 mr-10">
                <input
                  type="radio"
                  value="0"
                  id="home"
                  class="border border-[var(--pale-yellow)]"
                  v-model="addressData.address_type"
                />
                <label
                  for="home"
                  class="ml-4 text-[1.4rem] font-normal"
                  >Nhà riêng - chung cư</label
                >
              </div>

              <div class="form-group mb-0">
                <input
                  type="radio"
                  value="1"
                  id="company"
                  class="border outline-none"
                  v-model="addressData.address_type"
                />
                <label
                  for="company"
                  class="ml-4 text-[1.4rem] font-normal"
                  >Cơ quan - công ty</label
                >
              </div>
            </div>
          </div>

          <div class="form-group ml-[var(--label-width)]">
            <input
              type="checkbox"
              id="default"
              class="border border-[var(--pale-yellow)]"
              v-model="addressData.isActive"
              true-value="1"
              false-value="0"
            />
            <label
              for="default"
              class="ml-4 text-[1.4rem] font-normal"
              >đặt làm mặc định</label
            >
          </div>

          <button
            class="ml-[var(--label-width)] border-none py-[8px] px-[12px] rounded bg-[var(--pale-yellow)]"
            @click="addData"
          >
            Cập nhật
          </button>
        </form>
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

<style lang="" scoped></style>
