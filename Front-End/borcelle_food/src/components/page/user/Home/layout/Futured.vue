<script lang="ts" setup></script>
<template>
  <!-- FEATURED CATEGORIES -->
  <div class="categories defaul-width-wd">
    <h1 class="categories-title title title-sm">Featured Categories</h1>
    <p class="categories-description description-width description">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
      magna aliqua.
    </p>

    <div class="categories-future grid grid-cols-3 gap-6 mt-24">
      <div class="categories-future-item hover:-translate-y-6 ease-in-out duration-500">
        <img
          class="w-full cover"
          src="@/assets/image/feature1.jpg"
          alt=""
        />
        <div class="categories-future-inner w-2/3 flex items-center justify-between bg-white rounded-full">
          <div class="flex items-center ml-4">
            <img
              class="rounded-full"
              src="@/assets/image/feature1.png"
              alt=""
            />
            <h4 class="ml-4 text-3xl font-medium">Fast Food</h4>
          </div>
          <div class="categories-future-btn bf-btn-circle m-2 mr-4 ease-in-out duration-500">
            <font-awesome-icon icon="fa-solid fa-arrow-right" />
          </div>
        </div>
      </div>
      <div class="categories-future-item hover:-translate-y-6 ease-in-out duration-500">
        <img
          class="w-full cover"
          src="@/assets/image/feature2.jpg"
          alt=""
        />
        <div class="categories-future-inner w-2/3 flex items-center justify-between bg-white rounded-full">
          <div class="flex items-center ml-4">
            <img
              class="rounded-full"
              src="@/assets/image/feature2.png"
              alt=""
            />
            <h4 class="ml-4 text-3xl font-medium">Fast Food</h4>
          </div>
          <div class="categories-future-btn bf-btn-circle m-2 mr-4 ease-in-out duration-500">
            <font-awesome-icon icon="fa-solid fa-arrow-right" />
          </div>
        </div>
      </div>
      <div class="categories-future-item hover:-translate-y-6 ease-in-out duration-500">
        <img
          class="w-full cover"
          src="@/assets/image/feature3.jpg"
          alt=""
        />
        <div class="categories-future-inner w-2/3 flex items-center justify-between bg-white rounded-full">
          <div class="flex items-center ml-4">
            <img
              class="rounded-full"
              src="@/assets/image/feature3.png"
              alt=""
            />
            <h4 class="ml-4 text-3xl font-medium">Fast Food</h4>
          </div>
          <div class="categories-future-btn bf-btn-circle m-2 mr-4 ease-in-out duration-500">
            <font-awesome-icon icon="fa-solid fa-arrow-right" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END FEATURED CATEGORIES -->
</template>

<style lang="scss" scoped>
@import '@/assets/styles/page/home/future.scss';
</style>
