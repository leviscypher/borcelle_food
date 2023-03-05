<script setup lang="ts">
import { RouterView } from "vue-router";
import TheHeader from "../components/Layouts/Header/header.vue";
import TheFooter from "../components/Layouts/Footer/footer.vue";
</script>

<template>
  <div class="wapper bg-[#F5F5FA]">
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
<style lang="scss" scoped>
.header {
  background: var(--white);
  box-shadow: 0px 0px 20px 0px #dddddd8c;
}
</style>