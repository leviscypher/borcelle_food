<script lang="ts" setup>
import { ref } from 'vue'

const numberOfDays = (y: number, m: number) => {
  return new Date(y, m, 0).getDate()
}

const days = (totalDay: number) => {
  const day = []

  for (let i = 1; i <= totalDay; i++) {
    day.push(i)
  }

  return day
}

const defaultDate = (y: number = 0, m: number = 0) => {
  return days(numberOfDays(y, m))
}

const month = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]

const years = () => {
  let fullYear = new Date().getFullYear()
  let yearsArr = []
  for (let i = 1900; i <= fullYear; i++) {
    yearsArr.unshift(i)
  }

  return yearsArr
}

defineProps({
  day: {
    type: Number,
  },
  month: {
    type: Number,
  },
  year: {
    type: Number,
  },
})

const getValue = (event: Event) => {
  const value = (event.target as HTMLInputElement).value
  return parseInt(value)
}
</script>

<template>
  <div class="form-group flex items-center my-10">
    <label
      for=""
      class="w-[var(--label-width)] ml-8 font-light text-[1.4rem]"
      >Ngày sinh</label
    >
    <div class="flex-1 flex">
      <select
        name="day"
        id=""
        class="form-control w-[100px] mr-4"
        @input="$emit('update:day', getValue($event))"
      >
        <option value="">ngày</option>
        <option
          v-for="(item, i) in defaultDate()"
          :key="i"
          :value="item"
        >
          {{ item }}
        </option>
      </select>

      <select
        name="month"
        id=""
        class="form-control w-[100px] mr-4"
        @input="$emit('update:month', getValue($event))"
      >
        <option value="">tháng</option>
        <option
          v-for="(item, i) in month"
          :key="i"
          :value="item"
        >
          {{ item }}
        </option>
      </select>

      <select
        name="year"
        id=""
        class="form-control w-[100px]"
        @input="$emit('update:year', getValue($event))"
      >
        <option value="">năm</option>
        <option
          v-for="(item, i) in years()"
          :key="i"
          :value="item"
        >
          {{ item }}
        </option>
      </select>
    </div>
  </div>
</template>
<style lang="" scoped></style>
