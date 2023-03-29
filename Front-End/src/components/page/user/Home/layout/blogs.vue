<template lang="">
  <div class="blogs defaul-width-wd mx-auto my-40">
    <h1 class="blogs-title title title-sm text-center">Our Regular Blogs</h1>
    <p class="blogs-description description-width description mx-auto text-center mt-4">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do tempor incididunt ut labore et dolore magna
      aliqua.
    </p>
    <div class="blogs-content grid grid-cols-3 gap-4 mt-20">
      <div class="blogs-content-item">
        <div class="blogs-content-img">
          <router-link to="/detailpage">
            <img
              class="w-full h-[300px] contain"
              src="@/assets/image/blog1.jpg"
              alt=""
            />
          </router-link>
          <span class="blogs-content-date">01 May 2020</span>
        </div>
        <router-link
          to="/detailpage"
          class="no-underline text-[var(--dark)]"
        >
          <h3 class="blogs-content-title block text-4xl font-medium my-10 mx-10">Brief About How to Make Pasta</h3>
        </router-link>
        <p class="blogs-content-description description ml-10 mr-4 mb-40">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
        </p>
        <router-link
          to="/detailpage"
          class="blogs-content-btn bf-btn-primary no-underline"
          >Read More</router-link
        >
      </div>

      <div class="blogs-content-item">
        <div class="blogs-content-img">
          <router-link to="/detailpage">
            <img
              class="w-full h-[300px] contain"
              src="@/assets/image/blog2.jpg"
              alt=""
            />
          </router-link>
          <span class="blogs-content-date">01 May 2020</span>
        </div>
        <router-link
          to="/detailpage"
          class="no-underline text-[var(--dark)]"
        >
          <h3 class="blogs-content-title block text-4xl font-medium my-10 mx-10">Brief About How to Make Pasta</h3>
        </router-link>
        <p class="blogs-content-description description ml-10 mr-4 mb-40">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
        </p>
        <router-link
          to="/detailpage"
          class="blogs-content-btn bf-btn-primary no-underline"
          >Read More</router-link
        >
      </div>

      <div class="blogs-content-item">
        <div class="blogs-content-img">
          <router-link to="/detailpage">
            <img
              class="w-full h-[300px] contain"
              src="@/assets/image/blog3.jpg"
              alt=""
            />
          </router-link>
          <span class="blogs-content-date">01 May 2020</span>
        </div>
        <router-link
          to="/detailpage"
          class="no-underline text-[var(--dark)]"
        >
          <h3 class="blogs-content-title block text-4xl font-medium my-10 mx-10">Brief About How to Make Pasta</h3>
        </router-link>
        <p class="blogs-content-description description ml-10 mr-4 mb-40">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
        </p>
        <router-link
          to="/detailpage"
          class="blogs-content-btn bf-btn-primary no-underline"
          >Read More</router-link
        >
      </div>
    </div>
    <div class="blogs-more text-center">
      <a
        class="no-underline font-medium inline-block text-4xl text-[var(--dark)] hover:text-[var(--pale-yellow)]"
        href=""
        >View More Blogs
      </a>
    </div>
  </div>
</template>
<script>
export default {}
</script>
<style lang="scss" scoped>
@import '@/assets/styles/page/home/blogs.scss';
</style>
