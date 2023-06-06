<script lang="ts" setup>
import { ref } from 'vue'

const title = ref('Liên hệ')
</script>
<template>
  <div class="mb-40">
    <base-banner :title="title" />

    <!-- LOCATION -->
    <div class="location mx-auto my-40">
      <div class="location-list grid gap-4 grid-cols-3">
        <div class="location-item text-center">
          <nav class="location-icon rounded-full mx-auto mb-10">
            <font-awesome-icon icon="fa-solid fa-clock" />
          </nav>
          <p>9:00 AM to 12:00 AM</p>
          <p>(Saturday to Thursday)</p>
        </div>

        <div class="location-item text-center active">
          <nav class="location-icon rounded-full mx-auto mb-10">
            <font-awesome-icon icon="fa-solid fa-location-dot" />
          </nav>
          <p>Br1. 28/A Street, New York, USA</p>
          <p>Br2. 31/B Street, Washington, USA</p>
        </div>

        <div class="location-item text-center">
          <nav class="location-icon rounded-full mx-auto mb-10">
            <font-awesome-icon icon="fa-solid fa-phone" />
          </nav>
          <p>
            <a
              href="tel:+11234567890"
              class="no-underline"
              >(Branch 1) +1 123 456 7890</a
            >
          </p>
          <p>
            <a
              href="tel:+23256594596"
              class="no-underline"
              >(Branch 2) +2 325 659 4596</a
            >
          </p>
        </div>
      </div>
    </div>
    <!-- END LOCATION -->

    <!-- FORM MESSAGE -->
    <div class="wrapper">
      <div class="send-message grid grid-cols-2 mx-auto">
        <div class="form">
          <div class="form-group">
            <input
              type="text"
              class="form-control outline-none border-none w-full mb-10 text-2xl rounded-full p-8"
              placeholder="Name"
            />
          </div>

          <div class="form-group">
            <input
              type="text"
              class="form-control outline-none border-none w-full mb-10 text-2xl rounded-full p-8"
              placeholder="Email"
            />
          </div>

          <div class="form-group">
            <input
              type="text"
              class="form-control outline-none border-none w-full mb-10 text-2xl rounded-full p-8"
              placeholder="Phone"
            />
          </div>

          <div class="form-group">
            <input
              type="text"
              class="form-control outline-none border-none w-full mb-10 text-2xl rounded-full p-8"
              placeholder="Subject"
            />
          </div>

          <div class="form-group">
            <textarea
              name=""
              class="form-control outline-none border-none w-full h-60 mb-10 text-2xl rounded-3xl p-8"
              placeholder="Message"
            ></textarea>
          </div>

          <div class="flex items-center mb-10">
            <input type="checkbox" />
            <nav class="text-2xl ml-2">
              Accept
              <a
                class="form-link"
                href=""
                >Terms & Conditions
              </a>
              And
              <a
                class="form-link"
                href=""
                >Privacy Policy.</a
              >
            </nav>
          </div>

          <button class="bf-btn-primary">Send Message</button>

          <div class="form-follow">
            <h3 class="form-follow-title">Follow Us</h3>
            <div class="form-follow-social flex">
              <a
                href=""
                class="form-follow-social-link block mr-4 text-4xl"
              >
                <font-awesome-icon
                  class="text-[#fff]"
                  icon="fa-brands fa-facebook"
                />
              </a>
              <a
                href=""
                class="form-follow-social-link block mr-4 text-4xl"
              >
                <font-awesome-icon
                  class="text-[#fff]"
                  icon="fa-brands fa-twitter"
                />
              </a>
              <a
                href=""
                class="form-follow-social-link block mr-4 text-4xl"
              >
                <font-awesome-icon
                  class="text-[#fff]"
                  icon="fa-brands fa-instagram"
                />
              </a>
              <a
                href=""
                class="form-follow-social-link block mr-4 text-4xl"
              >
                <font-awesome-icon
                  class="text-[#fff]"
                  icon="fa-brands fa-youtube"
                />
              </a>
            </div>
          </div>
        </div>

        <div class="contact-man-img">
          <img
            src="@/assets/image/contact/contact-man.png"
            alt=""
          />
        </div>
      </div>
    </div>
    <!-- END FORM MESSAGE -->
  </div>
</template>
<style lang="scss">
.location {
  width: 1290px;
}

.location-item {
  padding: 38px;
  border-radius: 20px;
  transition: all 0.4s ease-in-out;
}

.location-item:hover {
  background-color: var(--pale-yellow);
}

.location-item:hover .location-icon {
  background-color: var(--dark);
  color: var(--white);
}

.location-item p a {
  color: var(--dark);
  text-decoration: none;
}

.location-item:hover p {
  color: var(--white);
}

.location-item:hover a {
  color: var(--white);
}

.location-icon {
  width: 60px;
  height: 60px;
  background-color: var(--pale-yellow);
  display: flex;
  justify-content: center;
  align-items: center;
  transition: all 0.4s ease-in-out;
}

.location-icon i {
  font-size: 2.4rem;
}

.location-item p {
  font-size: 1.8rem;
  font-weight: 500;
  margin-bottom: 10px;
  transition: all 0.4s ease-in-out;
}

.location-item.active {
  background-color: var(--pale-yellow);
}

.location-item.active > .location-icon {
  background-color: var(--dark);
  color: var(--white);
}

.location-item.active > p {
  color: var(--white);
}

/* END LOCATION */

.send-message {
  width: 1290px;
}

.wrapper {
  width: 100%;
  background-image: url('@/assets/image/contact/contact-form-bg.jpg');
  background-size: cover;
  background-position: center center;
  background-repeat: no-repeat;
}

.form {
  width: 640px;
  background-color: #ffffff9e;
  padding: 70px 50px;
  border-radius: 15px;
  margin: 100px auto;
}

.form-link {
  color: var(--pale-yellow);
}

.form-follow-title {
  margin-top: 38px;
  display: block;
  font-size: 16px;
  color: #0b0320;
  margin-bottom: 15px;
}

.form-follow-social-link {
  padding: 8px 10px;
  background-color: #000;
  border-radius: 50%;
  transition: all 0.5s ease-in-out;
}

.form-follow-social-link i {
  color: var(--dark);
}

.form-follow-social-link:hover {
  background-color: var(--pale-yellow);
}

.contact-man-img {
  margin: 100px auto;
  text-align: center;
}
</style>
