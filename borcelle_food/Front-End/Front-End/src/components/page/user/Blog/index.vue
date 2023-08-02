<script lang="ts" setup>
import { ref } from "vue";
import { useRouter } from 'vue-router'
const router = useRouter()

const title = ref('Tin tức')

</script>
<template>
  <div class="blog">
    <base-banner :title="title" />
    <div class="grid grid-cols-3 gap-y-16 gap-x-10 pr-[150px] pl-[150px] pt-[100px] pb-[70px]">
      <div class="blog-new-feed">
        <div class="blog-new-feed-item">
          <div class="blog-new-feed-item-img">
            <router-link to="/detailpage" class="w-[100%] block">
              <img src="@/assets/image/blog1.jpg" class="blog-new-feed-photo w-full" />
            </router-link>
          </div>
          <div class="blog-new-feed-item-content pt-5">
            <div class="blog-new-feed-item-content-title">
              <h3 class="blog-new-feed-title">
                <router-link to="/detailpage" class="blog-new-feed-link blok decoration-none">
                  Brief About How to Make Pasta
                </router-link>
              </h3>
            </div>
            <div class="blog-new-feed-item-content-desc">
              <p class="blog-new-feed-describe">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
              </p>
            </div>
            <div class="blog-btn">
                 <router-link to="/detailpage">
                <base-button>Read More</base-button>
              </router-link>
            </div>
          </div>
        </div>
      </div>
      <div class="blog-new-feed">
        <div class="blog-new-feed-item">
          <div class="blog-new-feed-item-img">
            <router-link to="/detailpage" class="w-[100%] block">
              <img src="@/assets/image/blog1.jpg" class="blog-new-feed-photo w-full" />
            </router-link>
          </div>
          <div class="blog-new-feed-item-content pt-5">
            <div class="blog-new-feed-item-content-title">
              <h3 class="blog-new-feed-title">
                <router-link to="/detailpage" class="blog-new-feed-link blok decoration-none">
                  Brief About How to Make Pasta
                </router-link>
              </h3>
            </div>
            <div class="blog-new-feed-item-content-desc">
              <p class="blog-new-feed-describe">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
              </p>
            </div>
            <div class="blog-btn">
               <router-link to="/detailpage">
                <base-button>Read More</base-button>
              </router-link>
            </div>
          </div>
        </div>
      </div>
      <div class="blog-new-feed">
        <div class="blog-new-feed-item">
          <div class="blog-new-feed-item-img">
            <router-link to="/detailpage" class="w-[100%] block">
              <img src="@/assets/image/blog1.jpg" class="blog-new-feed-photo w-full" />
            </router-link>
          </div>
          <div class="blog-new-feed-item-content pt-5">
            <div class="blog-new-feed-item-content-title">
              <h3 class="blog-new-feed-title">
                <router-link to="/detailpage" class="blog-new-feed-link blok decoration-none">
                  Brief About How to Make Pasta
                </router-link>
              </h3>
            </div>
            <div class="blog-new-feed-item-content-desc">
              <p class="blog-new-feed-describe">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
              </p>
            </div>
            <div class="blog-btn">
               <router-link to="/detailpage">
                <base-button>Read More</base-button>
              </router-link>
            </div>
          </div>
        </div>
      </div>
      <div class="blog-new-feed">
        <div class="blog-new-feed-item">
          <div class="blog-new-feed-item-img">
            <router-link to="/detailpage" class="w-[100%] block">
              <img src="@/assets/image/blog1.jpg" class="blog-new-feed-photo w-full" />
            </router-link>
          </div>
          <div class="blog-new-feed-item-content pt-5">
            <div class="blog-new-feed-item-content-title">
              <h3 class="blog-new-feed-title">
                <router-link to="/detailpage" class="blog-new-feed-link blok decoration-none">
                  Brief About How to Make Pasta
                </router-link>
              </h3>
            </div>
            <div class="blog-new-feed-item-content-desc">
              <p class="blog-new-feed-describe">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
              </p>
            </div>
            <div class="blog-btn">
              <router-link to="/detailpage">
                 <router-link to="/detailpage">
                <base-button>Read More</base-button>
              </router-link>
              </router-link>
            </div>
          </div>
        </div>
      </div>
      <div class="blog-new-feed">
        <div class="blog-new-feed-item">
          <div class="blog-new-feed-item-img">
            <router-link to="/detailpage" class="w-[100%] block">
              <img src="@/assets/image/blog1.jpg" class="blog-new-feed-photo w-full" />
            </router-link>
          </div>
          <div class="blog-new-feed-item-content pt-5">
            <div class="blog-new-feed-item-content-title">
              <h3 class="blog-new-feed-title">
                <router-link to="/detailpage" class="blog-new-feed-link blok decoration-none">
                  Brief About How to Make Pasta
                </router-link>
              </h3>
            </div>
            <div class="blog-new-feed-item-content-desc">
              <p class="blog-new-feed-describe">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
              </p>
            </div>
            <div class="blog-btn">
               <router-link to="/detailpage">
                <base-button>Read More</base-button>
              </router-link>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</template>
<style lang="scss" scoped>
@import "@/assets/styles/page/blog/blog.scss";
</style>