<template>
  <div class="footer pt-[100px] pb-[70px] flex gap-[50px]">
    <div class="footer-introduce flex-1">
      <div class="footer-introduce-logo">
        <img
          src="@/assets/logo/logo.png"
          class="footer-introduce-photo"
          alt=""
        />
      </div>
      <div class="footer-introduce-describe mb-[20px]">
        cửa hàng thức ăn nhanh, tiện ích hàng đầu trong lĩnh vực thực phẩm.
      </div>
      <div class="footer-introduce-social-network">
        <ul class="footer-menu-icon flex list-none">
          <li class="footer-menu-icon-chill">
            <font-awesome-icon icon="fa-brands fa-facebook" />
          </li>
          <li class="footer-menu-icon-chill">
            <font-awesome-icon icon="fa-brands fa-twitter" />
          </li>
          <li class="footer-menu-icon-chill">
            <font-awesome-icon icon="fa-brands fa-instagram" />
          </li>
          <li class="footer-menu-icon-chill">
            <font-awesome-icon icon="fa-brands fa-youtube" />
          </li>
        </ul>
      </div>
    </div>
    <div class="footer-services flex-1">
      <h2 class="footer-title">Dịch vụ</h2>
      <ul class="footer-menu list-none">
        <li class="footer-chill">
          <span class="footer-icon pr-3">
            <font-awesome-icon icon="fa-solid fa-angle-right" />
          </span>
          <span class="footer-text">Ủng hộ</span>
        </li>
        <li class="footer-chill">
          <span class="footer-icon pr-3">
            <font-awesome-icon icon="fa-solid fa-angle-right" />
          </span>
          <span class="footer-text">Sự nghiệp</span>
        </li>
        <li class="footer-chill">
          <span class="footer-icon pr-3">
            <font-awesome-icon icon="fa-solid fa-angle-right" />
          </span>
          <span class="footer-text">Đầu bếp</span>
        </li>
        <li class="footer-chill">
          <span class="footer-icon pr-3">
            <font-awesome-icon icon="fa-solid fa-angle-right" />
          </span>
          <span class="footer-text">Lời chứng thực</span>
        </li>
        <li class="footer-chill">
          <span class="footer-icon pr-3">
            <font-awesome-icon icon="fa-solid fa-angle-right" />
          </span>
          <span class="footer-text">Chính sách bảo mật</span>
        </li>
      </ul>
    </div>
    <div class="footer-quick-links flex-1">
      <h2 class="footer-title">Liên kết nhanh</h2>
      <ul class="footer-menu list-none">
        <li class="footer-chill">
          <span class="footer-icon pr-3">
            <font-awesome-icon icon="fa-solid fa-angle-right" />
          </span>
          <span class="footer-text">Dịch vụ</span>
        </li>
        <li class="footer-chill">
          <span class="footer-icon pr-3">
            <font-awesome-icon icon="fa-solid fa-angle-right" />
          </span>
          <span class="footer-text">Bộ sưu tập thực phẩm</span>
        </li>
        <li class="footer-chill">
          <span class="footer-icon pr-3">
            <font-awesome-icon icon="fa-solid fa-angle-right" />
          </span>
          <span class="footer-text">Đặt hàng trực tuyến</span>
        </li>
        <li class="footer-chill">
          <span class="footer-icon pr-3">
            <font-awesome-icon icon="fa-solid fa-angle-right" />
          </span>
          <span class="footer-text">Blog</span>
        </li>
        <li class="footer-chill">
          <span class="footer-icon pr-3">
            <font-awesome-icon icon="fa-solid fa-angle-right" />
          </span>
          <span class="footer-text">Liên hệ</span>
        </li>
      </ul>
    </div>
    <div class="footer-contact-us flex-1">
      <h2 class="footer-title">Liên hệ chúng tôi</h2>
      <ul class="footer-menu list-none">
        <li class="footer-chill">
          <span class="footer-icon pr-3">
            <font-awesome-icon icon="fa-solid fa-phone" />
          </span>
          <span class="footer-text">+1 1234 56 789</span>
        </li>
        <li class="footer-chill">
          <span class="footer-icon pr-3">
            <font-awesome-icon icon="fa-solid fa-phone" />
          </span>
          <span class="footer-text">+5 1434 56 768</span>
        </li>
        <li class="footer-chill">
          <span class="footer-icon pr-3">
            <font-awesome-icon icon="fa-solid fa-message" />
          </span>
          <span class="footer-text">info@restant.com</span>
        </li>
        <li class="footer-chill">
          <span class="footer-icon pr-3">
            <font-awesome-icon icon="fa-solid fa-message" />
          </span>
          <span class="footer-text">hello@restant.com</span>
        </li>
        <li class="footer-chill">
          <span class="footer-icon pr-3">
            <font-awesome-icon icon="fa-solid fa-location-dot" />
          </span>
          <span class="footer-text">Khu E6, Phạm Hùng, Cầu Giấy, Hà Nội</span>
        </li>
      </ul>
    </div>
  </div>
  <div class="footer rounded-none text-center h-[50px] leading-[50px]">Copyright © 2023 Design & Developed</div>
</template>
<script lang="ts" setup></script>
<style lang="scss" scoped>
@import '@/assets/styles/footer/footer.scss';
</style>
