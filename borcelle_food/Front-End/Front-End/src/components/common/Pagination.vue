<script lang="ts" setup>
import { computed } from 'vue'
let props = defineProps<{
  data: any
}>()

const emit = defineEmits(['paginate'])

const paginate = computed(() => {
  const totalItems = isNaN(props.data.total) ? 0 : props.data.total;
  const itemsPerPage = isNaN(props.data.per_page) ? 10 : props.data.per_page;
  return Math.ceil(totalItems / itemsPerPage);
})

const displayPages = computed(() => {
  const maxDisplayPages = 5 // số lượng trang tối đa muốn hiển thị
  const currentPage = props.data.current_page
  const lastPage = paginate.value
  let startPage = Math.max(currentPage - 2, 1);
  let endPage = Math.min(startPage + 4, lastPage);
  if (lastPage > maxDisplayPages) {
    const halfMaxDisplayPages = Math.floor(maxDisplayPages / 2)
    if (currentPage > halfMaxDisplayPages) {
      startPage = currentPage - halfMaxDisplayPages
      if (lastPage - currentPage < halfMaxDisplayPages) {
        startPage = lastPage - maxDisplayPages + 1
      }
    }
    endPage = startPage + maxDisplayPages - 1
  }
  return Array(endPage - startPage + 1)
    .fill(startPage)
    .map((page, index) => page + index)
})


const goToPage = (pageNumber: number) => {
  emit('paginate', pageNumber);
}

</script>

<template>
  <div class="collections-more flex justify-center">
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item cursor-pointer" :class="{ disabled: props.data.current_page === 1 }">
          <span aria-hidden="true" @click="goToPage(1)">&laquo;</span>
        </li>
        <li class="page-item cursor-pointer" v-for="page in displayPages" :key="page"
            :class="{ active: page === props.data.current_page }">
          <span class="page-link" href="#" @click="goToPage(page)">{{ page }}</span>
        </li>
        <li class="page-item cursor-pointer" :class="{ disabled: props.data.current_page === props.data.last_page }">
          <span aria-hidden="true" @click="goToPage(props.data.last_page)">&raquo;</span>
        </li>
      </ul>
    </nav>
  </div>
</template>

