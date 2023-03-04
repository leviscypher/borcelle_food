<script lang="ts" setup>
import { ref } from "vue";

const title = ref('Blog')

</script>
<template>
  <div>
    <base-banner :title="title" />
  </div>
</template>
<style></style>