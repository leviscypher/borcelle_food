<script lang="ts" setup>

</script>
<template>
  <nav class="px-2 bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700">
    <div class="container flex flex-wrap items-center justify-between mx-auto">

      <router-link to="/">
        <img src="@/assets/logo/logo.png" class="h-6 mr-3 sm:h-10" alt="Flowbite Logo" />
      </router-link>

      <div class="w-full md:block md:w-auto" id="navbar-multi-level">
        <ul
          class="flex flex-col p-4 mt-4 border underline rounded-lg md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0">
          <li>
            <router-link to="/">Home</router-link>
          </li>
          <li>
            <router-link to="/categories">categories</router-link>
          </li>
          <li>
            <router-link to="/blog">Blog</router-link>

          </li>
          <li>
            <router-link to="/contact">contact</router-link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<style lang="scss" scoped></style>