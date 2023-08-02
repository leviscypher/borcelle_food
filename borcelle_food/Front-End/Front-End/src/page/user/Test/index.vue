<script lang="ts" setup>
import { onMounted, computed } from 'vue'
import { useUserStore } from '@/stores/test'
const store = useUserStore()
const getUsers = computed(() => {
  return store.getUsers
})

onMounted(() => {
  store.fetchUsers()
})
</script>
<template>
  <div class="hello">
    <div
      v-for="user in getUsers"
      :key="user.id"
    >
     {{ user.name }}
    </div>

  </div>
</template>
  