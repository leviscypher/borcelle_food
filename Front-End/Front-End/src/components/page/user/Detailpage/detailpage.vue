<script lang="ts" setup>
import { ref } from "vue";

const title = ref("Blog Details")
</script>
<template>
  <base-banner :title="title" />
  <div class="detailpage pt-[100px] pb-[70px] pr-[100px] pl-[100px]">
    <div class="flex">
      <div class="detailpage-left w-[30%] p-5">
        <div class="detailpage-left-recent-post">
          <h3 class="detailpage-left-title">Recent Post</h3>
          <router-link to="#" class="detailpage-left-btn block mb-[15px]">
            Be A Chef sdfa asdfasdfa sdfsdf asdfsadf asdf asdfsadf asdfdsf sf
          </router-link>
          <router-link to="#" class="detailpage-left-btn block mb-[15px]">
            Be A Chef sdfa asdfasdfa sdfsdf asdfsadf asdf asdfsadf asdfdsf sf
          </router-link>
          <router-link to="#" class="detailpage-left-btn block mb-[15px]">
            Be A Chef sdfa asdfasdfa sdfsdf asdfsadf asdf asdfsadf asdfdsf sf
          </router-link>
        </div>
        <div class="detailpage-left-tags">
          <h3 class="detailpage-left-title">Tags</h3>
          <div class="flex flex-wrap gap-y-5 gap-x-5">
            <base-button class="detailpage-left-tags-btn">
            Pasta
            </base-button>
            <base-button class="detailpage-left-tags-btn">
            Pasta
            </base-button>
            <base-button class="detailpage-left-tags-btn">
            Pasta
            </base-button>
            <base-button class="detailpage-left-tags-btn">
            Pasta
            </base-button>
            <base-button class="detailpage-left-tags-btn">
            Pasta
            </base-button>
          </div>
        </div>
      </div>
      <div class="detailpage-right w-full p-5">
        <h2 class="detailpage-title">How to Make Pasta</h2>
        <p class="detailpage-content">
          Fresh food is food which has not been preserved and has not spoiled yet. For vegetables and fruits, this means
          that
          they have been recently harvested and treated properly postharvest; for meat, it has recently been slaughtered
          and
          butchered; for fish.
        </p>
        <img src="@/assets/image/blog2.jpg" class="w-full rounded-[18px]" alt="">
        <p class="detailpage-content">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
          standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
          a
          type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
          remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
          Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including
          versions.

          It is a long established fact that a reader will be distracted by the readable content of a page when looking at
          its
          layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed
          to
          using 'Content here, content here', making it look like readable English. Many desktop publishing packages and
          web
          page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many
          web
          sites still in their infancy.
        </p>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
@import "@/assets/styles/page/detailpage/detailpage.scss";
</style>
