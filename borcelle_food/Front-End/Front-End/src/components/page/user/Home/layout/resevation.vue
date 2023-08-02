<template lang="">
  <div class="affic mt-40">
    <div class="reservation grid grid-cols-2 defaul-width-wd mx-auto">
      <div class="reservation-item my-auto">
        <h1 class="reservation-title title title-sm text-white my-10">Đặt bàn ngày</h1>
        <p class="reservation-description description text-white my-10">
          hãy điền thơi gian và lên lịch gửi cho chúng tôi để thưởng thức các món ăn tuyệt vời tại của hàng chúng tôi.
        </p>
        <div class="reservation-form w-full bg-white rounded-full my-10">
          <ul class="flex items-center justify-center py-4">
            <li>
              <input
                class="reservation-form-input block border border-gray-900 rounded outline-none leading-6 py-4 px-12 mx-4"
                type="date"
              />
            </li>
            <li>
              <input
                class="reservation-form-input block border border-gray-900 rounded outline-none leading-6 py-4 px-12 mx-4"
                type="time"
              />
            </li>
            <li>
              <button class="bf-btn-primary mx-4">Đặt ngay</button>
            </li>
          </ul>
        </div>
      </div>
      <div class="reservation-image">
        <img
          src="@/assets/image/reservation.png"
          alt=""
        />
      </div>
    </div>
  </div>
</template>
<script>
export default {}
</script>
<style lang="scss" scoped>
.reservation-form-input {
  font-size: 1.6rem;
}

ul {
  list-style: none;
}
</style>
