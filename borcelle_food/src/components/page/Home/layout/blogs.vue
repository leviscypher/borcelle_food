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
          <a href="">
            <img
              class="w-full h-[300px] contain"
              src="@/assets/image/blog1.jpg"
              alt=""
            />
          </a>
          <span class="blogs-content-date">01 May 2020</span>
        </div>
        <a
          href=""
          class="no-underline text-[var(--dark)]"
        >
          <h3 class="blogs-content-title block text-4xl font-medium my-10 mx-10">Brief About How to Make Pasta</h3>
        </a>
        <p class="blogs-content-description description ml-10 mr-4 mb-40">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
        </p>
        <button class="blogs-content-btn bf-btn-primary">Read More</button>
      </div>

      <div class="blogs-content-item">
        <div class="blogs-content-img">
          <a href="">
            <img
              class="w-full h-[300px] contain"
              src="@/assets/image/blog2.jpg"
              alt=""
            />
          </a>
          <span class="blogs-content-date">01 May 2020</span>
        </div>
        <a
          href=""
          class="no-underline text-[var(--dark)]"
        >
          <h3 class="blogs-content-title block text-4xl font-medium my-10 mx-10">Brief About How to Make Pasta</h3>
        </a>
        <p class="blogs-content-description description ml-10 mr-4 mb-40">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
        </p>
        <button class="blogs-content-btn bf-btn-primary">Read More</button>
      </div>

      <div class="blogs-content-item">
        <div class="blogs-content-img">
          <a href="">
            <img
              class="w-full h-[300px] contain"
              src="@/assets/image/blog3.jpg"
              alt=""
            />
          </a>
          <span class="blogs-content-date">01 May 2020</span>
        </div>
        <a
          href=""
          class="no-underline text-[var(--dark)]"
        >
          <h3 class="blogs-content-title block text-4xl font-medium my-10 mx-10">Brief About How to Make Pasta</h3>
        </a>
        <p class="blogs-content-description description ml-10 mr-4 mb-40">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
        </p>
        <button class="blogs-content-btn bf-btn-primary">Read More</button>
      </div>
    </div>
    <div class="blogs-more text-center">
      <a
        class="no-underline font-medium inline-block text-4xl text-[var(--dark)]"
        href=""
        >View More Blogs
      </a>
    </div>
  </div>
</template>
<script>
export default {}
</script>
<style lang="scss">
@import '@/assets/styles/page/home/blogs.scss';
</style>
