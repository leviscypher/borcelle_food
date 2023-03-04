<script setup lang="ts">
import { RouterView } from "vue-router";
import TheHeader from "../components/Layouts/Header/header.vue";
import TheFooter from "../components/Layouts/Footer/footer.vue";
</script>

<template>
  <div class="wapper">
    <div class="header">
      <the-header />
    </div>
    <div class="content">
      <RouterView />
    </div>
    <div class="footer">
      <the-footer />
    </div>
  </div>
</template>
