<script lang="ts" setup>
</script>

<template>
  <div class="header flex justify-between pl-[150px] pr-[150px] items-center">
    <div class="header-logo">
      <router-link to="/">
        <img
          src="@/assets/logo/logo.png"
          class="header-photo"
          alt=""
        />
      </router-link>
    </div>
    <div class="header-navbar">
      <nav class="header-navbar-nav">
        <ul class="header-navbar-menu flex">
          <li class="header-navbar-chill">
            <router-link
              to="/"
              class="header-navbar-link decoration-none"
            >
              Trang chủ
            </router-link>
          </li>
          <li class="header-navbar-chill">
            <router-link
              to="/order"
              class="header-navbar-link decoration-none"
            >
              Đặt hàng
            </router-link>
          </li>
          <li class="header-navbar-chill">
            <router-link
              to="/blog"
              class="header-navbar-link decoration-none"
            >
              TIn tức
            </router-link>
          </li>
          <li class="header-navbar-chill">
            <router-link
              to="/contact"
              class="header-navbar-link decoration-none"
            >
              Liên hệ
            </router-link>
          </li>
        </ul>
      </nav>
    </div>
    <div class="header-individual flex gap-[40px] items-center">
      <div class="header-cart">
        <router-link
          to="/cart"
          class="header-cart-link"
        >
          <font-awesome-icon icon="fa-solid fa-cart-shopping" />
          <span class="header-cart-number">1</span>
        </router-link>
      </div>
      <div class="header-user">
        <base-button>Log in</base-button>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
@import '@/assets/styles/header/header.scss';
</style>