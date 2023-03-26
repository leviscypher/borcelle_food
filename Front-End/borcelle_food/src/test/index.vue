<template>
    <div class="hello">
      <h1>{{ msg }}</h1>
      <h1>Made By Getters</h1>
      <div v-for="user in getUsers" :key="user.id">
        {{ user.id }} {{ user.name }} {{ user.address }}
      </div>
    </div>
  </template>
  
  <script lang="ts" setup>
  import { ref, onMounted, computed } from "vue";
  import { useUserStore } from "@/stores/test";
  const store = useUserStore();
  const msg = ref("Welcome to my Vuex Store");
  const getUsers = computed(() => {
    return store.getUsers;
  });
  const users = computed(() => {
    return store.users;
  });
  onMounted(() => {
    store.fetchUsers();
  });
  </script>