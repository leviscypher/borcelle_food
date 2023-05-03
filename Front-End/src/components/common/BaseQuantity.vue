<script lang="ts" setup>
import { ref, watch, onMounted } from 'vue'

const props = defineProps<{
  outOfStock: Number
  maxOrder: any
  value: Number
}>()

const emit = defineEmits(['quantity'])

const quantity = ref(1)
const maxOrder = ref(10)

onMounted(() => {
  if(props.value) {
    quantity.value = props.value
  }
})

const decrement = () => {
  if (quantity.value > 1) {
    quantity.value--
    emit('quantity', quantity.value)
  }
}
const increment = () => {
  quantity.value ++
  if(quantity.value > props.maxOrder) {
    emit('quantity', props.maxOrder)
  } else {
    emit('quantity', quantity.value,)
  }
}

watch(quantity, (newQuantity) => {
  if(newQuantity) {
    if(quantity.value > props.maxOrder) {
      quantity.value = props.maxOrder
    }
    if(newQuantity > maxOrder.value) {
      quantity.value = maxOrder.value
    }
  }
})

</script>
<template>
  <div
    class="quantity-number flex items-center justify-center"
    :class="props.outOfStock == 2 ? 'disable' : ''"
  >
    <base-button
      class="quantity-reduce m-0"
      @click="decrement"
      :class="props.outOfStock == 2 ? 'disable' : ''"
    >
      <font-awesome-icon icon="fa-solid fa-minus" />
    </base-button>
    <div>
      <input
        type="number"
        :value="quantity"
        :v-model="quantity"
        class="quantity-bulk"
        min="1"
        :max="props.maxOrder"
        readonly
      />
    </div>
    <base-button
      class="quantity-increase m-0"
      @click="increment"
      :class="props.outOfStock == 2 ? 'disable' : ''"
    >
      <font-awesome-icon icon="fa-solid fa-plus" />
    </base-button>
  </div>
</template>

<style lang="scss" scoped>
@import '@/assets/styles/common/base-quantity.scss';
</style>
